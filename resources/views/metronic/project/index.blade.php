@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
<script>
    jQuery(document).ready(function () {
        $(document).on('click', '.button', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var link = $(this).attr('href');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won\'t be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            type: "GET",
                            url: "/api/organization_unit/"+ id +"/delete",
                            success: function (data) {
                                toastr.success("Data deleted successfully!");
                                var table = $('#kt_datatable').DataTable(); 
                                table.ajax.reload( null, false );
                            }         
                        });
                    }
                });
            });
    });
</script>
@endsection
@section('content')
<!--begin::Info-->
<div class="d-flex align-items-center flex-wrap mr-1">
    <!--begin::Page Heading-->
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">Project</h2>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
            <li class="breadcrumb-item">
                <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('/project') }}" class="text-muted">Project</a>
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
                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{$projects->total()}} Total</span>
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
            <a href="{{ route('project.create') }}" class="btn btn-primary font-weight-bolder"><span
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
                </span>Add Project</a>
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
            @foreach ($projects as $item)
            <div class="col-md-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Info-->
                            <div class="d-flex flex-column mr-auto">
                                <!--begin: Title-->
                                <a href="#"
                                    class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{ str_limit($item->project_title, $limit = 100, $end = '...') }}</a>
                                <span class="text-muted font-weight-bold">Project Code : {{$item->project_code}}</span>
                                <span class="text-muted font-weight-bold">{{$item->subsector->sector->sector_name}} -
                                    {{$item->subsector->subsector_name}}</span>
                                <!--end::Title-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar mb-auto">
                                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Option menus"
                                    data-placement="left">
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
                                                    data:</span>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ url('project-tender/'.$item->id) }}" class="navi-link">
                                                    <span class="svg-icon menu-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path
                                                                    d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z"
                                                                    fill="#000000"></path>
                                                                <rect fill="#FFFFFF" x="13" y="8" width="3" height="3"
                                                                    rx="1"></rect>
                                                                <path
                                                                    d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z"
                                                                    fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="navi-text"> Tender</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ url('project-file/'.$item->id) }}" class="navi-link">
                                                    <span class="svg-icon menu-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path
                                                                    d="M3.51471863,18.6568542 L13.4142136,8.75735931 C13.8047379,8.36683502 14.4379028,8.36683502 14.8284271,8.75735931 L16.2426407,10.1715729 C16.633165,10.5620972 16.633165,11.1952621 16.2426407,11.5857864 L6.34314575,21.4852814 C5.95262146,21.8758057 5.31945648,21.8758057 4.92893219,21.4852814 L3.51471863,20.0710678 C3.12419433,19.6805435 3.12419433,19.0473785 3.51471863,18.6568542 Z"
                                                                    fill="#000000" opacity="0.3"></path>
                                                                <path
                                                                    d="M9.87867966,6.63603897 L13.4142136,3.10050506 C13.8047379,2.70998077 14.4379028,2.70998077 14.8284271,3.10050506 L21.8994949,10.1715729 C22.2900192,10.5620972 22.2900192,11.1952621 21.8994949,11.5857864 L18.363961,15.1213203 C17.9734367,15.5118446 17.3402718,15.5118446 16.9497475,15.1213203 L9.87867966,8.05025253 C9.48815536,7.65972824 9.48815536,7.02656326 9.87867966,6.63603897 Z"
                                                                    fill="#000000"></path>
                                                                <path
                                                                    d="M17.3033009,4.86827202 L18.0104076,4.16116524 C18.2056698,3.96590309 18.5222523,3.96590309 18.7175144,4.16116524 L20.8388348,6.28248558 C21.0340969,6.47774772 21.0340969,6.79433021 20.8388348,6.98959236 L20.131728,7.69669914 C19.9364658,7.89196129 19.6198833,7.89196129 19.4246212,7.69669914 L17.3033009,5.5753788 C17.1080387,5.38011665 17.1080387,5.06353416 17.3033009,4.86827202 Z"
                                                                    fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="navi-text"> Documents</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="{{ url('project-budget/'.$item->id) }}" class="navi-link">
                                                    <span class="svg-icon menu-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path
                                                                    d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                                    fill="#000000" opacity="0.3"></path>
                                                                <path
                                                                    d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                                    fill="#000000"></path>
                                                                <rect fill="#000000" opacity="0.3" x="7" y="10"
                                                                    width="5" height="2" rx="1"></rect>
                                                                <rect fill="#000000" opacity="0.3" x="7" y="14"
                                                                    width="9" height="2" rx="1"></rect>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="navi-text"> Budget</span>
                                                </a>
                                            </li>
                                            <hr>
                                            <li class="navi-item">
                                                <a href="{{url('project/'.$item->id.'/edit')}}" class="navi-link"><span><i class="flaticon2-pen"></i>
                                                </span> &nbsp; Edit</a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" data-id="{{$item->id}}" class="button navi-link"><span><i class="flaticon2-trash"></i>
                                                </span> &nbsp; Delete</a>
                                            </li>
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
                                <span class="d-block font-weight-bold mb-4">Start Date</span>
                                <span
                                    class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($item->start_date)->format('D, d M Y') }}</span>
                            </div>
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="d-block font-weight-bold mb-4">Due Date</span>
                                <span
                                    class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($item->end_date)->format('D, d M Y') }}</span>
                            </div>
                            <!--begin::Progress-->
                            <div class="flex-row-fluid mb-7">
                                <span class="d-block font-weight-bold mb-4">Progress - Real Physical <span
                                        class="text-muted font-weight-bold">(Last update : {{ date('D, d M Y', strtotime($item->latest_progress->date_of_advance)) }} )</span>
                                    <div class="float-right">
                                        <a href="{{ url('project-progress/'.$item->id) }}">Add New Progress</a>
                                    </div>
                                    <div class="d-flex align-items-center pt-2">
                                        <div class="progress progress-xs mt-2 mb-2 w-100">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{number_format($item->latest_progress->real_percent)}}%;"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="ml-3 font-weight-bolder">{{number_format($item->latest_progress->real_percent)}}%</span>
                                    </div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Text-->
                        <p class="mb-7 mt-3">{{ str_limit($item->project_description, $limit = 100, $end = '...') }}</p>
                        <!--end::Text-->
                        <!--begin::Blog-->
                        <div class="d-flex flex-wrap">
                            <!--begin: Item-->
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="font-weight-bolder mb-4">Budget</span>
                                <span class="font-weight-bolder font-size-h5 pt-1">
                                    <span class="font-weight-bold text-dark-50">Rp
                                    </span>{{ number_format($item->budget) }}</span>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="font-weight-bolder mb-4">SEFIN Code</span>
                                <span class="font-weight-bolder font-size-h5 pt-1">
                                    <span class="font-weight-bold text-dark-50"></span>{{$item->code_sefin}}</span>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="mr-12 d-flex flex-column mb-7">
                                <span class="font-weight-bolder mb-4">Duration</span>
                                <span class="font-weight-bolder font-size-h5 pt-1">
                                    <span class="font-weight-bold text-dark-50">{{$item->duration}}</span> days</span>
                            </div>
                            <!--end::Item-->
                            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                            <!--begin::Item-->
                            <div class="d-flex flex-column flex-lg-fill float-left mb-7">
                                <span class="font-weight-bolder mb-4">
                                    <a href="{{ url('project-tender/'.$item->id) }}" class="text-dark">Tender</a>
                                </span>
                                <div class="d-flex align-items-center flex-lg-fill">
                                    <span class="mr-4">
                                        <i class="icon-2x text-dark-50 flaticon-notepad"></i>
                                    </span>
                                    <div class="d-flex flex-column flex-lg-fill">
                                        <a href="{{ url('project-tender/'.$item->id) }}"><span
                                                class="text-dark-75 font-weight-bolder font-size-sm">{{number_format($item->tender->count())}}
                                                Tender</span></a>
                                        <a href="{{ url('tender-create/'.$item->id) }}"
                                            class="text-primary font-weight-bolder">Add New Tender</a>
                                    </div>
                                </div>

                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex flex-column flex-lg-fill float-left mb-7">
                                <span class="font-weight-bolder mb-4">
                                    <a href="{{ url('project-file/'.$item->id) }}" class="text-dark">Files</a>
                                </span>
                                <div class="d-flex align-items-center flex-lg-fill">
                                    <span class="mr-4">
                                        <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                                    </span>
                                    <div class="d-flex flex-column flex-lg-fill">
                                        <a href="#"><span
                                                class="text-dark-75 font-weight-bolder font-size-sm">{{number_format($item->file->count())}}
                                                Files</span></a>
                                        <a href="{{ url('project-file/'.$item->id) }}"
                                            class="text-primary font-weight-bolder">Add New File</a>
                                    </div>
                                </div>

                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex flex-column flex-lg-fill float-left mb-7">
                                <span class="font-weight-bolder mb-4">
                                    <a href="{{ url('project-budget/'.$item->id) }}" class="text-dark">Budget</a>
                                </span>
                                <div class="d-flex align-items-center flex-lg-fill">
                                    <span class="mr-4">
                                        <i class="icon-2x text-dark-50 flaticon-piggy-bank"></i>
                                    </span>
                                    <div class="d-flex flex-column flex-lg-fill">
                                        <a href="#"><span
                                                class="text-dark-75 font-weight-bolder font-size-sm">{{number_format($item->project_budget->count())}}
                                                Budget</span></a>
                                        <a href="{{ url('project-budget/'.$item->id) }}"
                                            class="text-primary font-weight-bolder">Add New Budget</a>
                                    </div>
                                </div>

                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Blog-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer d-flex align-items-center">
                        <button type="button"
                            class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">details</button>
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Card-->
            </div>
            @endforeach
        </div>
        <!--end::Row-->

        <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap mr-3">
                @if($projects->lastPage() > 1)

                <a href="{{ $projects->url(1) }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                    <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                </a>

                <a href="{{ $projects->url(1) }}"
                    class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($projects->currentPage() == 1) ? ' disabled' : '' }}">
                    <i class="ki ki-bold-arrow-back icon-xs"></i>
                </a>
                @for ($i = 1; $i <= $projects->lastPage(); $i++)
                    <a href="{{ $projects->url($i) }}"
                        class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($projects->currentPage() == $i) ? ' active' : '' }}">{{$i}}</a>
                    @endfor
                    <a href="{{ $projects->url($projects->currentPage()+1) }}"
                        class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($projects->currentPage() == $projects->lastPage()) ? ' disabled' : '' }}">
                        <i class="ki ki-bold-arrow-next icon-xs"></i>
                    </a>
                    <a href="{{ $projects->url($projects->lastPage()) }}"
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
                <span class="text-muted">Displaying {{$projects->count()}} of {{$projects->total()}} records</span>
            </div>
        </div>
        <!--end::Pagination-->
    </div>
    <!--end::Container-->
</div>
@endsection