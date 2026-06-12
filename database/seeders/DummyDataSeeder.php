<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Tender;
use App\Models\Award;
use App\Models\Contract;
use App\Models\Completion;
use App\Models\Advance;
use App\Models\Sector;
use App\Models\Subsector;
use App\Models\Organization;
use App\Models\OrganizationUnit;
use App\Models\Official;
use App\Models\Source;
use App\Models\ContractType;
use App\Models\Offerer;
use App\Models\ProjectStatus;
use App\Models\Budget;
use App\Models\ProjectSource;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First, clear existing dummy data
        $this->clear();

        // 1. Create auxiliary entities for the warm statistics
        $sectors = [];
        foreach (['Transportation Sector', 'Water Resources Sector', 'Public Works Sector'] as $sName) {
            $sectors[] = Sector::firstOrCreate(['sector_name' => $sName]);
        }

        $subsectors = [];
        $subsectorData = [
            'Transportation Sector' => ['Highway Subsector', 'Bridge Subsector', 'Rural Road Subsector'],
            'Water Resources Sector' => ['Irrigation Subsector', 'Drainage Subsector', 'Clean Water Subsector'],
            'Public Works Sector' => ['Building Subsector', 'Park & Green Subsector']
        ];
        foreach ($subsectorData as $secName => $subNames) {
            $sec = Sector::where('sector_name', $secName)->first();
            if ($sec) {
                foreach ($subNames as $subName) {
                    $subsectors[] = Subsector::firstOrCreate([
                        'subsector_name' => $subName,
                        'sector_id' => $sec->id
                    ]);
                }
            }
        }

        $orgs = [];
        $orgData = [
            'Dinas Pekerjaan Umum dan Penataan Ruang' => 'DPUPR',
            'Badan Perencanaan Pembangunan Daerah' => 'BAPPEDA',
            'Dinas Perhubungan' => 'DISHUB'
        ];
        foreach ($orgData as $oName => $oAcronym) {
            $orgs[] = Organization::firstOrCreate([
                'name' => $oName,
                'legal_name' => $oName,
                'website' => strtolower($oAcronym) . '.lombokbaratkab.go.id'
            ]);
        }

        $officials = [];
        $names = ['Ahmad Yani', 'Budi Santoso', 'Siti Aminah', 'Riza Fahlevi'];
        $positions = ['Project Manager', 'Technical Director', 'Procurement Specialist', 'Finance Officer'];
        foreach ($orgs as $index => $org) {
            $unit = OrganizationUnit::firstOrCreate([
                'unit_name' => 'Bidang Pembangunan & Rekayasa ' . ($index + 1),
                'entity_id' => $org->id
            ]);
            
            $officials[] = Official::firstOrCreate([
                'entity_unit_id' => $unit->id,
                'name' => $names[$index % count($names)],
                'position' => $positions[$index % count($positions)],
                'email' => strtolower(str_replace(' ', '', $names[$index % count($names)])) . '@lombokbaratkab.go.id'
            ]);
        }

        $sources = [];
        $sourceData = [
            'APBD Kabupaten' => 'APBD',
            'Dana Alokasi Khusus' => 'DAK',
            'Dana Alokasi Umum' => 'DAU'
        ];
        foreach ($sourceData as $sName => $sAcronym) {
            $sources[] = Source::firstOrCreate([
                'source_name' => $sName,
                'acronym' => $sAcronym
            ]);
        }

        $contractTypes = [];
        foreach (['Construction Works', 'Consulting Services', 'Supply of Goods'] as $ctName) {
            $contractTypes[] = ContractType::firstOrCreate(['type_name' => $ctName]);
        }

        $offerers = [];
        $offData = [
            'PT. Wijaya Karya (Persero) Tbk' => 'WIKA',
            'PT. Adhi Karya (Persero) Tbk' => 'ADHI',
            'PT. Pembangunan Perumahan (Persero) Tbk' => 'PTPP',
            'PT. Waskita Karya (Persero) Tbk' => 'WASKITA',
            'CV. Lombok Mandiri' => 'LM',
            'PT. Sasak Pratama' => 'SP'
        ];
        foreach ($offData as $oName => $oAcronym) {
            $offerers[] = Offerer::firstOrCreate([
                'offerer_name' => $oAcronym,
                'legal_name' => $oName,
                'phone' => '+62 370 ' . rand(111111, 999999)
            ]);
        }

        // 2. Query Project Statuses mapping
        $projectStatuses = ProjectStatus::all();
        $statusMap = $projectStatuses->pluck('id', 'code')->toArray();

        // 3. Define Project Templates for realistic generation
        $titles = [
            'Pembangunan Jembatan Gantung',
            'Rehabilitasi Jalan Raya Kabupaten',
            'Peningkatan Saluran Irigasi Tersier',
            'Pembangunan Gedung Kantor Pelayanan',
            'Normalisasi Sungai & Pengendali Banjir',
            'Penyediaan Air Bersih Perdesaan',
            'Pembangunan Fasilitas Olahraga Kecamatan',
            'Rehabilitasi Ruang Kelas Sekolah Dasar',
            'Pemasangan Penerangan Jalan Umum (PJU) Solar Cell',
            'Pembangunan Taman Kota & RTH'
        ];

        $locations = [
            'Kecamatan Gerung',
            'Kecamatan Kediri',
            'Kecamatan Narmada',
            'Kecamatan Lingsar',
            'Kecamatan Gunungsari',
            'Kecamatan Batu Layar',
            'Kecamatan Sekotong',
            'Kecamatan Lembar',
            'Kecamatan Kuripan',
            'Kecamatan Labuapi'
        ];

        // 4. Seeding Loop over 5 years (2022 to 2026)
        for ($year = 2022; $year <= 2026; $year++) {
            // Generate 8 projects per year
            for ($i = 0; $i < 8; $i++) {
                $sub = $subsectors[array_rand($subsectors)];
                $off = $officials[array_rand($officials)];
                $src = $sources[array_rand($sources)];
                
                // Pick status based on year
                if ($year == 2022) {
                    $statusCode = $i == 7 ? 'cancelled' : 'completed';
                } elseif ($year == 2023) {
                    $statusCode = $i >= 6 ? 'completed' : 'completion';
                } elseif ($year == 2024) {
                    $statusCode = $i >= 5 ? 'completed' : ($i >= 2 ? 'completion' : 'implementation');
                } elseif ($year == 2025) {
                    $statusCode = $i >= 6 ? 'completed' : ($i >= 3 ? 'implementation' : 'preparation');
                } else { // 2026
                    $statusCode = $i >= 6 ? 'implementation' : ($i >= 3 ? 'preparation' : 'identification');
                }
                $statusId = $statusMap[$statusCode] ?? null;
                
                $budgetVal = rand(500, 12000) * 1000000; // 500 million to 12 billion IDR
                
                // Month of project start
                $startMonth = rand(1, 6);
                $startDate = Carbon::create($year, $startMonth, rand(1, 28));
                $durationDays = rand(90, 240);
                $endDate = (clone $startDate)->addDays($durationDays);
                
                $projectTitle = $titles[$i % count($titles)] . ' ' . $locations[$i % count($locations)] . ' TA ' . $year;
                $projectCode = 'DUM-' . $year . '-' . str_pad($i + 1, 3, '0', STR_PAD_LEFT);
                
                $project = Project::create([
                    'project_code' => $projectCode,
                    'project_title' => $projectTitle,
                    'project_description' => 'Proyek pembangunan infrastruktur untuk meningkatkan layanan publik di ' . $locations[$i % count($locations)] . '.',
                    'budget' => $budgetVal,
                    'subsector_id' => $sub->id,
                    'official_id' => $off->id,
                    'project_status_id' => $statusId,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'duration' => $durationDays,
                    'date_of_publication' => (clone $startDate)->subDays(15),
                    'date_of_approved' => (clone $startDate)->subDays(10),
                    'project_location' => $locations[$i % count($locations)],
                    'project_scope' => 'Pekerjaan persiapan, pekerjaan utama konstruksi, dan pemeliharaan.'
                ]);
                
                // Add Project Budget
                $budget = Budget::create([
                    'project_id' => $project->id,
                    'amount' => $budgetVal,
                    'name' => 'Anggaran Utama ' . $projectCode,
                    'description' => 'Anggaran pembiayaan proyek ' . $projectCode
                ]);
                
                // Link to source in project_sources
                ProjectSource::create([
                    'project_id' => $project->id,
                    'source_id' => $src->id,
                    'budget_id' => $budget->id,
                    'amount' => $budgetVal
                ]);
                
                // Add progress history (Advances) if status is past identification
                if ($statusCode !== 'identification') {
                    $programmedPercent = 100;
                    $realPercent = 100;
                    
                    if ($statusCode === 'preparation') {
                        $programmedPercent = rand(5, 20);
                        $realPercent = rand(0, 15);
                    } elseif ($statusCode === 'implementation') {
                        $programmedPercent = rand(40, 80);
                        $realPercent = $programmedPercent - rand(-5, 15);
                    }
                    
                    Advance::create([
                        'project_id' => $project->id,
                        'programmed_percent' => $programmedPercent,
                        'real_percent' => $realPercent,
                        'real_financing' => $realPercent,
                        'scheduled_financing' => $programmedPercent,
                        'date_of_advance' => $statusCode === 'implementation' ? Carbon::now() : $endDate,
                        'date_of_publication' => Carbon::now()
                    ]);
                }
                
                // Create Tender for projects in preparation/implementation/completion/completed/cancelled
                if ($statusCode !== 'identification') {
                    $tenderAmount = $budgetVal * (1 - (rand(-2, 5) / 100)); // slightly different from budget
                    $tender = Tender::create([
                        'project_id' => $project->id,
                        'contract_type_id' => $contractTypes[array_rand($contractTypes)]->id,
                        'tender_method_id' => null,
                        'official_id' => $off->id,
                        'process_number' => 'TND-' . $year . '-' . $project->id,
                        'project_process_name' => 'Lelang ' . $projectTitle,
                        'start_date' => (clone $startDate)->subDays(30),
                        'end_date' => (clone $startDate)->subDays(10),
                        'duration' => 20,
                        'amount' => $tenderAmount,
                        'date_of_publication' => (clone $startDate)->subDays(30)
                    ]);
                    
                    // Create Award and Contract for implementation/completion/completed
                    if (in_array($statusCode, ['implementation', 'completion', 'completed'])) {
                        $awardCost = $tenderAmount * (1 - (rand(1, 4) / 100));
                        $award = Award::create([
                            'tender_id' => $tender->id,
                            'process_number' => 'AWD-' . $year . '-' . $project->id,
                            'participants_number' => rand(3, 7),
                            'contract_estimate_cost' => $tenderAmount,
                            'cost' => $awardCost,
                            'published_at' => (clone $startDate)->subDays(5)
                        ]);
                        
                        $contract = Contract::create([
                            'awards_id' => $award->id,
                            'number' => 'CTR-' . $year . '-' . $project->id,
                            'start_date' => $startDate,
                            'end_date' => $endDate,
                            'duration' => $durationDays,
                            'contract_title' => 'Kontrak Pelaksanaan ' . $projectTitle,
                            'contract_scope' => 'Pelaksanaan fisik konstruksi sesuai dengan dokumen lelang.',
                            'price_local_currency' => $awardCost,
                            'suppliers_id' => $offerers[array_rand($offerers)]->id
                        ]);
                        
                        // Create Completion for completed projects
                        if ($statusCode === 'completed') {
                            $finalCost = $awardCost * (1 + (rand(-1, 3) / 100));
                            Completion::create([
                                'contracts_id' => $contract->id,
                                'final_scope' => 'Semua pekerjaan selesai 100% dengan baik.',
                                'description' => 'Serah terima pertama (PHO) selesai.',
                                'date' => $endDate,
                                'final_cost' => $finalCost
                            ]);
                        }
                    }
                }
            }
        }
    }

    /**
     * Clear all dummy data by query.
     * Deleting projects cascades to child tables.
     *
     * @return void
     */
    public function clear()
    {
        $dummyProjects = Project::where('project_code', 'like', 'DUM-%')->get();
        foreach ($dummyProjects as $project) {
            $project->delete();
        }
    }
}
