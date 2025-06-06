<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Auth;
use DB;
use Illuminate\Support\Facades\Storage;
use League\Geotools\Coordinate\Coordinate;
use League\Geotools\Coordinate\Ellipsoid;

class FrontController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
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
            \App\Models\Project::latest()->first()->created_at ?? null,
            \App\Models\Completion::latest()->first()->created_at ?? null,
            \App\Models\Contract::latest()->first()->created_at ?? null,
            \App\Models\Budget::latest()->first()->created_at ?? null,
            \App\Models\File::latest()->first()->created_at ?? null,
        ];
        $arr_map = array_map('strtotime', $arr);
        $projects = \App\Models\Project::latest();
        if (request()->page) {
            $limit = request()->limit ?? 10;
            $projects = $projects->skip((request()->page - 1) * $limit)->take($limit);
        } else if (request()->limit) {
            $projects = $projects->take(request()->limit);
        }
        $projects = $projects->get()->map(function ($project, $key) {
            $p = $this->projectOc4idsFormat($project);
            return $p;
        })->toArray();

        $oc4ids = [
            'version' => '0.9',
            'uri' => url('/') . '/oc4ids',
            'publishedDate' => $arr[array_search(max($arr_map), $arr_map)]->format('c'),
            'publisher' => [
                'name' => 'CoST West Lombok',
                // "scheme" => "GB-COH",
                // "uid" => "9506232",
                // "uri" => "http://data.companieshouse.gov.uk/doc/company/09506232"
            ],
            // "publicationPolicy" => "https://standard.open-contracting.org/1.1/en/implementation/publication_policy/",
            'projects' => $projects,
        ];
        // $oc_json = json_encode($oc4ids, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $path = 'docs/oc4ids.json';
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        Storage::disk('public')->put($path, json_encode($oc4ids));

        return redirect("storage/$path");
    }

    public function projectOc4idsFormat($project)
    {
        $p['id'] = 'oc4ids-jj5f2u-' . $project->id;
        // $p['externalReference'] = $project->project_code;
        $p['updated'] = $project->updated_at->format('c');
        $p['title'] = $project->project_title;
        if ($project->subsector_id && $project->project_description) {
            $p['description'] = $project->project_description;
        }
        if ($project->projectStatus) {
            $p['status'] = $project->projectStatus->code == 'completed' ? 'completion' : $project->projectStatus->code;
        }
        if ($project->startDate) {
            $p['period']['startDate'] = $project->startDate;
        }
        if ($project->endDate) {
            $p['period']['endDate'] = $project->endDate;
        }
        if ($project->duration > 0) {
            $p['period']['durationInDays'] = $project->duration;
        }
        if ($project->subsector?->subsector_code && $project->subsector?->sector?->sector_code) {
            // $p['sector'] = [$project->subsector->sector->sector_name];

            // education
            // health
            // energy
            // energy.solar
            // energy.wind
            // energy.hydropower
            // energy.biomass
            // energy.geothermal
            // communications
            // waterAndWaste
            // governance
            // economy
            // cultureSportsAndRecreation
            // transport
            // transport.air
            // transport.water
            // transport.rail
            // transport.road
            // transport.urban
            // transport.lowCarbon
            // socialHousing
            // naturalResources
            // naturalResources.floodProtection
            $sectors = [
                'education',
                'health',
                'energy',
                'communications',
                'waterAndWaste',
                'governance',
                'economy',
                'cultureSportsAndRecreation',
                'transport',
                'socialHousing',
                'naturalResources',
            ];
            $subsectors = [
                'energy.solar',
                'energy.wind',
                'energy.hydropower',
                'energy.biomass',
                'energy.geothermal',
                'transport.air',
                'transport.water',
                'transport.rail',
                'transport.road',
                'transport.urban',
                'transport.lowCarbon',
                'naturalResources.floodProtection',
            ];
            if (in_array($project->subsector->sector->sector_code, $sectors) && in_array($project->subsector->subsector_code, $subsectors)) {
                $p['sector'] = [
                    $project->subsector->sector->sector_code,
                    $project->subsector->subsector_code,
                ];
            }
        }
        if ($project->purpose) {
            $p['purpose'] = $project->purpose->purpose_name;
        }
        $p['type'] = 'rehabilitation'; // https://standard.open-contracting.org/infrastructure/latest/en/reference/codelists/#projecttype
        if ($project->initial_lat && $project->initial_lon && $project->final_lat && $project->final_lon) {
            // $coordinate_initial = new Coordinate([$project->initial_lat, $project->initial_lon], Ellipsoid::createFromName(Ellipsoid::GRS_1980));
            // $coordinate_final = new Coordinate([$project->final_lat, $project->final_lon], Ellipsoid::createFromName(Ellipsoid::GRS_1980));
            $p['locations'] = [
                [
                    'id' => $project->id . '-1',
                    'description' => 'Start Point',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [(float) $project->initial_lon, (float) $project->initial_lat],
                    ],
                ],
                [
                    'id' => $project->id . '-2',
                    'description' => 'End Point',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [(float) $project->final_lon, (float) $project->final_lat],
                    ],
                ],
            ];
        }
        if ($project->project_budget()->count() && $project->date_of_approved) {
            $p['budget'] = [
                'amount' => [
                    'amount' => $project->project_budget()->sum('amount'),
                    'currency' => 'IDR',
                ],
                'approvalDate' => $project->date_of_approved->format('c'),
                // 'budgetBreakdown' => $project->project_budget()->latest()->get()->map(function ($budget) {
                //     $b['id'] = $budget->id;
                //     if ($budget->description) {
                //         $b['description'] = $budget->description;
                //     }
                //     $b['amount'] = [
                //         'amount' => $budget->amount,
                //         'currency' => 'IDR',
                //     ];
                //     $b['period'] = [
                //         'startDate' => date('c', strtotime($budget->start_date)),
                //         'endDate' => date('c', strtotime($budget->end_date)),
                //     ];
                //     return $b;
                // }),
            ];
        }
        $offerers = \App\Models\Offerer::whereIn('id', \App\Models\TenderOfferer::whereIn('tender_id', $project->tenders()->pluck('id'))->pluck('offerer_id'))->latest()->get();
        if ($offerers->count()) {
            $p['parties'] = $offerers->map(function ($offerer, $key) {
                $o['name'] = $offerer->legal_name;
                $o['id'] = $offerer->id;
                // $o['identifier'] = [
                //     'legalName' => $offerer->legal_name,
                //     'id' => $offerer->id,
                // ];
                $o['contactPoint']['name'] = $offerer->offerer_name;
                if ($offerer->website && $offerer->website != '-' && filter_var($offerer->website, FILTER_VALIDATE_URL) !== false) {
                    $o['identifier']['uri'] = $offerer->website;
                }
                if ($offerer->address && $offerer->address != '-') {
                    $o['address']['streetAddress'] = $offerer->address;
                }
                if ($offerer->phone && $offerer->phone != '-') {
                    $o['contactPoint']['telephone'] = $offerer->phone;
                }
                if ($key == 0) {
                    $o['roles'] = [
                        'tenderer',
                        'supplier',
                    ];
                } else {
                    $o['roles'] = [
                        'tenderer',
                    ];
                }
                return $o;
            })->toArray();
        }
        if ($project->official) {
            $official = $project->official;
            $org = $official->unit->org;
            $officialObject = [
                'id' => $official->unit->id,
                'name' => $org->name . ', ' . $official->unit->unit_name,
                'roles' => ['publicAuthority', 'administrativeEntity'],
            ];
            $p['publicAuthority'] = [
                'id' => $official->unit->id,
                'name' => $org->name . ', ' . $official->unit->unit_name,
            ];
            if ($project->project_budget()->count()) {
                $budget = $project->project_budget()->first();
                if ($budget->source()->count()) {
                    $sources = $budget->source;
                    foreach ($sources as $source) {
                        if ($source->source) {
                            if (in_array($source->source->acronym, ['DAU', 'DAK', 'APBD'])) {
                                if (!in_array('funder', $officialObject['roles'])) {
                                    $officialObject['roles'][] = 'funder';
                                }
                            } else {
                                $p['parties'][] = [
                                    'id' => $source->source->id,
                                    'name' => $source->source->source_name,
                                    'roles' => [
                                        'funder',
                                    ],
                                ];
                            }
                        }
                    }
                }
            }
            if ($org->website && $org->website != '-' && filter_var($org->website, FILTER_VALIDATE_URL) !== false) {
                $officialObject['identifier']['uri'] = $org->website;
            }
            if ($org->address && $org->address != '-') {
                $officialObject['address']['streetAddress'] = $org->address;
            }
            if ($official->name && $official->name != '-') {
                $officialObject['contactPoint']['name'] = $official->name;
                if ($official->position && $official->position != '-') {
                    $officialObject['contactPoint']['name'] .= ', ' . $official->position;
                }
            }
            if ($official->email && $official->email != '-') {
                $officialObject['contactPoint']['email'] = $official->email;
            }
            if ($official->phone && $official->phone != '-') {
                $officialObject['contactPoint']['telephone'] = $official->phone;
            }
            // if ($org->phone && $org->phone != '-') {
            //     $officialObject['contactPoint']['telephone'] = $org->phone;
            // }
            // if ($project->tenders()->first()) {
            //     $tender = $project->tenders()->first();
            //     if ($tender->official) {
            //         $official = $project->tenders()->first()->official;
            //         $officialObject['additionalContactPoints'] = [
            //             'name' => $official->name,
            //         ];
            //         if ($official->phone && $official->phone != '-') {
            //             $officialObject['additionalContactPoints']['telephone'] = $official->phone;
            //         }
            //     }
            // }
            $p['parties'][] = $officialObject;
        }
        // $files = $project->file()->latest()->get();
        // if ($files->count()) {
        //     $p['documents'] = $files->map(function ($file) {
        //         $f['id'] = $file->id;
        //         $f['title'] = $file->document_name;
        //         $f['description'] = $file->document_description;
        //         $f['url'] = url('storage/' . $file->document_path);
        //         $f['datePublished'] = $file->created_at->format('c');
        //         $f['dateModified'] = $file->updated_at->format('c');
        //         $f['author'] = $file->author;
        //         return $f;
        //     });
        // }

        // budgetBreakdown
        // if ($project->project_budget()->count() && isset($officialObject)) {
        //     $sources = $project->project_budget()->oldest()->first()->source;
        //     foreach ($sources as $source) {
        //         if (in_array($source->source->acronym, ['DAU', 'DAK', 'APBD'])) {
        //             $sourceParty = [
        //                 'id' => $officialObject['id'],
        //                 'name' => $officialObject['name'],
        //             ];
        //         } else {
        //             $sourceParty = [
        //                 'id' => $source->source->id,
        //                 'name' => $source->source->source_name,
        //             ];
        //         }
        //         $sourceArray = [
        //             'id' => $source->source->id,
        //             'description' => $source->source->source_name,
        //             'sourceParty' => $sourceParty,
        //         ];
        //         $p['budget']['budgetBreakdown'][] = $sourceArray;
        //     }
        // }

        // contract
        $contracts = \App\Models\Contract::whereIn('awards_id', \App\Models\Award::whereIn('tender_id', $project->tenders()->pluck('id'))->pluck('id'))->latest()->get();
        if ($contracts->count()) {
            $p['contractingProcesses'] = $contracts->map(function ($contract) {
                $c['id'] = $contract->id;
                // $c['summary']['ocid'] = $contract->id;
                $c['summary']['title'] = $contract->contract_title;
                if ($contract->contract_scope) {
                    $c['summary']['description'] = $contract->contract_scope;
                }
                // tender
                $award = $contract->award;
                $tender = $award->tender;
                if ($tender->tender_method) {
                    $c['summary']['tender'] = [
                        'procurementMethod' => 'open',
                        'procurementMethodDetails' => $tender->tender_method->method_name,
                    ];
                }
                // $c['summary']['tender'] = [
                // 'title' => $tender->project_process_name,
                // 'costEstimate' => [
                //     'amount' => $award->contract_estimate_cost,
                //     'currency' => 'IDR',
                // ],
                // 'numberOfTenderers' => $award->participants_number,
                // ];
                if ($award->participants_number) {
                    $c['summary']['tender']['numberOfTenderers'] = $award->participants_number;
                }
                // $c['suppliers ']

                // doesnt have column for nature
                $c['summary']['nature'] = ['construction'];

                // administrativeEntitiy
                $project = $tender->project;
                if ($tender->project->official) {
                    $official = $project->official;
                    $org = $official->unit->org;
                    $c['summary']['tender']['administrativeEntity'] = [
                        'id' => $official->unit->id,
                        'name' => $org->name . ', ' . $official->unit->unit_name,
                    ];
                }

                // contractValue
                $c['summary']['contractValue'] = [
                    'amount' => $contract->price_local_currency,
                    'currency' => 'IDR',
                ];

                $offerers = \App\Models\Offerer::whereIn('id', \App\Models\TenderOfferer::whereIn('tender_id', $project->tenders()->pluck('id'))->pluck('offerer_id'))->latest()->get();
                // suppliers
                if ($offerers->count()) {
                    $offerer = $offerers->first();
                    $c['summary']['suppliers'][] = [
                        'id' => $offerer->id,
                        'name' => $offerer->legal_name,
                    ];
                }

                $procuringEntity = $project->tenders()->first();
                if ($procuringEntity?->official?->unit?->org) {
                    $org = $official->unit->org;
                    $c['summary']['tender']['procuringEntity'] = [
                        'id' => $procuringEntity->official->unit->id,
                        'name' => $procuringEntity->official->unit->org?->name . ', ' . $procuringEntity->official->unit->name,
                    ];
                }

                // cost estimate
                if ($award->contract_estimate_cost) {
                    $c['summary']['tender']['costEstimate'] = [
                        'amount' => $award->contract_estimate_cost,
                        'currency' => 'IDR',
                    ];
                }

                return $c;
            });
            $contract = $contracts->first();
            if ($contract->completion) {
                $completion = $contract->completion;
                $p['completion'] = [
                    'finalValue' => [
                        'amount' => $completion->final_cost,
                        'currency' => 'IDR',
                    ],
                    'endDate' => $completion->date->format('c'),
                ];
                if ($completion->final_scope) {
                    $p['completion']['finalScope'] = $completion->final_scope;
                }
                if ($completion->justification) {
                    $p['completion']['finalScopeDetails'] = $completion->justification;
                    $p['completion']['finalValueDetails'] = $completion->justification;
                    $p['completion']['endDateDetails'] = $completion->justification;
                }
                if ($completion->description) {
                    $p['completion']['finalScopeDetails'] = $completion->description;
                }
            }
        }

        // tenders as procuringEntity party
        $procuringEntity = $project->tenders()->first();
        if ($procuringEntity && $procuringEntity->official) {
            $official = $procuringEntity->official;
            $partiesCollection = collect($p['parties']);
            $existingParty = $partiesCollection->where('id', $official->unit->id)->first();
            if ($existingParty) {
                $existingPartyKey = array_keys($p['parties'], $existingParty)[0];
                $p['parties'][$existingPartyKey]['roles'][] = 'procuringEntity';
            } else {
                $org = $official->unit->org;
                $procuringEntityArray = [
                    'id' => $official->unit->id,
                    'name' => $org->name . ', ' . $official->unit->unit_name,
                    'contactPoint' => [
                        'name' => $procuringEntity->official->name,
                    ],
                    'roles' => [
                        'procuringEntity',
                    ],
                ];
                if ($procuringEntity->official->email) {
                    $procuringEntityArray['contactPoint']['email'] = $procuringEntity->official->email;
                }
                if ($procuringEntity->official->phone) {
                    $procuringEntityArray['contactPoint']['telephone'] = $procuringEntity->official->phone;
                }
                $p['parties'][] = $procuringEntityArray;
            }
        }

        // landAndSettlementImpact
        if ($project->file()->where('document_type', 'landAndSettlementImpact')->count()) {
            $document = $project->file()->where('document_type', 'landAndSettlementImpact')->first();
            $p['documents'][] = [
                'id' => $document->id,
                'description' => $document->document_description,
                'documentType' => 'landAndSettlementImpact',
                'url' => url('storage/' . $document->document_path),
            ];
        } elseif ($project->settlement_desc) {
            $p['documents'][] = [
                'id' => $project->id . '-doc-1',
                'description' => $project->settlement_desc,
                'documentType' => 'landAndSettlementImpact',
            ];
        }

        // environmentalImpact
        if ($project->file()->where('document_type', 'environmentalImpact')->count()) {
            $document = $project->file()->where('document_type', 'environmentalImpact')->first();
            $p['documents'][] = [
                'id' => $document->id,
                'description' => $document->document_description,
                'documentType' => 'environmentalImpact',
                'url' => url('storage/' . $document->document_path),
            ];
        } elseif ($project->environment_desc) {
            $p['documents'][] = [
                'id' => $project->id . '-doc-2',
                'description' => $project->environment_desc,
                'documentType' => 'environmentalImpact',
            ];
        }

        // finalAudit
        if ($project->file()->where('document_type', 'finalAudit')->count()) {
            $document = $project->file()->where('document_type', 'finalAudit')->first();
            $p['documents'][] = [
                'id' => $document->id,
                'description' => $document->document_description,
                'documentType' => 'technicalAuditReport',
                'url' => url('storage/' . $document->document_path),
            ];
        }

        // contractingProcess aka forecasts and metrics
        if ($project->projectProgresses()->count()) {
            $projectProgresses = $project->projectProgresses;
            $metricPPPO = [
                'id' => 'physicalProgress',
                'title' => 'Physical progress',
            ];
            $metricPPPO['observations'] = $projectProgresses->map(function ($projectProgress) {
                $pp['id'] = $projectProgress->id;
                $pp['measure'] = $projectProgress->real_percent;
                $pp['unit']['name'] = 'percent';
                if ($projectProgress->date_of_advance) {
                    $pp['period'] = [
                        'startDate' => date('c', strtotime($projectProgress->date_of_advance)),
                        'endDate' => date('c', strtotime($projectProgress->date_of_advance)),
                    ];
                }
                return $pp;
            });
            $p['metrics'][] = $metricPPPO;
            $metricFPPO = [
                'id' => 'financialProgress',
                'title' => 'Financial progress',
            ];
            $metricFPPO['observations'] = $projectProgresses->map(function ($projectProgress) {
                $pp['id'] = $projectProgress->id;
                $pp['measure'] = $projectProgress->real_financing;
                $pp['unit']['name'] = 'percent';
                $pp['period'] = [
                    'startDate' => date('c', strtotime($projectProgress->date_of_advance)),
                    'endDate' => date('c', strtotime($projectProgress->date_of_advance)),
                ];

                return $pp;
            });
            $p['metrics'][] = $metricFPPO;

            $forecastPPPO = [
                'id' => 'physicalProgress',
                'title' => 'Physical progress',
            ];
            $forecastPPPO['observations'] = $projectProgresses->map(function ($projectProgress) {
                $pp['id'] = $projectProgress->id;
                $pp['measure'] = $projectProgress->programmed_percent;
                $pp['unit']['name'] = 'percent';
                $pp['period'] = [
                    'startDate' => date('c', strtotime($projectProgress->date_of_advance)),
                    'endDate' => date('c', strtotime($projectProgress->date_of_advance)),
                ];

                return $pp;
            });
            $p['forecasts'][] = $forecastPPPO;
            $forecastFPPO = [
                'id' => 'financialProgress',
                'title' => 'Financial progress',
            ];
            $forecastFPPO['observations'] = $projectProgresses->map(function ($projectProgress) {
                $pp['id'] = $projectProgress->id;
                $pp['measure'] = $projectProgress->scheduled_financing;
                $pp['unit']['name'] = 'percent';
                $pp['period'] = [
                    'startDate' => date('c', strtotime($projectProgress->date_of_advance)),
                    'endDate' => date('c', strtotime($projectProgress->date_of_advance)),
                ];

                return $pp;
            });
            $p['forecasts'][] = $forecastFPPO;
        }

        return $p;
    }

    public function project($project_oc4ids_id)
    {
        $project = Project::where(DB::raw('CONCAT("oc4ids-jj5f2u-", id)'), $project_oc4ids_id)->first();
        if ($project) {
            return $this->projectOc4idsFormat($project);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'project not found!',
        ], 500);
    }

    public function projectBudget($project_oc4ids_id)
    {
        $project = Project::where(DB::raw('CONCAT("oc4ids-jj5f2u-", id)'), $project_oc4ids_id)->first();
        if ($project) {
            $p = $this->projectOc4idsFormat($project);

            return $p['budget'];
        }

        return response()->json([
            'status' => 'error',
            'message' => 'project not found!',
        ], 500);
    }

    public function projectParties($project_oc4ids_id)
    {
        $project = Project::where(DB::raw('CONCAT("oc4ids-jj5f2u-", id)'), $project_oc4ids_id)->first();
        if ($project) {
            $p = $this->projectOc4idsFormat($project);

            return $p['parties'];
        }

        return response()->json([
            'status' => 'error',
            'message' => 'project not found!',
        ], 500);
    }

    public function projectPublicAuthority($project_oc4ids_id)
    {
        $project = Project::where(DB::raw('CONCAT("oc4ids-jj5f2u-", id)'), $project_oc4ids_id)->first();
        if ($project) {
            $p = $this->projectOc4idsFormat($project);

            return $p['publicAuthority'];
        }

        return response()->json([
            'status' => 'error',
            'message' => 'project not found!',
        ], 500);
    }

    public function projectContractingProcesses($project_oc4ids_id)
    {
        $project = Project::where(DB::raw('CONCAT("oc4ids-jj5f2u-", id)'), $project_oc4ids_id)->first();
        if ($project) {
            $p = $this->projectOc4idsFormat($project);

            return $p['contractingProcesses'];
        }

        return response()->json([
            'status' => 'error',
            'message' => 'project not found!',
        ], 500);
    }

    public function projectDocuments($project_oc4ids_id)
    {
        $project = Project::where(DB::raw('CONCAT("oc4ids-jj5f2u-", id)'), $project_oc4ids_id)->first();
        if ($project) {
            $p = $this->projectOc4idsFormat($project);

            return $p['documents'];
        }

        return response()->json([
            'status' => 'error',
            'message' => 'project not found!',
        ], 500);
    }

    public function documentation()
    {
        return view('metronic.documentation');
    }

    public function publicationPolicy()
    {
        return view('metronic.publication_policy');
    }

    public function exportCsv()
    {
        // Get all projects
        $projects = Project::latest()->get();
        
        // Create temporary directory for CSV files
        $tempDir = storage_path('app/temp/csv_export_' . time());
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0755, true);
        }

        // Initialize CSV files
        $csvFiles = [
            'projects' => fopen($tempDir . '/projects.csv', 'w'),
            'parties' => fopen($tempDir . '/parties.csv', 'w'),
            'contracts' => fopen($tempDir . '/contracts.csv', 'w'),
            'documents' => fopen($tempDir . '/documents.csv', 'w'),
            'metrics' => fopen($tempDir . '/metrics.csv', 'w'),
            'forecasts' => fopen($tempDir . '/forecasts.csv', 'w')
        ];

        // Write headers for each CSV
        fputcsv($csvFiles['projects'], ['id', 'title', 'description', 'status', 'startDate', 'endDate', 'durationInDays', 'sector', 'purpose', 'type']);
        fputcsv($csvFiles['parties'], ['project_id', 'party_id', 'name', 'roles', 'contact_name', 'email', 'phone', 'address']);
        fputcsv($csvFiles['contracts'], ['project_id', 'contract_id', 'title', 'description', 'procurementMethod', 'numberOfTenderers', 'contractValue', 'supplier_id', 'supplier_name']);
        fputcsv($csvFiles['documents'], ['project_id', 'document_id', 'description', 'documentType', 'url']);
        fputcsv($csvFiles['metrics'], ['project_id', 'metric_id', 'title', 'measure', 'date']);
        fputcsv($csvFiles['forecasts'], ['project_id', 'forecast_id', 'title', 'measure', 'date']);

        // Process each project
        foreach ($projects as $project) {
            $projectData = $this->projectOc4idsFormat($project);
            
            // Write project data
            fputcsv($csvFiles['projects'], [
                $projectData['id'],
                $projectData['title'],
                $projectData['description'] ?? '',
                $projectData['status'] ?? '',
                $projectData['period']['startDate'] ?? '',
                $projectData['period']['endDate'] ?? '',
                $projectData['period']['durationInDays'] ?? '',
                implode(',', $projectData['sector'] ?? []),
                $projectData['purpose'] ?? '',
                $projectData['type'] ?? ''
            ]);

            // Write parties data
            if (isset($projectData['parties'])) {
                foreach ($projectData['parties'] as $party) {
                    fputcsv($csvFiles['parties'], [
                        $projectData['id'],
                        $party['id'],
                        $party['name'],
                        implode(',', $party['roles'] ?? []),
                        $party['contactPoint']['name'] ?? '',
                        $party['contactPoint']['email'] ?? '',
                        $party['contactPoint']['telephone'] ?? '',
                        $party['address']['streetAddress'] ?? ''
                    ]);
                }
            }

            // Write contracts data
            if (isset($projectData['contractingProcesses'])) {
                foreach ($projectData['contractingProcesses'] as $contract) {
                    fputcsv($csvFiles['contracts'], [
                        $projectData['id'],
                        $contract['id'],
                        $contract['summary']['title'],
                        $contract['summary']['description'] ?? '',
                        $contract['summary']['tender']['procurementMethod'] ?? '',
                        $contract['summary']['tender']['numberOfTenderers'] ?? '',
                        $contract['summary']['contractValue']['amount'] ?? '',
                        $contract['summary']['suppliers'][0]['id'] ?? '',
                        $contract['summary']['suppliers'][0]['name'] ?? ''
                    ]);
                }
            }

            // Write documents data
            if (isset($projectData['documents'])) {
                foreach ($projectData['documents'] as $document) {
                    fputcsv($csvFiles['documents'], [
                        $projectData['id'],
                        $document['id'],
                        $document['description'] ?? '',
                        $document['documentType'] ?? '',
                        $document['url'] ?? ''
                    ]);
                }
            }

            // Write metrics data
            if (isset($projectData['metrics'])) {
                foreach ($projectData['metrics'] as $metric) {
                    foreach ($metric['observations'] as $observation) {
                        fputcsv($csvFiles['metrics'], [
                            $projectData['id'],
                            $metric['id'],
                            $metric['title'],
                            $observation['measure'],
                            $observation['period']['startDate']
                        ]);
                    }
                }
            }

            // Write forecasts data
            if (isset($projectData['forecasts'])) {
                foreach ($projectData['forecasts'] as $forecast) {
                    foreach ($forecast['observations'] as $observation) {
                        fputcsv($csvFiles['forecasts'], [
                            $projectData['id'],
                            $forecast['id'],
                            $forecast['title'],
                            $observation['measure'],
                            $observation['period']['startDate']
                        ]);
                    }
                }
            }
        }

        // Close all CSV files
        foreach ($csvFiles as $file) {
            fclose($file);
        }

        // Create zip file
        $zipFile = storage_path('app/public/oc4ids_export_' . date('Y-m-d_His') . '.zip');
        $zip = new \ZipArchive();
        $zip->open($zipFile, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        // Add CSV files to zip
        foreach (glob($tempDir . '/*.csv') as $file) {
            $zip->addFile($file, basename($file));
        }

        $zip->close();

        // Clean up temporary directory
        array_map('unlink', glob($tempDir . '/*.*'));
        rmdir($tempDir);

        // Return zip file for download
        return response()->download($zipFile)->deleteFileAfterSend(true);
    }
}
