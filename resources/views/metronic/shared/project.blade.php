<!--begin::Card-->
<div class="card card-custom gutter-b card-stretch">
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Section-->
        <div class="d-flex align-items-center">
            <!--begin::Info-->
            <div class="d-flex flex-column mr-auto">
                <!--begin: Title-->
                <a href="{{ route('project.show', $project) }}"
                    class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{ $project->project_title }}</a>
                <span class="text-muted font-weight-bold">{{ __('labels.project_code') }}:
                    {{ $project->project_code }}</span>
                <span
                    class="text-muted font-weight-bold">{{ $project->subsector->sector->sector_name ?? __('labels.no_sector') }}
                    -
                    {{ $project->subsector->subsector_name ?? __('labels.no_subsector') }}</span>
                <!--end::Title-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="card-toolbar mb-auto">
                <div class="dropdown dropdown-inline">
                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="ki ki-bold-more-hor"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover">
                            <li class="navi-item">
                                <a href="{{ route('project.tender.index', $project) }}" class="navi-link">
                                    <span class="svg-icon menu-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                    fill="#000000" />
                                                <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2"
                                                    rx="1" />
                                                <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2"
                                                    rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="navi-text ml-2"> {{ __('labels.tender') }}</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="{{ url('project-file/'.$project->id) }}" class="navi-link">
                                    <span class="svg-icon menu-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M14,16 L12,16 L12,12.5 C12,11.6715729 11.3284271,11 10.5,11 C9.67157288,11 9,11.6715729 9,12.5 L9,17.5 C9,19.4329966 10.5670034,21 12.5,21 C14.4329966,21 16,19.4329966 16,17.5 L16,7.5 C16,5.56700338 14.4329966,4 12.5,4 L12,4 C10.3431458,4 9,5.34314575 9,7 L7,7 C7,4.23857625 9.23857625,2 12,2 L12.5,2 C15.5375661,2 18,4.46243388 18,7.5 L18,17.5 C18,20.5375661 15.5375661,23 12.5,23 C9.46243388,23 7,20.5375661 7,17.5 L7,12.5 C7,10.5670034 8.56700338,9 10.5,9 C12.4329966,9 14,10.5670034 14,12.5 L14,16 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(12.500000, 12.500000) rotate(-315.000000) translate(-12.500000, -12.500000) " />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="navi-text ml-2"> {{ __('labels.document') }}</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="{{ url('project-budget/'.$project->id) }}" class="navi-link">
                                    <span class="svg-icon menu-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <g transform="translate(12.500000, 12.000000) rotate(-315.000000) translate(-12.500000, -12.000000) translate(6.000000, 1.000000)"
                                                    fill="#000000" opacity="0.3">
                                                    <path
                                                        d="M0.353553391,7.14644661 L3.35355339,7.14644661 C3.4100716,7.14644661 3.46549471,7.14175791 3.51945496,7.13274826 C3.92739876,8.3050906 5.04222146,9.14644661 6.35355339,9.14644661 C8.01040764,9.14644661 9.35355339,7.80330086 9.35355339,6.14644661 C9.35355339,4.48959236 8.01040764,3.14644661 6.35355339,3.14644661 C5.04222146,3.14644661 3.92739876,3.98780262 3.51945496,5.16014496 C3.46549471,5.15113531 3.4100716,5.14644661 3.35355339,5.14644661 L0.436511831,5.14644661 C0.912589923,2.30873327 3.3805571,0.146446609 6.35355339,0.146446609 C9.66726189,0.146446609 12.3535534,2.83273811 12.3535534,6.14644661 L12.3535534,19.1464466 C12.3535534,20.2510161 11.4581229,21.1464466 10.3535534,21.1464466 L2.35355339,21.1464466 C1.24898389,21.1464466 0.353553391,20.2510161 0.353553391,19.1464466 L0.353553391,7.14644661 Z"
                                                        transform="translate(6.353553, 10.646447) rotate(-360.000000) translate(-6.353553, -10.646447) " />
                                                    <rect x="2.35355339" y="13.1464466" width="8" height="2" rx="1" />
                                                    <rect x="3.35355339" y="17.1464466" width="6" height="2" rx="1" />
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="navi-text ml-2"> {{ __('labels.budget') }}</span>
                                </a>
                            </li>
                            @if(Auth::check())
                            @if(Auth::user()->type == 'admin' || in_array($project->id,
                            Auth::user()->agency->agencyProjects()->pluck('project_id')->toArray()))
                            <hr>
                            <li class="navi-item">
                                <a href="{{ url('project/'.$project->id.'/edit') }}" class="navi-link">
                                    <span class="svg-icon menu-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2"
                                                    rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="navi-text ml-2"> {{ __('labels.edit') }}</span>
                                </a>
                            </li>
                            @endif
                            @if(Auth::user()->type == 'admin' || Auth::user()->agency->projects()->where('id', $project->id)->exists())
                            <li class="navi-item">
                                <a href="javascript:deleteFn('project', '{{ $project->id }}')" class="navi-link">
                                    <span class="svg-icon menu-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <path
                                                    d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                    fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="navi-text ml-2"> {{ __('labels.delete') }}</span>
                                </a>
                            </li>
                            @endif
                            @endif
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Section-->
        <!--begin::Content-->
        <div class="d-flex flex-wrap mt-14">
            <div class="mr-12 d-flex flex-column mb-7">
                <span class="d-block font-weight-bold mb-4">{{ __('labels.start_date') }}</span>
                <span
                    class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ $project->start_date ? $project->start_date->translatedFormat('l, d M Y') : '-' }}</span>
            </div>
            <div class="mr-12 d-flex flex-column mb-7">
                <span class="d-block font-weight-bold mb-4">{{ __('labels.due_date') }}</span>
                <span
                    class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{ $project->end_date ? $project->end_date->translatedFormat('l, d M Y') : '-' }}</span>
            </div>
            <!--begin::Progress-->
            <div class="flex-row-fluid mb-7">
                <span class="d-block font-weight-bold mb-4">{{ __('labels.progress') }} -
                    {{ __('labels.real_physical') }} <span
                        class="text-muted font-weight-bold">({{ __('labels.last_update') }}:
                        {{ Carbon\Carbon::parse($project->latest_progress->date_of_advance ?? now())->translatedFormat('l, d M Y') }})</span>
                    @if(Auth::check())
                    @if(Auth::user()->type == 'admin' || in_array($project->id,
                    Auth::user()->agency->agencyProjects()->pluck('project_id')->toArray()))
                    <div class="float-right">
                        <a href="{{ url('project-progress/'.$project->id) }}">{{ __('labels.add_progress') }}</a>
                    </div>
                    @endif
                    @endif
                    <div class="d-flex align-items-center pt-2">
                        <div class="progress progress-xs mt-2 mb-2 w-100">
                            <div class="progress-bar bg-warning" role="progressbar"
                                style="width: {{ number_format($project->latest_progress->real_percent ?? '0') }}%;"
                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span
                            class="ml-3 font-weight-bolder">{{ number_format($project->latest_progress->real_percent ?? '0') }}%</span>
                    </div>
            </div>
            <!--end::Progress-->
        </div>
        <!--end::Content-->
        <!--begin::Text-->
        <p class="mb-7 mt-3 text-truncate">{{ $project->project_description }}</p>
        <!--end::Text-->
        <!--begin::Blog-->
        <div class="d-flex flex-wrap">
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                <span class="mr-4">
                    <i class="flaticon-price-tag icon-2x"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">{{ __('labels.budget') }}</span>
                    <span class="font-weight-bolder font-size-h5">
                        <span class="text-dark-50 font-weight-bold">Rp</span>
                        {{ number_format($project->budget) }}
                    </span>
                </div>
            </div>
            <!--end: Item-->
            <!--begin: Item-->
            <!--
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                <span class="mr-4">
                    <i class="fas fa-qrcode icon-2x"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">{{ __('labels.sefin_code') }}</span>
                    <span class="font-weight-bolder font-size-h5">
                        {{ $project->code_sefin ?? '-' }}
                    </span>
                </div>
            </div>
            -->
            <!--end: Item-->
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                <span class="mr-4">
                    <i class="flaticon2-calendar-9 icon-2x"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">{{ __('labels.duration') }}</span>
                    <span class="font-weight-bolder font-size-h5">
                        @if($project->duration)
                        {{ number_format($project->duration) }}
                        <span class="text-dark-50 font-weight-bold"> {{ __('labels.days') }}</span>
                        @else
                        -
                        @endif
                    </span>
                </div>
            </div>
            <!--end: Item-->
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                <span class="mr-4">
                    <i class="flaticon2-file icon-2x"></i>
                </span>
                <div class="d-flex flex-column flex-lg-fill">
                    <a href="{{ route('project.tender.index', $project) }}"
                        class="text-dark-75 font-weight-bolder font-size-sm">{{ number_format($project->tenders->count()) }}
                        {{ __('labels.tender') }}</a>
                    @if(Auth::check())
                    @if(Auth::user()->type == 'admin' || in_array($project->id,
                    Auth::user()->agency->agencyProjects()->pluck('project_id')->toArray()))
                    <a href="{{ route('project.tender.create', $project) }}"
                        class="text-primary font-weight-bolder">{{ __('labels.add') }} {{ __('labels.tender') }}</a>
                    @endif
                    @endif
                </div>
            </div>
            <!--end: Item-->
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                <span class="mr-4">
                    <i class="flaticon2-clip-symbol icon-2x"></i>
                </span>
                <div class="d-flex flex-column flex-lg-fill">
                    <a href="{{ route('project.file.index', $project) }}"
                        class="text-dark-75 font-weight-bolder font-size-sm">{{ number_format($project->file->count()) }}
                        {{ __('labels.document') }}</a>
                    @if(Auth::check())
                    @if(Auth::user()->type == 'admin' || in_array($project->id,
                    Auth::user()->agency->agencyProjects()->pluck('project_id')->toArray()))
                    <a href="{{ route('project.file.index', $project) }}"
                        class="text-primary font-weight-bolder">{{ __('labels.add') }} {{ __('labels.document') }}</a>
                    @endif
                    @endif
                </div>
            </div>
            <!--end: Item-->
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                <span class="mr-4">
                    <i class="flaticon-price-tag icon-2x"></i>
                </span>
                <div class="d-flex flex-column flex-lg-fill">
                    <a href="{{ url('project-budget/'.$project->id) }}"
                        class="text-dark-75 font-weight-bolder font-size-sm">{{ number_format($project->project_budget->count()) }}
                        {{ __('labels.budget') }}</a>
                    @if(Auth::check())
                    @if(Auth::user()->type == 'admin' || in_array($project->id,
                    Auth::user()->agency->agencyProjects()->pluck('project_id')->toArray()))
                    <a href="{{ url('project-budget/'.$project->id) }}"
                        class="text-primary font-weight-bolder">{{ __('labels.add') }} {{ __('labels.budget') }}</a>
                    @endif
                    @endif
                </div>
            </div>
            <!--end: Item-->
        </div>
        <!--end::Blog-->
    </div>
    <!--end::Body-->
    <!--begin::Footer-->
    <div class="card-footer d-flex align-items-center">
        <a href="{{ route('project.show', $project) }}"
            class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">{{ __('labels.details') }}</a>
    </div>
    <!--end::Footer-->
</div>
<!--end::Card-->