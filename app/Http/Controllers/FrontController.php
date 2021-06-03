<?php

namespace App\Http\Controllers;

use App\Project;
use Auth;
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
            \App\Project::latest()->first()->created_at ?? null,
            \App\Completion::latest()->first()->created_at ?? null,
            \App\Contract::latest()->first()->created_at ?? null,
            \App\Budget::latest()->first()->created_at ?? null,
            \App\File::latest()->first()->created_at ?? null,
        ];
        $arr_map = array_map('strtotime', $arr);
        $projects = \App\Project::latest()->get()->map(function ($project) {
            $p['id'] = 'oc4ids-jj5f2u-' . $project->id;
            $p['externalReference'] = $project->project_code;
            $p['updated'] = $project->updated_at->format('c');
            $p['title'] = $project->project_title;
            if ($project->subsector_id) {
                $p['description'] = $project->project_description;
            }
            if ($project->projectStatus) {
                $p['status'] = $project->projectStatus->code;
            }
            $p['period'] = [
                'startDate' => date('c', strtotime($project->start_date)),
                'endDate' => date('c', strtotime($project->end_date)),
                'durationInDays' => $project->duration,
            ];
            if ($project->subsector_id) {
                // $p['sector'] = [$project->subsector->sector->sector_name];
                $p['sector'] = [
                    $project->subsector->sector->sector_code,
                    $project->subsector->subsector_code,
                ];
            }
            if ($project->purpose) {
                $p['purpose'] = $project->purpose->purpose_name;
            }
            $p['type'] = 'rehabilitation'; // https://standard.open-contracting.org/infrastructure/latest/en/reference/codelists/#projecttype
            if ($project->initial_lat && $project->initial_lon && $project->final_lat && $project->final_lon) {
                $coordinate_initial = new Coordinate([$project->initial_lat, $project->initial_lon], Ellipsoid::createFromName(Ellipsoid::GRS_1980));
                $coordinate_final = new Coordinate([$project->final_lat, $project->final_lon], Ellipsoid::createFromName(Ellipsoid::GRS_1980));
                $p['locations'] = [
                    [
                        'id' => $project->id . '-1',
                        'description' => 'Start Point',
                        'geometry' => [
                            'type' => 'Point',
                            'coordinates' => [round($coordinate_initial->getEllipsoid()->getA()), round($coordinate_initial->getEllipsoid()->getB())],
                        ],
                    ], [
                        'id' => $project->id . '-2',
                        'description' => 'End Point',
                        'geometry' => [
                            'type' => 'Point',
                            'coordinates' => [round($coordinate_final->getEllipsoid()->getA()), round($coordinate_final->getEllipsoid()->getB())],
                        ],
                    ],
                ];
            }
            if ($project->project_budget()->count()) {
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
            $offerers = \App\Offerer::whereIn('id', \App\TenderOfferer::whereIn('tender_id', $project->tenders()->pluck('id'))->pluck('offerer_id'))->latest()->get();
            if ($offerers->count()) {
                $p['parties'] = $offerers->map(function ($offerer) {
                    $o['name'] = $offerer->legal_name;
                    $o['id'] = $offerer->id;
                    // $o['identifier'] = [
                    //     'legalName' => $offerer->legal_name,
                    //     'id' => $offerer->id,
                    // ];
                    $o['contactPoint']['name'] = $offerer->offerer_name;
                    if ($offerer->website && $offerer->website != '-') {
                        $o['identifier']['uri'] = $offerer->website;
                    }
                    if ($offerer->address && $offerer->address != '-') {
                        $o['address']['streetAddress'] = $offerer->address;
                    }
                    if ($offerer->phone && $offerer->phone != '-') {
                        $o['contactPoint']['telephone'] = $offerer->phone;
                    }
                    $o['roles'] = [
                        'tenderer',
                        'supplier',
                    ];
                    return $o;
                });
            }
            if ($project->official) {
                $official = $project->official;
                $org = $official->unit->org;
                $officialObject = [
                    'id' => $org->id,
                    'name' => $org->name . ', ' . $official->unit->unit_name,
                    'roles' => ['publicAuthority', 'administrativeEntity', 'procuringEntity'],
                ];
                $p['publicAuthority'] = [
                    'id' => $org->id,
                    'name' => $org->name . ', ' . $official->unit->unit_name,
                ];
                if ($project->project_budget()->count()) {
                    $budget = $project->project_budget()->first();
                    if ($budget->source()->count()) {
                        $source = $budget->source()->first();
                        if ($source->source) {
                            if ($source->source->acronym == 'PRIM') {
                                $p['parties'][] = [
                                    'name' => 'GRANT',
                                    'id' => '11303000-6752-11eb-904c-b984ec60b957',
                                    'roles' => [
                                        'funder',
                                    ],
                                ];
                            } else if (in_array($source->source->acronym, ['DAU', 'DAK'])) {
                                $officialObject['roles'][] = 'funder';
                            }
                        }
                    }
                }
                if ($org->website && $org->website != '-') {
                    $officialObject['identifier']['uri'] = $org->website;
                }
                if ($org->address && $org->address != '-') {
                    $officialObject['address']['streetAddress'] = $org->address;
                }
                if ($official->name && $official->name != '-') {
                    $officialObject['contactPoint']['name'] = $official->name;
                    if ($official->position && $official->position != '-') {
                        $officialObject['contactPoint']['name'] .= ', '.$official->position;
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

            // contract
            $contracts = \App\Contract::whereIn('awards_id', \App\Award::whereIn('tender_id', $project->tenders()->pluck('id'))->pluck('id'))->latest()->get();
            if ($contracts->count()) {
                $p['contractingProcesses'] = $contracts->map(function ($contract) {
                    $c['id'] = $contract->id;
                    // $c['summary']['ocid'] = $contract->id;
                    $c['summary']['title'] = $contract->contract_title;
                    $c['summary']['description'] = $contract->contract_scope;
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
                    if ($tender->project->official) {
                        $project = $tender->project;
                        $official = $project->official;
                        $org = $official->unit->org;
                        $c['summary']['tender']['administrativeEntity'] = [
                            'id' => $org->id,
                            'name' => $org->name . ', ' . $official->unit->unit_name,
                        ];
                    }

                    // contractValue
                    $c['summary']['contractValue'] = [
                        'amount' => $contract->price_local_currency,
                        'currency' => 'IDR',
                    ];

                    $offerers = \App\Offerer::whereIn('id', \App\TenderOfferer::whereIn('tender_id', $project->tenders()->pluck('id'))->pluck('offerer_id'))->latest()->get();
                    // suppliers
                    if ($offerers->count()) {
                        $offerer = $offerers->first();
                        $c['summary']['suppliers'][] = [
                            'id' => $offerer->id,
                            'name' => $offerer->legal_name,
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
                            'currency' => 'IDR'
                        ],
                        'endDate' => $completion->date->format('c'),
                        'finalScope' => $completion->final_scope,
                    ];
                    if ($completion->justification) {
                        $p['completion']['finalValueDetails'] = $completion->justification;
                        $p['completion']['endDateDetails'] = $completion->justification;
                    }
                    if ($completion->description) {
                        $p['completion']['finalScopeDetails'] = $completion->description;
                    }
                }
            }

            // landAndSettlementImpact
            if ($project->file()->where('document_type', 'landAndSettlementImpact')->count()) {
                $document = $project->file()->where('document_type', 'landAndSettlementImpact')->first();
                $p['documents'][] = [
                    'id' => $document->id,
                    'description' => $document->document_description,
                    'type' => 'landAndSettlementImpact',
                    'url' => url('storage/'.$document->document_path),
                ];
            } elseif ($project->settlement_desc) {
                $p['documents'][] = [
                    'id' => $project->id.'-doc-1',
                    'description' => $project->settlement_desc,
                    'type' => 'landAndSettlementImpact',
                ];
            }

            // environmentalImpact
            if ($project->file()->where('document_type', 'environmentalImpact')->count()) {
                $document = $project->file()->where('document_type', 'environmentalImpact')->first();
                $p['documents'][] = [
                    'id' => $document->id,
                    'description' => $document->document_description,
                    'type' => 'environmentalImpact',
                    'url' => url('storage/'.$document->document_path),
                ];
            } elseif ($project->environment_desc) {
                $p['documents'][] = [
                    'id' => $project->id.'-doc-2',
                    'description' => $project->environment_desc,
                    'type' => 'environmentalImpact',
                ];
            }

            // finalAudit
            if ($project->file()->where('document_type', 'finalAudit')->count()) {
                $document = $project->file()->where('document_type', 'finalAudit')->first();
                $p['documents'][] = [
                    'id' => $document->id,
                    'description' => $document->document_description,
                    'type' => 'finalAudit',
                    'url' => url('storage/'.$document->document_path),
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
                    $pp['period'] = [
                        'startDate' => date('c', strtotime($projectProgress->date_of_advance)),
                        'endDate' => date('c', strtotime($projectProgress->date_of_advance)),
                    ];
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
        });

        $oc4ids = [
            "version" => "0.9",
            "uri" => "https://cost.digitalcommunity.id/oc4ids",
            "publishedDate" => $arr[array_search(max($arr_map), $arr_map)]->format('c'),
            "publisher" => [
                "name" => "CoST West Lombok",
                // "scheme" => "GB-COH",
                // "uid" => "9506232",
                // "uri" => "http://data.companieshouse.gov.uk/doc/company/09506232"
            ],
            // "publicationPolicy" => "https://standard.open-contracting.org/1.1/en/implementation/publication_policy/",
            "projects" => $projects->toArray(),
        ];
        $oc_json = json_encode($oc4ids, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        Storage::disk('public')->put('docs/oc4ids.json', $oc_json);
        return redirect('storage/docs/oc4ids.json');
    }
}
