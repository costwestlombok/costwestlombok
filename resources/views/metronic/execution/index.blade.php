@extends('layouts.metronic')
@section('style')
<!--begin::Page Vendors Styles(used by this page)-->
<link href="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
    type="text/css" />
<!--end::Page Vendors Styles-->
@endsection
@section('script')
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors-->
@if ($execution)
<script>var COST_URL = "{{ url('api/disbursment/'.$execution->id) }}";</script>
<script>
    "use strict";
    var KTDatatablesDataSourceAjaxServer = function () {

        var initTable1 = function () {
            var table = $('#kt_datatable');

            // begin first table
            table.DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: COST_URL,
                columns: [
                    {
                        data: "order",
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'amount'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'created_at',
                        searchable: false
                    },
                    {
                        data: 'id',
                        searchable: false
                    },
                ],
                order: [[4, "desc"]],
                columnDefs: [
                    {
                        targets: 5,
                        title: 'Actions',
                        orderable: false,
                        render: function (data, type, full, meta) {
                            return '\
                            <div class="text-right nowrap">\
                			<a href="../disbursment/'+ full.id + '/edit" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
                				<i class="fas fa-pen"></i>\
                			</a>\
                            <a href="#"  data-id="'+ full.id + '" class="button btn btn-sm btn-clean btn-icon" data-id=' + full.id + ' title="Delete"><i class="fas fa-trash"></i></a>\
                            </div>\
                		';
                        },
                    },
                    {
                        targets: 4,
                        render: function (data, type, full, meta) {
                            return '<div class="text-right nowrap">\
                                <code>' + data + '</code>\
                            </div>';
                        },
                    },
                    {
                        targets: 0,
                        className: 'text-center'
                    },
                ],
                // "language": {
                //     "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
                // },
            });
        };

        return {

            //main function to initiate the module
            init: function () {
                initTable1();
            },

        };

    }();

    jQuery(document).ready(function () {
        KTDatatablesDataSourceAjaxServer.init();

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
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        type: "GET",
                        url: "../disbursment/" + id + "/delete",
                        success: function (data) {
                            toastr.success("Data deleted successfully!");
                            var table = $('#kt_datatable').DataTable();
                            table.ajax.reload(null, false);
                        }
                    });
                }
            });
        });
        $(document).on('click', '.button-ex', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var link = $(this).attr('href');
            Swal.fire({
                title: "Are you sure?",
                text: "You won\'t be able to revert this and it\'s child!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then(function (result) {
                if (result.value) {
                    window.location.href = "/api/execution/"+ id +"/delete";
                }
            });
        });
    });
</script>
@endif
@endsection
@section('content')
<!--begin::Info-->
<div class="d-flex align-items-center flex-wrap mr-1">
    <!--begin::Page Heading-->
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">Contract execution</h2>
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
                <a href="{{url('project-tender/'.$execution->engage->award->tender->project->id)}}"
                    class="text-muted">Tender</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{url('tender-award/'.$execution->engage->award->tender->id)}}" class="text-muted">Award</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{url('contract/'.$execution->engage->id)}}" class="text-muted">Contract</a>
            </li>
            <li class="breadcrumb-item">
                <a href="" class="text-muted">Contract executions</a>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page Heading-->
