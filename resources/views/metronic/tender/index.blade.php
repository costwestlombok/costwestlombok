@extends('layouts.metronic')
@section('content')
<!--begin::Subheader-->
<div class="py-2 subheader py-lg-4 subheader-transparent" id="kt_subheader">
    <div class="container flex-wrap d-flex align-items-center justify-content-between flex-sm-nowrap">
        <!--begin::Details-->
        <div class="flex-wrap mr-2 d-flex align-items-center">
            <!--begin::Title-->
            <h5 class="mt-2 mb-2 mr-5 text-dark font-weight-bold">
                {{ __('labels.tender') }} </h5>
            <!--end::Title-->
            @if(isset($project))
            <!--begin::Separator-->
            <div class="mt-2 mb-2 mr-5 bg-gray-200 subheader-separator subheader-separator-ver"></div>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="p-0 my-2 mr-5 breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold">
                <li class="breadcrumb-item">
                    <a href="{{ url('dashboard') }}" class="text-muted">{{ __('labels.dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('project.show', $project) }}" class="text-muted">{{ __('labels.project') }}</a>
                </li>
                <li class="breadcrumb-item">
                    {{ __('labels.tender') }}
                </li>
            </ul>
            <!--end::Breadcrumb-->
            @endif
            <!--begin::Separator-->
            <div class="mt-2 mb-2 mr-5 bg-gray-200 subheader-separator subheader-separator-ver"></div>
            <!--end::Separator-->
            <!--begin::Search Form-->
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $tenders->total() }}
                    Total</span>
                <form class="ml-5"
                    action="{{ isset($project) ? route('project.tender.index', $project) : route('tender.index') }}"
                    method="GET">
                    @if(request()->type)
                    <input type="hidden" name="type" value="{{ request()->type }}">
                    @endif
                    <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                        <input type="text" name="query_tender" value="{{ request()->get('query_tender') }}"
                            class="form-control" id="kt_subheader_search_form"
                            placeholder="{{ __('labels.search') }}...">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/General/Search.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path
                                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Search Form-->
        </div>
        <!--end::Details-->
        @if(isset($project))
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="javascript:history.back()" class="btn btn-default font-weight-bold">{{ __('labels.back') }} </a>
            <!--end::Button-->
        </div>
        <!--end::Toolbar-->
        @else
        @if(Auth::check())
        @if(Auth::user()->type == 'agency')
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="{{ route('tender.index', ['type' => request()->type == 'only_me' ? 'all' : 'only_me']) }}"
                class="mr-2 btn btn-success font-weight-bolder">
                @if(request()->type == 'only_me')
                {{ __('labels.show_all') }} {{ __('labels.tender') }}
                @else
                {{ __('labels.tender') }} {{ Auth::user()->agency->name }}
                @endif
            </a>
            <!--end::Button-->
        </div>
        <!--end::Toolbar-->
        @endif
        @endif
        @endif
    </div>
</div>
<!--end::Subheader-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        @foreach ($tenders as $tender)
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <!--begin::Top-->
                <div class="d-flex">
                    <!--begin: Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex">
                            <!--begin::User-->
                            <div class="mr-auto d-plex flex-column">
                                <!--begin::Name-->
                                <a href="#"
                                    class="mr-3 d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold">{{ $tender->project_process_name }}</a>
                                <!--end::Name-->
                                <!--begin::Contacts-->
                                <div class="mt-2">
                                    <a href="javascript:void(0)"
                                        class="mb-2 mr-5 text-muted text-hover-primary font-weight-bold mr-lg-8 mb-lg-0">
                                        {{ __('labels.tender_code') }}
                                        <strong>{{ $tender->process_number }}</strong></a>
                                </div>
                                <!--end::Contacts-->
                                <!--begin::Contacts-->
                                <div class="mb-2">
                                    <a href="javascript:void(0)"
                                        class="mb-2 mr-5 text-muted text-hover-primary font-weight-bold mr-lg-8 mb-lg-0">
                                        {{ __('labels.project') }}
                                        <strong>{{ $tender->project->project_title }}</strong></a>
                                </div>
                                <!--end::Contacts-->
                            </div>
                            <!--begin::User-->
                            <!--begin::Actions-->
                            <div class="card-toolbar mb-7">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover">
                                            <li class="navi-item">
                                                <a href="{{ route('tender.award.index', $tender) }}" class="navi-link">
                                                    <span class="svg-icon menu-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M3.51471863,18.6568542 L13.4142136,8.75735931 C13.8047379,8.36683502 14.4379028,8.36683502 14.8284271,8.75735931 L16.2426407,10.1715729 C16.633165,10.5620972 16.633165,11.1952621 16.2426407,11.5857864 L6.34314575,21.4852814 C5.95262146,21.8758057 5.31945648,21.8758057 4.92893219,21.4852814 L3.51471863,20.0710678 C3.12419433,19.6805435 3.12419433,19.0473785 3.51471863,18.6568542 Z"
                                                                    fill="#000000" opacity="0.3" />
                                                                <path
                                                                    d="M9.87867966,6.63603897 L13.4142136,3.10050506 C13.8047379,2.70998077 14.4379028,2.70998077 14.8284271,3.10050506 L21.8994949,10.1715729 C22.2900192,10.5620972 22.2900192,11.1952621 21.8994949,11.5857864 L18.363961,15.1213203 C17.9734367,15.5118446 17.3402718,15.5118446 16.9497475,15.1213203 L9.87867966,8.05025253 C9.48815536,7.65972824 9.48815536,7.02656326 9.87867966,6.63603897 Z"
                                                                    fill="#000000" />
                                                                <path
                                                                    d="M17.3033009,4.86827202 L18.0104076,4.16116524 C18.2056698,3.96590309 18.5222523,3.96590309 18.7175144,4.16116524 L20.8388348,6.28248558 C21.0340969,6.47774772 21.0340969,6.79433021 20.8388348,6.98959236 L20.131728,7.69669914 C19.9364658,7.89196129 19.6198833,7.89196129 19.4246212,7.69669914 L17.3033009,5.5753788 C17.1080387,5.38011665 17.1080387,5.06353416 17.3033009,4.86827202 Z"
                                                                    fill="#000000" opacity="0.3" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="ml-2 navi-text"> {{ __('labels.award') }}</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ url('tender-offerer/'.$tender->id) }}" class="navi-link">
                                                    <span class="svg-icon menu-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path
                                                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                <path
                                                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                                    fill="#000000" fill-rule="nonzero" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="ml-2 navi-text"> {{ __('labels.offerer') }}</span>
                                                </a>
                                            </li>
                                            @if(Auth::check())
                                            @if(Auth::user()->type == 'admin' || in_array($tender->id,
                                            App\Tender::whereIn('project_id',
                                            Auth::user()->agency->agencyProjects()->pluck('project_id'))->pluck('id')->toArray()))
                                            <hr>
                                            <li class="navi-item">
                                                <a href="{{ url('tender/'.$tender->id.'/edit') }}" class="navi-link">
                                                    <span class="svg-icon menu-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20"
                                                                    width="15" height="2" rx="1" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="ml-2 navi-text"> {{ __('labels.edit') }}</span>
                                                </a>
                                            </li>
                                            @endif
                                            @if(Auth::user()->type == 'admin' || Auth::user()->agency->projects()->where('projects.id', $tender->project->id)->exists())
                                            <li class="navi-item">
                                                <a href="javascript:deleteFn('tender', '{{ $tender->id }}')"
                                                    class="navi-link">
                                                    <span class="svg-icon menu-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
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
                                                    <span class="ml-2 navi-text"> {{ __('labels.delete') }}</span>
                                                </a>
                                            </li>
                                            @endif
                                            @endif
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <div class="flex-wrap d-flex align-items-center mt-14">
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="mb-4 d-block font-weight-bold">{{ __('labels.start_date') }}</span>
                                <span
                                    class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ $tender->start_date ? $tender->start_date->translatedFormat('l, d M Y') : '-' }}</span>
                            </div>
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="mb-4 d-block font-weight-bold">{{ __('labels.due_date') }}</span>
                                <span
                                    class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{ $tender->end_date ? $tender->end_date->translatedFormat('l, d M Y') : '-' }}</span>
                            </div>
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="mb-4 d-block font-weight-bold">{{ __('labels.extended_date') }}</span>
                                <span
                                    class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ $tender->max_extended_process ? $tender->max_extended_process->translatedFormat('l, d M Y') : '-' }}</span>
                            </div>
                        </div>
                        <div class="flex-wrap d-flex">
                            <!--begin: Item-->
                            <div class="my-5 mr-5 d-flex align-items-center flex-lg-fill">
                                <span class="mr-4">
                                    <i class="flaticon2-architecture-and-city icon-2x"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">{{ __('labels.amount') }}</span>
                                    <span class="font-weight-bolder font-size-h5">{{ number_format($tender->amount) }}
                                        <span class="text-dark-50 font-weight-bold">Tender
                                        </span></span>
                                </div>
                            </div>
                            <!--end: Item-->
                            @if(false)
                            <!--begin: Item-->
                            <div class="my-5 mr-5 d-flex align-items-center flex-lg-fill">
                                <span class="mr-4">
                                    <i class="flaticon-add-label-button icon-2x"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">{{ __('labels.status') }}</span>
                                    <span class="font-weight-bolder font-size-h5">
                                        <span
                                            class="text-dark-50 font-weight-bold"></span>{{ $tender->status->status_name ?? '-' }}</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            @endif
                            <!--begin: Item-->
                            <div class="my-5 mr-5 d-flex align-items-center flex-lg-fill">
                                <span class="mr-4">
                                    <i class="fas fa-gavel icon-2x"></i>
                                </span>
                                <div class="d-flex flex-column flex-lg-fill">
                                    <a href="{{ route('tender.award.index', $tender) }}"
                                        class="text-dark-75 font-weight-bolder font-size-sm">{{ $tender->awards->count() }}
                                        {{ __('labels.award') }}</a>
                                    @if(Auth::check())
                                    @if(Auth::user()->type == 'admin' || in_array($tender->id,
                                    App\Tender::whereIn('project_id',
                                    Auth::user()->agency->agencyProjects()->pluck('project_id'))->pluck('id')->toArray()))
                                    <a href="{{ url('award-create/'.$tender->id) }}"
                                        class="text-primary font-weight-bolder">{{ __('labels.create') }}
                                        {{ __('labels.award') }}</a>
                                    @endif
                                    @endif
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="my-5 mr-5 d-flex align-items-center flex-lg-fill">
                                <span class="mr-4">
                                    <i class="flaticon2-group icon-2x"></i>
                                </span>
                                <div class="d-flex flex-column flex-lg-fill">
                                    <a href="{{ url('tender-offerer/'.$tender->id) }}"
                                        class="text-dark-75 font-weight-bolder font-size-sm">{{ $tender->tender_offerer->count() }}
                                        {{ __('labels.offerer') }}</a>
                                    @if(Auth::check())
                                    @if(Auth::user()->type == 'admin' || in_array($tender->id,
                                    App\Tender::whereIn('project_id',
                                    Auth::user()->agency->agencyProjects()->pluck('project_id'))->pluck('id')->toArray()))
                                    <a href="{{ url('tender-offerer/'.$tender->id) }}"
                                        class="text-primary font-weight-bolder">{{ __('labels.create') }}
                                        {{ __('labels.offerer') }}</a>
                                    @endif
                                    @endif
                                </div>
                            </div>
                            <!--end: Item-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Top-->
            </div>
            {{-- <div class="card-footer d-flex align-items-center">
                <a href="javascript:void(0)"
                    class="mt-5 mr-auto btn btn-primary btn-sm text-uppercase font-weight-bolder mt-sm-0 mr-sm-0 ml-sm-auto">details</a>
            </div> --}}
        </div>
        <!--end::Card-->
        @endforeach

        @include('metronic.shared.pagination', ['data' => $tenders])
    </div>
    <!--end::Container-->
</div>
@endsection
