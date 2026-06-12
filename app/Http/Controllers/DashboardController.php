<?php

namespace App\Http\Controllers;

use App\Models\Offerer;
use App\Models\Official;
use App\Models\Project;
use App\Models\Source;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            return redirect('/');
        }
        
        $selectedYear = request()->get('year', 'all');

        if (Auth::user()->type == 'admin') {
            $projects = Project::orderBy('created_at', 'DESC')->limit(4)->get();
            $project_sum = Project::count();
            
            // Query projects for stats
            $statsProjectsQuery = Project::with(['subsector.sector', 'projectStatus', 'official.unit.org']);
        } else {
            $projects = Project::whereIn('id', Auth::user()->agency->agencyProjects()->pluck('project_id'))->orderBy('created_at', 'DESC')->limit(4)->get();
            $project_sum = Project::whereIn('id', Auth::user()->agency->agencyProjects()->pluck('project_id'))->count();
            
            // Query projects for stats
            $statsProjectsQuery = Project::whereIn('id', Auth::user()->agency->agencyProjects()->pluck('project_id'))
                ->with(['subsector.sector', 'projectStatus', 'official.unit.org']);
        }

        $allScopedProjects = $statsProjectsQuery->get();

        // Determine available years for the dropdown
        $availableYears = $allScopedProjects->map(function ($p) {
            return $p->start_date ? $p->start_date->format('Y') : null;
        })->filter()->unique()->sort()->values()->toArray();

        if (empty($availableYears)) {
            // Fallback years if no data
            $availableYears = ['2022', '2023', '2024', '2025', '2026'];
        }

        // Apply year filter for the main statistics calculation
        $filteredProjects = $allScopedProjects;
        if ($selectedYear !== 'all') {
            $filteredProjects = $allScopedProjects->filter(function ($p) use ($selectedYear) {
                return $p->start_date && $p->start_date->format('Y') === $selectedYear;
            });
        }

        // 1. Trend Data (Line/Bar chart)
        $trendData = [];
        if ($selectedYear === 'all') {
            // Group all scoped projects by year
            $groupedByYear = $allScopedProjects->groupBy(function ($p) {
                return $p->start_date ? $p->start_date->format('Y') : 'Unknown';
            })->sortBy(function ($val, $key) {
                return $key;
            });

            foreach ($groupedByYear as $yearKey => $group) {
                if ($yearKey === 'Unknown') continue;
                $trendData[] = [
                    'label' => $yearKey,
                    'count' => $group->count(),
                    'budget' => (float)$group->sum('budget')
                ];
            }
        } else {
            // Group filtered projects for the selected year by month (Jan - Dec)
            for ($m = 1; $m <= 12; $m++) {
                $monthDate = Carbon::create((int)$selectedYear, $m, 1);
                $monthName = $monthDate->translatedFormat('F'); // e.g. Januari, Februari...
                $monthKey = str_pad($m, 2, '0', STR_PAD_LEFT);

                $monthProjects = $filteredProjects->filter(function ($p) use ($monthKey) {
                    return $p->start_date && $p->start_date->format('m') === $monthKey;
                });

                $trendData[] = [
                    'label' => $monthName,
                    'count' => $monthProjects->count(),
                    'budget' => (float)$monthProjects->sum('budget')
                ];
            }
        }

        // 2. Status Split (Pie/Donut chart)
        $statusData = [];
        $groupedByStatus = $filteredProjects->groupBy(function ($p) {
            return $p->projectStatus ? $p->projectStatus->code : 'unknown';
        });
        foreach ($groupedByStatus as $statusCode => $group) {
            $statusLabel = ($statusCode !== 'unknown') ? __('labels.' . $statusCode) : __('labels.not_determined');
            if ($statusLabel === 'labels.' . $statusCode) {
                $statusLabel = ucfirst($statusCode);
            }
            $statusData[] = [
                'label' => $statusLabel,
                'count' => $group->count(),
                'budget' => (float)$group->sum('budget')
            ];
        }

        // 3. Sector Budget Split (Bar chart)
        $sectorData = [];
        $groupedBySector = $filteredProjects->groupBy(function ($p) {
            return $p->subsector && $p->subsector->sector ? $p->subsector->sector->sector_name : 'Unknown';
        });
        foreach ($groupedBySector as $sectorName => $group) {
            $sectorData[] = [
                'label' => $sectorName === 'Unknown' ? __('labels.not_determined') : __($sectorName),
                'count' => $group->count(),
                'budget' => (float)$group->sum('budget')
            ];
        }
        usort($sectorData, fn ($a, $b) => $b['budget'] <=> $a['budget']);
        $sectorLimit = 8;
        if (count($sectorData) > $sectorLimit) {
            $topSectors = array_slice($sectorData, 0, $sectorLimit);
            $otherSectors = array_slice($sectorData, $sectorLimit);
            $topSectors[] = [
                'label' => __('labels.others'),
                'count' => array_sum(array_column($otherSectors, 'count')),
                'budget' => (float) array_sum(array_column($otherSectors, 'budget')),
            ];
            $sectorData = $topSectors;
        }

        // 4. Organization Split (Donut/Pie chart)
        $orgData = [];
        $groupedByOrg = $filteredProjects->groupBy(function ($p) {
            return $p->official && $p->official->unit && $p->official->unit->org ? $p->official->unit->org->name : 'Unknown';
        });
        foreach ($groupedByOrg as $orgName => $group) {
            $orgData[] = [
                'label' => $orgName === 'Unknown' ? __('labels.not_determined') : $orgName,
                'count' => $group->count(),
                'budget' => (float)$group->sum('budget')
            ];
        }
        usort($orgData, fn ($a, $b) => $b['count'] <=> $a['count']);
        $orgLimit = 6;
        if (count($orgData) > $orgLimit) {
            $topOrgs = array_slice($orgData, 0, $orgLimit);
            $otherOrgs = array_slice($orgData, $orgLimit);
            $topOrgs[] = [
                'label' => __('labels.others'),
                'count' => array_sum(array_column($otherOrgs, 'count')),
                'budget' => (float) array_sum(array_column($otherOrgs, 'budget')),
            ];
            $orgData = $topOrgs;
        }

        $officials = Official::orderBy('created_at', 'DESC')->limit(5)->get();
        $official_sum = Official::count();
        $sources = Source::orderBy('created_at', 'DESC')->limit(5)->get();
        $source_sum = Source::count();
        $offerers = Offerer::orderBy('created_at', 'DESC')->limit(5)->get();
        $offerer_sum = Offerer::count();

        return view('metronic.index', compact(
            'projects', 'officials', 'sources', 'offerers', 
            'project_sum', 'source_sum', 'offerer_sum',
            'selectedYear', 'availableYears', 'trendData', 
            'statusData', 'sectorData', 'orgData'
        ));
    }
}