</div>
<br>
<!--end::Info-->
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Execution</h3>
        </div>
        <div class="card-toolbar">
            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ki ki-bold-more-hor"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                    <!--begin::Navigation-->
                    <ul class="navi navi-hover">
                        <li class="navi-header pb-1">
                            <span class="text-primary text-uppercase font-weight-bold font-size-sm">Action:</span>
                        </li>
                        <li class="navi-item">
                            <a href="{{url('execution/'.$execution->id.'/edit')}}" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-pen"></i>
                                </span>
                                <span class="navi-text">Edit</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" data-id="{{$execution->id}}" class="button-ex navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-trash"></i>
                                </span>
                                <span class="navi-text">Hapus</span>
                            </a>
                        </li>

                    </ul>
                    <!--end::Navigation-->
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div class="d-flex flex-column align-items-cente py-2 w-25">
                <p class="text-dark-75 font-weight-bold font-size-lg mb-1">Start Date </p>
            </div>
            <div class="py-2 w-75">
                : <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">
                    {{ Carbon\Carbon::parse($execution->start_date)->format('l, d F Y') }}</span>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div class="d-flex flex-column align-items-cente py-2 w-25">
                <p class="text-dark-75 font-weight-bold font-size-lg mb-1">Program </p>
            </div>
            <div class="py-2 w-75">
                <span class="mb-10 mt-5 font-weight-bold">: {{$execution->program}}</span>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div class="d-flex flex-column align-items-cente py-2 w-25">
                <p class="text-dark-75 font-weight-bold font-size-lg mb-1">Contract State </p>
            </div>
            <div class="py-2 w-75">
                <span class="mb-10 mt-5 font-weight-bold">: {{$execution->contract_state}}</span>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div class="d-flex flex-column align-items-cente py-2 w-25">
                <p class="text-dark-75 font-weight-bold font-size-lg mb-1">Warranty </p>
            </div>
            <div class="py-2 w-75">
                <span class="mb-10 mt-5 font-weight-bold">
                    <div class="d-flex flex-column flex-lg-fill">
                        <span class="text-dark-75 font-weight-bolder font-size-sm">: {{$execution->warranty->count()}}
                            Warranty</span>
                        <a href="{{ url('warranty/'.$execution->id) }}" class="text-primary font-weight-bolder"> &nbsp;
                            View</a>
                    </div>
                </span>
            </div>
        </div>
        <p class="mt-5 font-weight-bold">Contact Detail of the servicce provider</p>
        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div class="d-flex flex-column align-items-cente py-2 w-25">
                <p class="text-dark-75 font-weight-bold font-size-lg mb-1">Name</p>
            </div>
            <div class="py-2 w-75">
                <span class="mb-10 mt-5 font-weight-bold">: {{$execution->engage->supplier->legal_name}}</span>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div class="d-flex flex-column align-items-cente py-2 w-25">
                <p class="text-dark-75 font-weight-bold font-size-lg mb-1">Phone Number</p>
            </div>
            <div class="py-2 w-75">
                <span class="mb-10 mt-5 font-weight-bold">: {{$execution->engage->supplier->phone}}</span>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div class="d-flex flex-column align-items-cente py-2 w-25">
                <p class="text-dark-75 font-weight-bold font-size-lg mb-1">Website</p>
            </div>
            <div class="py-2 w-75">
                <span class="mb-10 mt-5 font-weight-bold">: {{$execution->engage->supplier->website}}</span>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div class="d-flex flex-column align-items-cente py-2 w-25">
                <p class="text-dark-75 font-weight-bold font-size-lg mb-1">Address</p>
            </div>
            <div class="py-2 w-75">
                <span class="mb-10 mt-5 font-weight-bold">: {{$execution->engage->supplier->address}}</span>
            </div>
        </div>
        <br>
        <hr>
        <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
            <div class="d-flex flex-column align-items-cente py-2 w-25 mb-5">
                <p class="text-dark-75 font-weight-bold font-size-h4 mb-1">Disbursments</p>
            </div>
            <!--begin::Button-->
            <a href="{{ url('disbursment/'.$execution->id.'/create') }}"
                class="btn btn-primary font-weight-bolder mb-10">
                <span class="svg-icon svg-icon-md">
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
                </span>New Record</a>
            <!--end::Button-->
        </div>
        <!--begin: Datatable-->
        <table class="table" id="kt_datatable" style="margin-top: 13px !important">
            <thead>
                <tr>
                    <th class="text-center column-fit">Order</th>
                    <th>Disburmsent Date </th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th class="column-fit">Created at</th>
                    <th class="text-right column-fit">Actions</th>
                </tr>
            </thead>
        </table>
        <!--end: Datatable-->
    </div>
</div>
<!--end::Card-->
@endsection