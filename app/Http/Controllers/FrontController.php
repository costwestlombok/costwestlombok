<?php

namespace App\Http\Controllers;

use App\Project;
use Auth;
use League\Geotools\Coordinate\Coordinate;
use League\Geotools\Coordinate\Ellipsoid;

class FrontController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            return redirect('home');
        }
        if (!request()->get('type') || request()->get('type') == 'road') {
            $projects = Project::orderBy('created_at', 'DESC')->limit(5)->get();
        } else {
            $projects = Project::whereNull('id')->get();
        }
        return view('metronic.dashboard', compact('projects'));
    }

    public function oc4ids()
    {
        // get last modified
        $arr = [
            \App\Project::latest()->first()->created_at ?? null,
            \App\Completion::latest()->first()->created_at ?? null,
            \App\Contract::latest()->first()->created_at ?? null,
            \App\Budget::latest()->first()->created_at ?? null,
            \App\File::latest()->first()->created_at ?? null,
        ];
        $arr_map = array_map('strtotime', $arr);
        $projects = \App\Project::latest()->get()->map(function ($project) {
            $p['id'] = 'oc4ids-bu3kcz-'.$project->id;
            $p['updated'] = $project->updated_at->format('c');
            $p['title'] = $project->project_title;
            if ($project->subsector_id) {
                $p['description'] = $project->project_description;
            }
            if (!in_array($project->status->status_name ?? null, [
                'identification',
                'preparation',
                'implementation',
                'completion',
                'completed',
                'cancelled'
            ])) {
                $p['status'] = 'identification'; // https://standard.open-contracting.org/infrastructure/latest/en/reference/codelists/#projectstatus
            } else {
                $p['status'] = $project->status->status_name ?? null;
            }
            $p['period'] = [
                'startDate' => date('c', strtotime($project->start_date)),
                'endDate' => date('c', strtotime($project->end_date)),
                'durationInDays' => $project->duration,
            ];
            if ($project->subsector_id) {
                $p['sector'] = [$project->subsector->sector->sector_name];
            }
            $p['type'] = 'rehabilitation'; // https://standard.open-contracting.org/infrastructure/latest/en/reference/codelists/#projecttype
            $coordinate_initial = new Coordinate([$project->initial_lat, $project->initial_lon], Ellipsoid::createFromName(Ellipsoid::GRS_1980));
            $coordinate_final = new Coordinate([$project->final_lat, $project->final_lon], Ellipsoid::createFromName(Ellipsoid::GRS_1980));
            $p['locations'] = [
                [
                    'id' => $project->id.'-1',
                    'description' => 'Start Point',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [round($coordinate_initial->getEllipsoid()->getA()), round($coordinate_initial->getEllipsoid()->getB())],
                    ]
                ], [
                    'id' => $project->id.'-2',
                    'description' => 'End Point',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [round($coordinate_final->getEllipsoid()->getA()), round($coordinate_final->getEllipsoid()->getB())],
                    ]
                ]
            ];
            if ($project->project_budget()->count()) {
                $p['budget'] = [
                    'amount' => [
                        'amount' => $project->project_budget()->sum('amount'),
                        'currency' => 'IDR',
                    ],
                    'budgetBreakdown' => $project->project_budget()->latest()->get()->map(function ($budget) {
                        $b['id'] = $budget->id;
                        if ($budget->description) {
                            $b['description'] = $budget->description;
                        }
                        $b['amount'] = [
                            'amount' => $budget->amount,
                            'currency' => 'IDR',
                        ];
                        $b['period'] = [
                            'startDate' => date('c', strtotime($budget->start_date)),
                            'endDate' => date('c', strtotime($budget->end_date)),
                        ];
                        return $b;
                    }),
                ];
            }
            $offerers = \App\Offerer::whereIn('id', \App\TenderOfferer::whereIn('tender_id', $project->tenders()->pluck('id'))->pluck('offerer_id'))->latest()->get();
            if ($offerers->count()) {
                $p['parties'] = $offerers->map(function ($offerer) {
                    $o['name'] = $offerer->offerer_name;
                    $o['id'] = $offerer->id;
                    $o['identifier'] = [
                        'legalName' => $offerer->legal_name,
                        'id' => $offerer->id,
                    ];
                    if ($offerer->website) {
                        $o['identifier']['uri'] = $offerer->website;
                    }
                    $o['address']['streetAddress'] = $offerer->address;
                    $o['contactPoint']['telephone'] = $offerer->phone;
                    return $o;
                });
            }
            // $p['publicAuthority'] = [
            //     'name' => $project->project_title,
            //     'id' => 'oc4ids-bu3kcz-'.$project->id,
            // ];

            $files = $project->file()->latest()->get();
            if ($files->count()) {
                $p['documents'] = $files->map(function ($file) {
                    $f['id'] = $file->id;
                    $f['title'] = $file->document_name;
                    $f['description'] = $file->document_description;
                    $f['url'] = url('storage/'.$file->document_path);
                    $f['datePublished'] = $file->created_at->format('c');
                    $f['dateModified'] = $file->updated_at->format('c');
                    $f['author'] = $file->author;
                    return $f;
                });
            }

            // contract
            $contracts = \App\Contract::whereIn('awards_id', \App\Award::whereIn('tender_id', $project->tenders()->pluck('id'))->pluck('id'))->latest()->get();
            if ($contracts->count()) {
                $p['contractingProcesses'] = $contracts->map(function ($contract) {
                    $c['id'] = $contract->id;
                    $c['summary']['ocid'] = $contract->id;
                    $c['summary']['title'] = $contract->contract_title;
                    $c['summary']['description'] = $contract->contract_title;
                    // tender
                    $award = $contract->award;
                    $tender = $award->tender;
                    $c['summary']['tender'] = [
                        'title' => $tender->project_process_name,
                        'costEstimate' => [
                            'amount' => $award->contract_estimate_cost,
                            'currency' => 'IDR',
                        ],
                        'numberOfTenderers' => $award->participants_number,
                    ];
                    // $c['suppliers ']

                    return $c;
                });
            }

            return $p;
        });

        $oc4ids = [
            "version" => "0.9",
            "uri" => "https://cost.digitalcommunity.id/oc4ids.json",
            "publishedDate" => $arr[array_search(max($arr_map), $arr_map)]->format('c'),
            "publisher" => [
                "name" => "Open Data Services Co-operative Limited",
                "scheme" => "GB-COH",
                "uid" => "9506232",
                "uri" => "http://data.companieshouse.gov.uk/doc/company/09506232"
            ],
            "publicationPolicy" => "https://standard.open-contracting.org/1.1/en/implementation/publication_policy/",
            "projects" => $projects->toArray(),
        ];
        // dd($oc4ids);
        return response()->json($oc4ids);
    }
}
