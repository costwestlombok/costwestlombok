@extends('layouts.metronic')
@section('style')
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{ asset('metronic/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
    type="text/css" />
<!--end::Page Vendors Styles-->
@endsection
@section('script')
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('metronic/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('metronic/assets/js/pages/widgets.js') }}"></script>
<!--end::Page Scripts-->
@endsection
@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Nav Panel Widget 2-->
                <div class="card card-custom gutter-b card-stretch card-shadowless">
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <!--begin::Nav Tabs-->
                        <ul class="dashboard-tabs nav nav-pills nav-danger row row-paddingless m-0 p-0" role="tablist">
                            <!--begin::Item-->
                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                <a class="nav-link {{ request()->get('type') == 'airport' ? 'active' : '' }} border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    href="{{ url('/').'?type=airport' }}">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Home/Library.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M8,13.1668961 L20.4470385,11.9999863 L8,10.8330764 L8,5.77181995 C8,5.70108058 8.01501031,5.63114635 8.04403925,5.56663761 C8.15735832,5.31481744 8.45336217,5.20254012 8.70518234,5.31585919 L22.545552,11.5440255 C22.6569791,11.5941677 22.7461882,11.6833768 22.7963304,11.794804 C22.9096495,12.0466241 22.7973722,12.342628 22.545552,12.455947 L8.70518234,18.6841134 C8.64067359,18.7131423 8.57073936,18.7281526 8.5,18.7281526 C8.22385763,18.7281526 8,18.504295 8,18.2281526 L8,13.1668961 Z"
                                                        fill="#000000" />
                                                    <path
                                                        d="M4,16 L5,16 C5.55228475,16 6,16.4477153 6,17 C6,17.5522847 5.55228475,18 5,18 L4,18 C3.44771525,18 3,17.5522847 3,17 C3,16.4477153 3.44771525,16 4,16 Z M1,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L1,13 C0.44771525,13 6.76353751e-17,12.5522847 0,12 C-6.76353751e-17,11.4477153 0.44771525,11 1,11 Z M4,6 L5,6 C5.55228475,6 6,6.44771525 6,7 C6,7.55228475 5.55228475,8 5,8 L4,8 C3.44771525,8 3,7.55228475 3,7 C3,6.44771525 3.44771525,6 4,6 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span
                                        class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ strtoupper(__('labels.airport')) }}</span>
                                    <span
                                        class="d-block {{ request()->get('type') == 'airport' ? '' : 'text-muted' }} font-size-sm text-center">0
                                        {{ __('labels.project') }}</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                <a class="nav-link {{ request()->get('type') == 'building' ? 'active' : '' }} border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    href="{{ url('/').'?type=building' }}">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z"
                                                        fill="#000000" />
                                                    <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1" />
                                                    <path
                                                        d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span
                                        class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ strtoupper(__('labels.building')) }}</span>
                                    <span
                                        class="d-block {{ request()->get('type') == 'building' ? '' : 'text-muted' }} font-size-sm text-center">0
                                        {{ __('labels.project') }}</span>

                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                <a class="nav-link {{ request()->get('type') == 'energy' ? 'active' : '' }} border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    href="{{ url('/').'?type=energy' }}">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Media/Movie-Lane2.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <circle fill="#000000" opacity="0.3" cx="12" cy="9" r="8" />
                                                    <path
                                                        d="M14.5297296,11 L9.46184488,11 L11.9758349,17.4645458 L14.5297296,11 Z M10.5679953,19.3624463 L6.53815512,9 L17.4702704,9 L13.3744964,19.3674279 L11.9759405,18.814912 L10.5679953,19.3624463 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M10,22 L14,22 L14,22 C14,23.1045695 13.1045695,24 12,24 L12,24 C10.8954305,24 10,23.1045695 10,22 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <path
                                                        d="M9,20 C8.44771525,20 8,19.5522847 8,19 C8,18.4477153 8.44771525,18 9,18 C8.44771525,18 8,17.5522847 8,17 C8,16.4477153 8.44771525,16 9,16 L15,16 C15.5522847,16 16,16.4477153 16,17 C16,17.5522847 15.5522847,18 15,18 C15.5522847,18 16,18.4477153 16,19 C16,19.5522847 15.5522847,20 15,20 C15.5522847,20 16,20.4477153 16,21 C16,21.5522847 15.5522847,22 15,22 L9,22 C8.44771525,22 8,21.5522847 8,21 C8,20.4477153 8.44771525,20 9,20 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span
                                        class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ strtoupper(__('labels.energy')) }}</span>
                                    <span
                                        class="d-block {{ request()->get('type') == 'energy' ? '' : 'text-muted' }} font-size-sm text-center">0
                                        {{ __('labels.project') }}</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                <a class="nav-link {{ request()->get('type') == 'port' ? 'active' : '' }} border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    href="{{ url('/').'?type=port' }}">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Media/Equalizer.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M23.3743557,18.8971143 C22.131715,21.0494311 18.4102262,21.2272253 15.0621778,19.2942286 C11.7141295,17.361232 10.0073593,14.0494311 11.25,11.8971143 C12.4926407,9.74479751 16.2141295,9.56700338 19.5621778,11.5 C22.9102262,13.4329966 24.6169963,16.7447975 23.3743557,18.8971143 Z"
                                                        fill="#000000" opacity="0.3" />
                                                    <ellipse fill="#000000" opacity="0.3"
                                                        transform="translate(12.500000, 9.000000) rotate(-180.000000) translate(-12.500000, -9.000000) "
                                                        cx="12.5" cy="9" rx="4.5" ry="7" />
                                                    <path
                                                        d="M1.25,18.8971143 C0.00735931295,16.7447975 1.71412946,13.4329966 5.06217783,11.5 C8.41022619,9.56700338 12.131715,9.74479751 13.3743557,11.8971143 C14.6169963,14.0494311 12.9102262,17.361232 9.56217783,19.2942286 C6.21412946,21.2272253 2.49264069,21.0494311 1.25,18.8971143 Z"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span
                                        class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ strtoupper(__('labels.port')) }}</span>
                                    <span
                                        class="d-block {{ request()->get('type') == 'port' ? '' : 'text-muted' }} font-size-sm text-center">0
                                        {{ __('labels.project') }}</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                <a class="nav-link {{ !request()->get('type') || request()->get('type') == 'road' ? 'active' : '' }} border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    href="{{ url('/').'?type=road' }}">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/General/Shield-check.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M14.8520384,9 L15.7780576,12 L8.22196243,12 L9.14797495,9 L14.8520384,9 Z M13.9260192,6 L10.0739875,6 L10.7050601,3.95551581 C10.8804029,3.38745846 11.4054966,3 12,3 C12.5945036,3 13.1195978,3.38745798 13.2949418,3.95551522 L13.9260192,6 Z M16.7040768,15 L17.9387691,19 L6.06126654,19 L7.2959499,15 L16.7040768,15 Z"
                                                        fill="#000000" />
                                                    <rect fill="#000000" opacity="0.3" x="3" y="20" width="18"
                                                        height="2" rx="1" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span
                                        class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ strtoupper(__('labels.road')) }}</span>
                                    <span
                                        class="d-block {{ !request()->get('type') || request()->get('type') == 'road' ? '' : 'text-muted' }} font-size-sm text-center">{{ number_format(App\Project::count()) }}
                                        {{ __('labels.project') }}</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-0 mb-3 mb-lg-0">
                                <a class="nav-link {{ request()->get('type') == 'telecommunication' ? 'active' : '' }} border py-10 d-flex flex-grow-1 rounded flex-column align-items-center"
                                    href="{{ url('/').'?type=telecommunication' }}">
                                    <span class="nav-icon py-2 w-auto">
                                        <span class="svg-icon svg-icon-3x">
                                            <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Communication/Group.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M16.4508979,17.4029496 L15.1784978,15.8599014 C16.324501,14.9149052 17,13.5137472 17,12 C17,10.4912085 16.3289582,9.09418404 15.1893841,8.14910121 L16.466112,6.60963188 C18.0590936,7.93073905 19,9.88958759 19,12 C19,14.1173586 18.0528606,16.0819686 16.4508979,17.4029496 Z M19.0211112,20.4681628 L17.7438102,18.929169 C19.7927036,17.2286725 21,14.7140097 21,12 C21,9.28974232 19.7960666,6.77820732 17.7520315,5.07766256 L19.031149,3.54017812 C21.5271817,5.61676443 23,8.68922234 23,12 C23,15.3153667 21.523074,18.3916375 19.0211112,20.4681628 Z M7.54910207,17.4029496 C5.94713944,16.0819686 5,14.1173586 5,12 C5,9.88958759 5.94090645,7.93073905 7.53388797,6.60963188 L8.81061588,8.14910121 C7.67104182,9.09418404 7,10.4912085 7,12 C7,13.5137472 7.67549895,14.9149052 8.82150222,15.8599014 L7.54910207,17.4029496 Z M4.9788888,20.4681628 C2.47692603,18.3916375 1,15.3153667 1,12 C1,8.68922234 2.47281829,5.61676443 4.96885102,3.54017812 L6.24796852,5.07766256 C4.20393339,6.77820732 3,9.28974232 3,12 C3,14.7140097 4.20729644,17.2286725 6.25618985,18.929169 L4.9788888,20.4681628 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M11,14.2919782 C10.1170476,13.9061998 9.5,13.0251595 9.5,12 C9.5,10.6192881 10.6192881,9.5 12,9.5 C13.3807119,9.5 14.5,10.6192881 14.5,12 C14.5,13.0251595 13.8829524,13.9061998 13,14.2919782 L13,20 C13,20.5522847 12.5522847,21 12,21 C11.4477153,21 11,20.5522847 11,20 L11,14.2919782 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span
                                        class="nav-text font-size-lg py-2 font-weight-bolder text-center">{{ strtoupper(__('labels.telecommunication')) }}</span>
                                    <span
                                        class="d-block {{ request()->get('type') == 'telecommunication' ? '' : 'text-muted' }} font-size-sm text-center">0
                                        {{ __('labels.project') }}</span>
                                </a>
                            </li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Nav Tabs-->
                        <!--begin::Nav Content-->
                        <div class="tab-content m-0 p-0">
                            <div class="tab-pane" id="forms_widget_tab_1" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_2" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_3" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_4" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_5" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_6" role="tabpanel"></div>
                        </div>
                        <!--end::Nav Content-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--begin::Nav Panel Widget 2-->
            </div>
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center mt-5 mb-10">
                    <!--begin::Text-->
                    <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                        <a href="#"
                            class="text-dark text-hover-primary mb-1 font-size-h5 text-dark">{{ __('labels.latest') }}</a>
                        <span class="text-muted">{{ __('labels.latest_sub') }}</span>
                    </div>
                    <!--end::Text-->
                    <!--begin::Dropdown-->
                    <a href="{{ route('project.index') }}"
                        class="btn btn-link btn-link-primary font-weight-bold">{{ __('labels.view_all') }}<span
                            class="svg-icon svg-icon-lg svg-icon-primary">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Navigation/Arrow-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                    <!--end::Dropdown-->
                </div>
            </div>
        </div>
        <!--end::Row-->
        <!--begin::Row-->
        <div class="row">
            @foreach ($projects as $project)
            <div class="col-md-12">
                @include('metronic.shared.project')
            </div>
            @endforeach
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection