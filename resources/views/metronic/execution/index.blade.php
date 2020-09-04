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
<script>
    var COST_URL = "{{ url('api/disbursment/'.$execution->id) }}";
</script>
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
                            @if(Auth::check())
                            return '\
                                <div class="text-right nowrap">\
                                <a href="../disbursment/'+ full.id + '/edit" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
                                    <i class="fas fa-pen"></i>\
                                </a>\
                                <a href="#"  data-id="'+ full.id + '" class="button btn btn-sm btn-clean btn-icon" data-id=' + full.id + ' title="Delete"><i class="fas fa-trash"></i></a>\
                                </div>\
                            ';
                            @else
                            return '';
                            @endif
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
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Contract Execution</h5>
            <!--end::Title-->
            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('dashboard') }}" class="text-muted">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('project.show', $execution->engage->award->tender->project) }}"
                        class="text-muted">Project</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('project.tender.index', $execution->engage->award->tender->project) }}"
                        class="text-muted">Tender</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tender.award.index', $execution->engage->award->tender) }}"
                        class="text-muted">Award</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('contract.show', $execution->engage) }}" class="text-muted">Contract</a>
                </li>
                <li class="breadcrumb-item">
                    Contract executions
                </li>
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Details-->
    </div>
</div>
<!--end::Subheader-->

<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">Execution</h3>
                </div>
                @if(Auth::check())
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline">
                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ki ki-bold-more-hor"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover">
                                <li class="navi-item">
                                    <a href="{{ url('execution/'.$execution->id.'/edit') }}" class="navi-link">
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
                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15"
                                                        height="2" rx="1" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="navi-text ml-2"> Edit</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" data-id="{{ $execution->id }}" class="button-ex navi-link">
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
                                        <span class="navi-text ml-2"> Delete</span>
                                    </a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="d-flex flex-column align-items-cente py-2 w-25">
                        <p class="text-dark-75 mb-1">Start Date </p>
                    </div>
                    <div class="py-2 w-75">
                        <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">
                            {{ Carbon\Carbon::parse($execution->start_date)->format('l, d F Y') }}</span>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="d-flex flex-column align-items-cente py-2 w-25">
                        <p class="text-dark-75 mb-1">Program </p>
                    </div>
                    <div class="py-2 w-75">
                        <span class="mb-10 mt-5 font-weight-bold">{{ $execution->program }}</span>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="d-flex flex-column align-items-cente py-2 w-25">
                        <p class="text-dark-75 mb-1">Contract State </p>
                    </div>
                    <div class="py-2 w-75">
                        <span class="mb-10 mt-5 font-weight-bold">{{ $execution->contract_state }}</span>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="d-flex flex-column align-items-cente py-2 w-25">
                        <p class="text-dark-75 mb-1">Warranty </p>
                    </div>
                    <div class="py-2 w-75">
                        <span class="mb-10 mt-5 font-weight-bold">
                            <div class="d-flex flex-column flex-lg-fill">
                                <span class="text-dark-75 font-weight-bolder font-size-sm">
                                    {{ $execution->warranty->count() }} Warranty,
                                    <a href="{{ url('warranty/'.$execution->id) }}"
                                        class="text-primary font-weight-bolder">
                                        View
                                    </a>
                                </span>
                            </div>
                        </span>
                    </div>
                </div>
                <p class="mt-5 font-size-lg font-weight-bold">Contact Detail of the service provider</p>
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="d-flex flex-column align-items-cente py-2 w-25">
                        <p class="text-dark-75 mb-1">Name</p>
                    </div>
                    <div class="py-2 w-75">
                        <span class="mb-10 mt-5 font-weight-bold">{{ $execution->engage->supplier->legal_name }}</span>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="d-flex flex-column align-items-cente py-2 w-25">
                        <p class="text-dark-75 mb-1">Phone Number</p>
                    </div>
                    <div class="py-2 w-75">
                        <span class="mb-10 mt-5 font-weight-bold">{{ $execution->engage->supplier->phone }}</span>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="d-flex flex-column align-items-cente py-2 w-25">
                        <p class="text-dark-75 mb-1">Website</p>
                    </div>
                    <div class="py-2 w-75">
                        <span class="mb-10 mt-5 font-weight-bold">{{ $execution->engage->supplier->website }}</span>
                    </div>
                </div>
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="d-flex flex-column align-items-cente py-2 w-25">
                        <p class="text-dark-75 mb-1">Address</p>
                    </div>
                    <div class="py-2 w-75">
                        <span class="mb-10 mt-5 font-weight-bold">{{ $execution->engage->supplier->address }}</span>
                    </div>
                </div>
                <hr>
                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                    <div class="d-flex flex-column align-items-cente py-2 w-25 mb-5">
                        <p class="text-dark-75 font-size-h4 mb-1">Disbursments</p>
                    </div>
                    @if(Auth::check())
                    <!--begin::Button-->
                    <a href="{{ url('disbursment/'.$execution->id.'/create') }}"
                        class="btn btn-primary font-weight-bolder mb-10">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                    @endif
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
    </div>
    <!--end::Container-->
</div>
@endsection