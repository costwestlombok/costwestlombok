@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!--begin::Nav Panel Widget 2-->
                <div class="card card-custom gutter-b card-stretch card-shadowless">
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <!--begin::Nav Tabs-->
                        <ul class="dashboard-tabs nav nav-pills nav-danger m-0 p-0" role="tablist">
                            <!--begin::Item-->
                            <li class="nav-item d-flex flex-grow-1 flex-shrink-0 mr-3">
                                <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center active"
                                    data-toggle="pill" href="#tab_forms_widget_1">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x">
                                            <!--begin::Svg Icon | path:/metronic/assets/media/svg/icons/Home/Library.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M15.9956071,6 L9,6 C7.34314575,6 6,7.34314575 6,9 L6,15.9956071 C4.70185442,15.9316381 4,15.1706419 4,13.8181818 L4,6.18181818 C4,4.76751186 4.76751186,4 6.18181818,4 L13.8181818,4 C15.1706419,4 15.9316381,4.70185442 15.9956071,6 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M10.1818182,8 L17.8181818,8 C19.2324881,8 20,8.76751186 20,10.1818182 L20,17.8181818 C20,19.2324881 19.2324881,20 17.8181818,20 L10.1818182,20 C8.76751186,20 8,19.2324881 8,17.8181818 L8,10.1818182 C8,8.76751186 8.76751186,8 10.1818182,8 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span
                                        class="nav-text font-size-lg py-2 font-weight-bold text-center">{{ __('labels.project') }}<br />{{ $projects->count() }}</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item d-flex flex-grow-1 flex-shrink-0 mr-3">
                                <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    data-toggle="pill" href="#tab_forms_widget_2">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x">
                                            <!--begin::Svg Icon | path:/metronic/assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path
                                                        d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z"
                                                        fill="#000000"></path>
                                                    <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1">
                                                    </rect>
                                                    <path
                                                        d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z"
                                                        fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span
                                        class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ __('labels.tender') }}<br />{{ Auth::user()->agency_id ? App\Tender::whereIn('project_id', $projects->pluck('id'))->count() : App\Tender::count() }}</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item d-flex flex-grow-1 flex-shrink-0 mr-3">
                                <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    data-toggle="pill" href="#tab_forms_widget_3">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x">
                                            <!--begin::Svg Icon | path:/metronic/assets/media/svg/icons/Media/Movie-Lane2.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M4,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M5,11 L10,11 C10.5522847,11 11,11.4477153 11,12 L11,19 C11,19.5522847 10.5522847,20 10,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,12 C4,11.4477153 4.44771525,11 5,11 Z M14,11 L19,11 C19.5522847,11 20,11.4477153 20,12 L20,19 C20,19.5522847 19.5522847,20 19,20 L14,20 C13.4477153,20 13,19.5522847 13,19 L13,12 C13,11.4477153 13.4477153,11 14,11 Z"
                                                        fill="#000000" />
                                                    <path
                                                        d="M14.4452998,2.16794971 C14.9048285,1.86159725 15.5256978,1.98577112 15.8320503,2.4452998 C16.1384028,2.90482849 16.0142289,3.52569784 15.5547002,3.83205029 L12,6.20185043 L8.4452998,3.83205029 C7.98577112,3.52569784 7.86159725,2.90482849 8.16794971,2.4452998 C8.47430216,1.98577112 9.09517151,1.86159725 9.5547002,2.16794971 L12,3.79814957 L14.4452998,2.16794971 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span
                                        class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ __('labels.award') }}<br />{{ Auth::user()->agency_id ? App\Award::whereIn('tender_id', App\Tender::whereIn('project_id', $projects->pluck('id'))->pluck('id'))->count() : App\Award::count() }}</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item d-flex flex-grow-1 flex-shrink-0 mr-3">
                                <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    data-toggle="pill" href="#tab_forms_widget_4">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x">
                                            <!--begin::Svg Icon | path:/metronic/assets/media/svg/icons/Media/Equalizer.svg-->
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
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span
                                        class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ __('labels.contract') }}<br />{{ Auth::user()->agency_id ? App\Contract::whereIn('awards_id', App\Award::whereIn('tender_id', App\Tender::whereIn('project_id', $projects->pluck('id'))->pluck('id'))->pluck('id'))->count() : App\Contract::count() }}</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            @if(Auth::user()->type == 'admin')
                            <!--begin::Item-->
                            <li class="nav-item d-flex flex-grow-1 flex-shrink-0 mr-3">
                                <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    data-toggle="pill" href="#tab_forms_widget_5">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x">
                                            <!--begin::Svg Icon | path:/metronic/assets/media/svg/icons/General/Shield-check.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span
                                        class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ __('labels.offerer') }}<br />{{ App\Offerer::count() }}</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item d-flex flex-grow-1 flex-shrink-0 mr-0">
                                <a class="nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    data-toggle="pill" href="#tab_forms_widget_5">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x">
                                            <!--begin::Svg Icon | path:/metronic/assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                    <path
                                                        d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span
                                        class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ __('labels.completion') }}<br />{{ App\Completion::count() }}</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            @endif
                        </ul>
                        <!--end::Nav Tabs-->
                        <!--begin::Nav Content-->
                        <div class="tab-content m-0 p-0">
                            <div class="tab-pane active" id="forms_widget_tab_1" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_2" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_3" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_4" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_6" role="tabpanel"></div>
                        </div>
                        <!--end::Nav Content-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--begin::Nav Panel Widget 2-->
            </div>
            <div class="col-lg-4">
                <!--begin::Engage Widget 8-->
                <div class="card card-custom gutter-b card-stretch card-shadowless">
                    <div class="card-body p-0 d-flex">
                        <div
                            class="d-flex align-items-start justify-content-start flex-grow-1 bg-light-warning p-8 card-rounded flex-grow-1 position-relative">
                            <div class="d-flex flex-column align-items-start flex-grow-1 h-100">
                                <div class="p-1 flex-grow-1">
                                    <h4 class="text-warning font-weight-bolder">{{ $projects->count() }}
                                        {{ __('labels.project') }}</h4>
                                    <p class="text-dark-50 font-weight-bold mt-3">Total {{ __('labels.project') }}</p>
                                </div>
                                <a href="{{ route('project.create') }}"
                                    class="btn btn-link btn-link-warning font-weight-bold">{{ __('labels.create') }}
                                    {{ __('labels.project') }}
                                    <span class="svg-icon svg-icon-lg svg-icon-warning">
                                        <!--begin::Svg Icon | path:/metronic/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <rect fill="#000000" opacity="0.3"
                                                    transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                    x="11" y="5" width="2" height="14" rx="1"></rect>
                                                <path
                                                    d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                                                </path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span></a>
                            </div>
                            <div class="position-absolute right-0 bottom-0 overflow-hidden">
                                <img src="/metronic/assets/media/svg/humans/c.png" class="max-h-100px max-h-xl-180px"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Engage Widget 8-->
            </div>
        </div>
        <div class="row">
            <div class="{{ Auth::user()->type == 'admin' ? 'col-lg-8' : 'col-lg-12' }}">
                <!--begin::Advance Table Widget 1-->
                <div class="card card-custom card-stretch gutter-b card-shadowless bg-light">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span
                                class="card-label font-weight-bolder text-dark">{{ __('labels.latest_project') }}</span>
                            <span
                                class="text-muted mt-3 font-weight-bold font-size-sm">{{ __('labels.latest_project_sub') }}</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="{{ url('/project/create') }}"
                                class="btn btn-light-success font-weight-bolder font-size-sm">{{ __('labels.add') }}
                                {{ __('labels.project') }}</a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-top" id="kt_advance_table_widget_1">
                                <thead>
                                    <tr class="text-left">
                                        <th class="text-center" style="width: 10px">#</th>
                                        <th class="pr-0" style="min-width: 300px">{{ __('labels.project_title') }}</th>
                                        <th class="text-center" style="min-width: 150px">{{ __('labels.budget') }}</th>
                                        <th class="text-center" style="min-width: 100px">Status</th>
                                        <th style="min-width: 150px">{{ __('labels.progress') }}</th>
                                        <th class="pr-0 text-right" style="min-width: 100px">{{ __('labels.action') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($projects as $item)
                                    <tr class="font-size-sm">
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <a href="{{ route('project.show', $item) }}">
                                                {{ $item->project_title }}
                                            </a>
                                        </td>
                                        <td class="text-right">
                                            <code>Rp {{ number_format($item->budget) }}</code>
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="label label-lg label-light-success label-inline">{{ $item->status->status_name ?? '-' }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column w-100 mr-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span
                                                        class="text-muted mr-2 font-size-sm font-weight-bold">{{ number_format($item->latest_progress->real_percent ?? '0') }}%</span>
                                                    <span
                                                        class="text-muted font-size-sm font-weight-bold">{{ __('labels.real_physical') }}</span>
                                                </div>
                                                <div class="progress progress-xs w-100">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                        style="width: {{ number_format($item->latest_progress->real_percent ?? '0') }}%;"
                                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pr-0 text-right nowrap">
                                            <a href="{{ route('project.edit', $item) }}"
                                                class="btn btn-xs btn-clean btn-icon" title="{{ __('labels.edit') }}">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            @if(Auth::user()->type == 'admin')
                                            <button xdata-toggle="modal" data-target="#delete-{{ $item->id }}"
                                                class="btn btn-xs btn-clean btn-icon" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="font-size-sm">
                                        <td class="text-center text-muted" colspan="6">
                                            {{ __('labels.no_project') }}
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Advance Table Widget 1-->
            </div>
            @if(Auth::user()->type == 'admin')
            <div class="col-lg-4">
                <!--begin::List Widget 3-->
                <div class="card card-custom card-stretch gutter-b bg-light-success">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <h3 class="card-title font-weight-bolder text-dark">{{ __('labels.official') }}</h3>
                        <div class="card-toolbar">
                            <a href="{{ route('official.create') }}" class="btn btn-danger btn-sm font-weight-bolder">
                                {{ __('labels.create') }}
                            </a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        @foreach ($officials as $a)
                        <!--begin::Item-->
                        <div class="d-flex align-items-center mb-10">
                            <!--begin::Text-->
                            <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                                <a href="{{ route('official.edit', $a) }}"
                                    class="text-dark text-hover-primary mb-1 font-size-lg">{{ $a->name }}</a>
                                <span class="text-muted">{{ $a->unit->unit_name }}</span>
                            </div>
                            <!--end::Text-->
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title=""
                                data-placement="left" data-original-title="{{ __('labels.edit') }}">
                                <a href="{{ route('official.edit', $a) }}"
                                    class="btn btn-clean btn-hover-warning btn-sm btn-icon">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Item-->
                        @endforeach
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 3-->
            </div>
            @endif
        </div>
        @if(Auth::user()->type == 'admin')
        <div class="row">
            <div class="col-lg-4">
                <!--begin::List Widget 3-->
                <div class="card card-custom card-stretch gutter-b bg-light-info">
                    <!--begin::Header-->
                    <div class="card-header border-0">
                        <h3 class="card-title font-weight-bolder text-dark">{{ __('labels.source') }}</h3>
                        <div class="card-toolbar">
                            <a href="{{ route('source.create') }}" class="btn btn-danger btn-sm font-weight-bolder">
                                {{ __('labels.create') }}
                            </a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        @foreach ($sources as $a)
                        <!--begin::Item-->
                        <div class="d-flex align-items-center mb-10">
                            <!--begin::Text-->
                            <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                                <a href="{{ route('source.edit', $a) }}"
                                    class="text-dark text-hover-primary mb-1 font-size-lg">{{ $a->source_name }}</a>
                                <span class="text-muted">{{ $a->acronym }}</span>
                            </div>
                            <!--end::Text-->
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title=""
                                data-placement="left" data-original-title="{{ __('labels.edit') }}">
                                <a href="{{ route('source.edit', $a) }}"
                                    class="btn btn-clean btn-hover-danger btn-sm btn-icon">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Item-->
                        @endforeach
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 3-->
            </div>
            <div class="col-lg-8">
                <!--begin::Base Table Widget 2-->
                <div class="card card-custom card-stretch gutter-b bg-light">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">{{ __('labels.offerer') }}</span>
                            <span
                                class="text-muted mt-3 font-weight-bold font-size-sm">{{ __('labels.offerer_sub') }}</span>
                        </h3>
                        <div class="card-toolbar">
                            <a href="{{ route('offerer.create') }}"
                                class="btn btn-light-success font-weight-bolder font-size-sm">{{ __('labels.add') }}
                                {{ __('labels.offerer') }}</a>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2 pb-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-borderless table-vertical-center">
                                <thead>
                                    <tr>
                                        <th class="p-0" style="width: 50px"></th>
                                        <th class="p-0" style="min-width: 150px"></th>
                                        <th class="p-0" style="min-width: 140px"></th>
                                        <th class="p-0" style="min-width: 120px"></th>
                                        <th class="p-0" style="min-width: 40px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offerers as $a)
                                    <tr>
                                        <td class="pl-0 py-5">
                                            <p class="text-muted font-weight-bold">
                                                {{ $loop->iteration }}
                                            </p>
                                        </td>
                                        <td class="pl-0">
                                            <a href="{{ route('offerer.edit', $a) }}"
                                                class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $a->legal_name }}</a>
                                            <span
                                                class="text-muted font-weight-bold d-block">{{ $a->offerer_name }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">{{ $a->phone }}</span>
                                        </td>
                                        <td class="text-right">
                                            <span class="text-muted font-weight-bold">{{ $a->contract->count() }}
                                                {{ __('labels.contract') }}</span>
                                        </td>
                                        <td class="text-right pr-0">
                                            <a href="{{ route('offerer.edit', $a) }}"
                                                class="btn btn-icon btn-light btn-sm">
                                                <span class="svg-icon svg-icon-md svg-icon-success">
                                                    <!--begin::Svg Icon | path:/metronic/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                            <rect fill="#000000" opacity="0.3"
                                                                transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                x="11" y="5" width="2" height="14" rx="1"></rect>
                                                            <path
                                                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Base Table Widget 2-->
            </div>
        </div>
        @endif
    </div>
    <!--end::Container-->
</div>
@if(Auth::user()->type == 'admin')
@foreach ($projects as $a)
<form action="{{ route('project.destroy', $a) }}" method="post">
    @csrf
    @method('delete')
    <div class="modal fade" id="delete-{{ $a->id }}" data-backdrop="static" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Delete Project</h5>
                    <p>Are you sure?</p>
                    <div class="text-right">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary font-weight-bold ml-1">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
@endif
@endsection