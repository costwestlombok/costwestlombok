@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<!--begin::Info-->
<div class="d-flex align-items-center flex-wrap mr-1">
    <!--begin::Page Heading-->
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">Budget Project </h2>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
            <li class="breadcrumb-item">
                <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('/project') }}" class="text-muted">Project</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('/project') }}" class="text-muted">Budget</a>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page Heading-->
</div>
<br>
<!--end::Info-->
{{-- Project Sub Header --}}
<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Separator-->
            <div class="mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Search Form-->
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{$budgets->total()}} Total</span>
                <form class="ml-5">
                    <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                        <input type="text" class="form-control" id="kt_subheader_search_form" placeholder="Search...">
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
                                <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Search Form-->
            <!--begin::Group Actions-->
            <div class="d-flex- align-items-center flex-wrap mr-2 d-none" id="kt_subheader_group_actions">
                <div class="text-dark-50 font-weight-bold">
                    <span id="kt_subheader_group_selected_rows">23</span>Selected:</div>
                <div class="d-flex ml-6">
                    <div class="dropdown mr-2" id="kt_subheader_group_actions_status_change">
                        <button type="button" class="btn btn-light-primary font-weight-bolder btn-sm dropdown-toggle"
                            data-toggle="dropdown">Update Status</button>
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-sm">
                            <ul class="navi navi-hover pt-3 pb-4">
                                <li
                                    class="navi-header font-weight-bolder text-uppercase text-primary font-size-lg pb-0">
                                    Change status to:</li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" data-toggle="status-change" data-status="1">
                                        <span class="navi-text">
                                            <span
                                                class="label label-light-success label-inline font-weight-bold">Approved</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" data-toggle="status-change" data-status="2">
                                        <span class="navi-text">
                                            <span
                                                class="label label-light-danger label-inline font-weight-bold">Rejected</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" data-toggle="status-change" data-status="3">
                                        <span class="navi-text">
                                            <span
                                                class="label label-light-warning label-inline font-weight-bold">Pending</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" data-toggle="status-change" data-status="4">
                                        <span class="navi-text">
                                            <span class="label label-light-info label-inline font-weight-bold">On
                                                Hold</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button class="btn btn-light-success font-weight-bolder btn-sm mr-2"
                        id="kt_subheader_group_actions_fetch" data-toggle="modal"
                        data-target="#kt_datatable_records_fetch_modal">Fetch Selected</button>
                    <button class="btn btn-light-danger font-weight-bolder btn-sm mr-2"
                        id="kt_subheader_group_actions_delete_all">Delete All</button>
                </div>
            </div>
            <!--end::Group Actions-->
        </div>
        <!--end::Details-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="/metronic/demo5/.html" class=""></a>
            <!--end::Button-->
            <!--begin::Button-->
            <a href="{{ url('project-budget/'.$project->id.'/create') }}" class="btn btn-primary font-weight-bolder"><span
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
                </span>Add Budget</a>
            <!--end::Button-->
        </div>
        <!--end::Toolbar-->
    </div>
</div>
{{-- End Project Sub Header --}}
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            @foreach ($budgets as $item)
            <div class="col-xl-4">
                <!--begin::Card-->
                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Info-->
                            <div class="d-flex flex-column mr-auto">
                                <!--begin: Title-->
                                <div class="d-flex flex-column mr-auto">
                                    <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">{{$item->name}}</a>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar mb-2">
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ki ki-bold-more-hor"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover">
                                            <li class="navi-header pb-1">
                                                <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-shopping-cart-1"></i>
                                                    </span>
                                                    <span class="navi-text">Order</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-calendar-8"></i>
                                                    </span>
                                                    <span class="navi-text">Event</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-graph-1"></i>
                                                    </span>
                                                    <span class="navi-text">Report</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-rocket-1"></i>
                                                    </span>
                                                    <span class="navi-text">Post</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-writing"></i>
                                                    </span>
                                                    <span class="navi-text">File</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Description-->
                        <div class="mb-5 mt-3 font-weight-bold">{{$item->description}}</div>
                        <!--end::Description-->
                        <!--begin::Data-->
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-dark-75 font-weight-bolder mr-2">Budget:</span>
                            <a href="#" class="text-muted text-hover-primary">Rp {{number_format($item->amount)}}</a>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-dark-75 font-weight-bolder mr-2">Start Date:</span>
                            <span class="label label-lg label-light-primary label-inline font-weight-bold py-4">{{ date('D, d M Y', strtotime($item->start_date)) }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-dark-75 font-weight-bolder mr-2">End Date:</span>
                            <span class="label label-lg label-light-success label-inline font-weight-bold py-4">{{ date('D, d M Y', strtotime($item->end_date)) }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-dark-75 font-weight-bolder mr-2">Duration:</span>
                            <a href="#" class="text-muted text-hover-primary">{{number_format($item->duration)}} in days</a>
                        </div>
                        <div class="d-flex justify-content-between align-items-justify">
                            <span class="text-dark-75 font-weight-bolder mr-2">Sources:</span>
                            <span href="#" class="text-muted text-hover-primary">
                                <div class="d-flex flex-column flex-lg-fill align-items-end">
                                    <a href="#"><span class="text-dark-75 font-weight-bolder font-size-sm">{{$item->source->count()}}
                                            Sources</span></a>
                                    <a href="{{url('budget-source/'.$item->id)}}" class="text-primary font-weight-bolder">Add New Source</a>
                                </div>
                            </span>
                        </div>
                        <!--end::Data-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end:: Card-->
            </div>
            @endforeach
        </div>
        <!--end::Row-->

        <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap mr-3">
                @if($budgets->lastPage() > 1)

                <a href="{{ $budgets->url(1) }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                    <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                </a>

                <a href="{{ $budgets->url(1) }}"
                    class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($budgets->currentPage() == 1) ? ' disabled' : '' }}">
                    <i class="ki ki-bold-arrow-back icon-xs"></i>
                </a>
                @for ($i = 1; $i <= $budgets->lastPage(); $i++)
                    <a href="{{ $budgets->url($i) }}"
                        class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($budgets->currentPage() == $i) ? ' active' : '' }}">{{$i}}</a>
                    @endfor
                    <a href="{{ $budgets->url($budgets->currentPage()+1) }}"
                        class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($budgets->currentPage() == $budgets->lastPage()) ? ' disabled' : '' }}">
                        <i class="ki ki-bold-arrow-next icon-xs"></i>
                    </a>
                    <a href="{{ $budgets->url($budgets->lastPage()) }}"
                        class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-double-arrow-next icon-xs"></i>
                    </a>
                    @endif

            </div>
            <div class="d-flex align-items-center">
                <select
                    class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary"
                    style="width: 75px;">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="text-muted">Displaying {{$budgets->count()}} of {{$budgets->total()}} records</span>
            </div>
        </div>
        <!--end::Pagination-->
    </div>
    <!--end::Container-->
</div>
@endsection