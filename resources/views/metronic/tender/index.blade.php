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
        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">Tender</h2>
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
                <a href="" class="text-muted">Tender</a>
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
            <div class="subheader-separator mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Search Form-->
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{$tenders->total()}} Total</span>
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
        @if(isset($project))
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="/metronic/demo5/.html" class=""></a>
            <!--end::Button-->
            <!--begin::Button-->
            <a href="{{ url('project-tender/'.$project->id) }}" class="btn btn-primary font-weight-bolder"><span
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
                </span>Add Tender</a>
            <!--end::Button-->
        </div>
        @endif
        <!--end::Toolbar-->
    </div>
</div>
{{-- End Project Sub Header --}}
<div class="d-flex flex-column-fluid">

    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            @foreach ($tenders as $item)
            <div class="col-md-6">
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
                                            class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$item->project_process_name}}
                                            <!--end::Name-->
                                            <!--begin::Contacts-->
                                            <div class="my-2">
                                                <a href="#"
                                                    class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                    Tender Code : {{$item->process_number}}</a>
                                            </div>
                                            <!--end::Contacts-->
                                    </div>
                                    <!--begin::User-->
                                    <!--begin::Actions-->
                                    <div class="card-toolbar mb-7">
                                        <div class="dropdown dropdown-inline" data-toggle="tooltip" title=""
                                            data-placement="left" data-original-title="Quick actions">
                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <!--begin::Navigation-->
                                                <ul class="navi navi-hover">
                                                    <li class="navi-header pb-1">
                                                        <span
                                                            class="text-primary text-uppercase font-weight-bold font-size-sm">Add
                                                            new:</span>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="{{url('tender-award/'.$item->id)}}" class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon2-gift"></i>
                                                            </span>
                                                            <span class="navi-text">Bid/Award</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="{{url('tender-offerer/'.$item->id)}}"
                                                            class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon-network"></i>
                                                            </span>
                                                            <span class="navi-text">Offerer</span>
                                                        </a>
                                                    </li>
                                                    <hr>
                                                    <li class="navi-item">
                                                        <a href="" class="navi-link"><span><i class="flaticon2-pen"></i>
                                                            </span> &nbsp; Edit</a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="" class="navi-link"><span><i
                                                                    class="flaticon2-trash"></i>
                                                            </span> &nbsp; Delete</a>
                                                    </li>
                                                </ul>
                                                <!--end::Navigation-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                                            <span class="mr-4">
                                                <i class="flaticon-coins icon-2x text-muted font-weight-bold"></i>
                                            </span>
                                            <div class="d-flex flex-column text-dark-75">
                                                <span class="font-weight-bolder font-size-sm">Amount</span>
                                                <span class="font-weight-bolder font-size-h5">
                                                    <span class="text-dark-50 font-weight-bold">Rp
                                                    </span>{{number_format($item->amount)}}</span>
                                            </div>
                                        </div>
                                        <!--end: Item-->
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                                            <span class="mr-4">
                                                <i class="flaticon-network icon-2x text-muted font-weight-bold"></i>
                                            </span>
                                            <div class="d-flex flex-column flex-lg-fill">
                                                <span
                                                    class="text-dark-75 font-weight-bolder font-size-sm">{{$item->tender_offerer->count()}}
                                                    Offerer</span>
                                                <a href="{{ url('tender-offerer/'.$item->id) }}"
                                                    class="text-primary font-weight-bolder">Add New Offerer</a>
                                            </div>
                                        </div>
                                        <!--end: Item-->
                                    </div>
                                    <div class="col-md-6">
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                                            <span class="mr-4">
                                                <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
                                            </span>
                                            <div class="d-flex flex-column text-dark-75">
                                                <span class="font-weight-bolder font-size-sm">Status</span>
                                                <span class="font-weight-bolder font-size-h5">
                                                    <span
                                                        class="text-dark-50 font-weight-bold"></span>{{$item->status->status_name}}</span>
                                            </div>
                                        </div>
                                        <!--end: Item-->
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                                            <span class="mr-4">
                                                <i class="icon-xl fas fa-gavel"></i>
                                            </span>
                                            <div class="d-flex flex-column flex-lg-fill">
                                                <span
                                                    class="text-dark-75 font-weight-bolder font-size-sm">{{$item->award->count()}}
                                                    Bid/Award</span>
                                                <a href="{{ url('award-create/'.$item->id) }}"
                                                    class="text-primary font-weight-bolder">Add New Bid/Award
                                                    Evaluation</a>
                                            </div>
                                        </div>
                                        <!--end: Item-->
                                    </div>
                                </div>

                                <hr>
                                <div class="d-flex align-items-center flex-wrap">

                                    <div class="mr-12 d-flex flex-column mb-7">
                                        <span class="d-block font-weight-bold mb-4">Start Date</span>
                                        <span
                                            class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($item->start_date)->format('D, d M Y') }}</span>
                                    </div>
                                    <div class="mr-12 d-flex flex-column mb-7">
                                        <span class="d-block font-weight-bold mb-4">Due Date</span>
                                        <span
                                            class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($item->end_date)->format('D, d M Y') }}</span>
                                    </div>
                                    <div class="mr-12 d-flex flex-column mb-7">
                                        <span class="d-block font-weight-bold mb-4">Extended Date</span>
                                        <span
                                            class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($item->max_extended_date)->format('D, d M Y') }}</span>
                                    </div>


                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Top-->
                        <!--begin::Separator-->
                        <div class="separator separator-solid my-7"></div>
                        <!--end::Separator-->
                        <!--begin::Bottom-->
                        <div class="d-flex align-items-center flex-wrap">
                            <button type="button"
                                class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</button>
                        </div>
                        <!--end::Bottom-->
                    </div>
                </div>
            </div>
            <!--end::Card-->
            @endforeach
        </div>
        <!--end::Row-->

        <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap mr-3">

                @if($tenders->lastPage() > 1)
                <a href="{{ $tenders->url(1) }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                    <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                </a>
                <a href="{{ $tenders->url(1) }}"
                    class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($tenders->currentPage() == 1) ? ' disabled' : '' }}">
                    <i class="ki ki-bold-arrow-back icon-xs"></i>
                </a>
                @for ($i = 1; $i <= $tenders->lastPage(); $i++)
                    <a href="{{ $tenders->url($i) }}"
                        class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($tenders->currentPage() == $i) ? ' active' : '' }}">{{$i}}</a>
                    @endfor
                    <a href="{{ $tenders->url($tenders->currentPage()+1) }}"
                        class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($tenders->currentPage() == $tenders->lastPage()) ? ' disabled' : '' }}">
                        <i class="ki ki-bold-arrow-next icon-xs"></i>
                    </a>
                    <a href="{{ $tenders->url($tenders->lastPage()) }}"
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
                <span class="text-muted">Displaying {{$tenders->count()}} of {{$tenders->total()}} records</span>
            </div>
        </div>
        <!--end::Pagination-->
    </div>
    <!--end::Container-->
</div>
@endsection