@extends('layouts.metronic')
@section('content')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                {{ __('labels.award') }} </h5>
            <!--end::Title-->
            @if(isset($tender))
            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0 mr-5">
                <li class="breadcrumb-item">
                    <a href="{{ url('dashboard') }}" class="text-muted">{{ __('labels.dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('project.show', $tender->project) }}"
                        class="text-muted">{{ __('labels.project') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('project.tender.index', $tender->project) }}"
                        class="text-muted">{{ __('labels.tender') }}</a>
                </li>
                <li class="breadcrumb-item">
                    {{ __('labels.award') }}
                </li>
            </ul>
            <!--end::Breadcrumb-->
            @endif
            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Search Form-->
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{ $awards->total() }} Total</span>
                <form class="ml-5"
                    action="{{ isset($tender) ? route('tender.award.index', $tender) : route('award.index') }}"
                    method="GET">
                    @if(request()->type)
                    <input type="hidden" name="type" value="{{ request()->type }}">
                    @endif
                    <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                        <input type="text" name="query_award" value="{{ request()->get('query_award') }}"
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
        @if(isset($tender))
        @if(Auth::user())
        @if(Auth::user()->type == 'admin' || in_array($tender->id,
        App\Tender::whereIn('project_id',
        Auth::user()->agency->agencyProjects()->pluck('project_id'))->pluck('id')->toArray()))
        <!--begin::Toolbar-->
        <div class="d-flex align-items-right">
            <!--begin::Button-->
            <a href="{{ route('tender.award.create', $tender) }}" class="btn btn-primary font-weight-bolder m-l-2"><span
                    class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="9" cy="15" r="6" />
                            <path
                                d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>{{ __('labels.create') }} {{ __('labels.award') }}</a>
            <!--end::Button-->
        </div>
        <!--end::Toolbar-->
        @endif
        @endif
        @else
        @if(Auth::check())
        @if(Auth::user()->type == 'agency')
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="{{ route('award.index', ['type' => request()->type == 'only_me' ? 'all' : 'only_me']) }}"
                class="btn btn-success font-weight-bolder mr-2">
                @if(request()->type == 'only_me')
                {{ __('labels.show_all') }} {{ __('labels.award') }}
                @else
                {{ __('labels.award') }} {{ Auth::user()->agency->name }}
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
        @foreach ($awards as $award)
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
                            <div class="d-plex flex-column mr-auto">
                                <!--begin::Name-->
                                <a href="#"
                                    class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $award->process_number }}</a>
                                <!--end::Name-->
                                <!--begin::Contacts-->
                                <div class="my-2">
                                    <span class="text-muted font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        {{ __('labels.award_process_number') }}</span>
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
                                                <a href="{{ Auth::user() ? 
                                                    (empty($award->contract) ? 
                                                        (in_array($award->id, App\Award::whereIn('tender_id', App\Tender::whereIn('project_id', Auth::user()->agency->agencyProjects()->pluck('project_id'))->pluck('id'))->pluck('id')->toArray()) ? 
                                                            route('award.contract.create', $award->id) : route('award.contract.index', $award->id)
                                                        ) : 
                                                        route('award.contract.index', $award->id)
                                                    ) : 
                                                    route('award.contract.index', $award->id) }}" class="navi-link">
                                                    <span class="svg-icon menu-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path
                                                                    d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                                    fill="#000000" opacity="0.3" />
                                                                <path
                                                                    d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                                    fill="#000000" />
                                                                <rect fill="#000000" opacity="0.3" x="10" y="9"
                                                                    width="7" height="2" rx="1" />
                                                                <rect fill="#000000" opacity="0.3" x="7" y="9" width="2"
                                                                    height="2" rx="1" />
                                                                <rect fill="#000000" opacity="0.3" x="7" y="13"
                                                                    width="2" height="2" rx="1" />
                                                                <rect fill="#000000" opacity="0.3" x="10" y="13"
                                                                    width="7" height="2" rx="1" />
                                                                <rect fill="#000000" opacity="0.3" x="7" y="17"
                                                                    width="2" height="2" rx="1" />
                                                                <rect fill="#000000" opacity="0.3" x="10" y="17"
                                                                    width="7" height="2" rx="1" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="navi-text ml-2"> {{ __('labels.contract') }}</span>
                                                </a>
                                            </li>
                                            @if(Auth::check())
                                            @if(Auth::user()->type == 'admin' || in_array($award->id,
                                            App\Award::whereIn('tender_id', App\Tender::whereIn('project_id',
                                            Auth::user()->agency->agencyProjects()->pluck('project_id'))->pluck('id'))->pluck('id')->toArray()))
                                            <hr>
                                            <li class="navi-item">
                                                <a href="{{ url('award/'.$award->id.'/edit') }}" class="navi-link">
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
                                                    <span class="navi-text ml-2"> {{ __('labels.edit') }}</span>
                                                </a>
                                            </li>
                                            @endif
                                            @if(Auth::user()->type == 'admin')
                                            <li class="navi-item">
                                                <a href="javascript:deleteFn('award', '{{ $award->id }}')"
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
                            <!--end::Actions-->
                        </div>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <div class="d-flex align-items-center flex-wrap mt-14">
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="d-block font-weight-bold mb-4">{{ __('labels.publication_date') }}</span>
                                <span
                                    class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($award->published_at)->translatedFormat('l, d F Y') }}</span>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap">
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                                <span class="mr-4">
                                    <i class="flaticon2-tag icon-2x"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span
                                        class="font-weight-bolder font-size-sm">{{ __('labels.estimated_cost') }}</span>
                                    <span class="font-weight-bolder font-size-h5">
                                        <span class="text-dark-50 font-weight-bold">Rp
                                        </span>{{ number_format($award->contract_estimate_cost) }}</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                                <span class="mr-4">
                                    <i class="flaticon-price-tag icon-2x"></i>
                                </span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">{{ __('labels.cost') }}</span>
                                    <span class="font-weight-bolder font-size-h5">
                                        <span class="text-dark-50 font-weight-bold">Rp
                                        </span>{{ number_format($award->cost) }}</span>
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                                <div class="mr-4 flex-shrink-0 text-center">
                                    <i class="flaticon2-group icon-2x"></i>
                                </div>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">
                                        {{ number_format($award->participants_number) }} {{ __('labels.participant') }}
                                    </span>
                                    {{-- <a href="javascript:void(0)"
                                        class="text-primary font-weight-bolder subheader-separator subheader-separator-ver">
                                        View Detail
                                    </a> --}}
                                </div>
                            </div>
                            <!--end: Item-->
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                                <span class="mr-4">
                                    <i class="fas fa-file-signature icon-2x"></i>
                                </span>
                                <div class="d-flex flex-column flex-lg-fill">
                                    <span class="text-dark-75 font-weight-bolder font-size-sm">
                                        {{ !empty($award->contract) ? $award->contract()->count() : 0 }}
                                        {{ __('labels.contract') }}
                                    </span>
                                    @if(empty($award->contract))
                                    @if(Auth::user())
                                    @if(Auth::user()->type == 'admin' || in_array($award->id,
                                    App\Award::whereIn('tender_id', App\Tender::whereIn('project_id',
                                    Auth::user()->agency->agencyProjects()->pluck('project_id'))->pluck('id'))->pluck('id')->toArray()))
                                    <a href="{{ route('award.contract.create', $award->id) }}"
                                        class="text-primary font-weight-bolder">
                                        {{ __('labels.create') }} {{ __('labels.contract') }}
                                    </a>
                                    @endif
                                    @endif
                                    @else
                                    <a href="{{ route('award.contract.index', $award->id) }}"
                                        class="text-primary font-weight-bolder subheader-separator subheader-separator-ver">
                                        {{ __('labels.view_detail') }}
                                    </a>
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
                    class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</a>
            </div> --}}
        </div>
        <!--end::Card-->
        @endforeach

        @include('metronic.shared.pagination', ['data' => $awards])
    </div>
    <!--end::Container-->
</div>
@endsection