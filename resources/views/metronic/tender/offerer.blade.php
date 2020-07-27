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
<script src="/metronic/assets/js/pages/crud/forms/widgets/form-repeater.js"></script>
<!--end::Page Vendors-->
<script>var COST_URL = "{{ url('api/tender-offerer') }}";</script>
<script>
    var KTSelect2 = function () {
        // Private functions
        var demos = function () {
            // basic
            $('#offerer').select2({
                placeholder: "Choose an offerer"
            });
        }
        return {
            init: function () {
                demos();
            }
        };
    }();

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
                        data: "id",
                        className: "right-align",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'offerer'
                    },
                    {
                        data: 'contract'
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
                order: [[3, "desc"]],
                columnDefs: [
                    {
                        targets: 4,
                        title: 'Actions',
                        orderable: false,
                        render: function (data, type, full, meta) {
                            return '\
                            <div class="text-right nowrap">\
                            <a href="#"  data-id="'+full.id+'" class="button btn btn-sm btn-clean btn-icon" data-id='+  full.id +' title="Delete"><i class="fas fa-trash"></i></a>\
                            </div>\
                		';
                        },
                    },
                    {
                        targets: 3,
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
        KTSelect2.init();
        
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
                            url: "/api/tender-offerer/"+ id +"/delete",
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
        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">Offerer</h2>
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
                <a href="{{ url('project-tender/'.$tender->project->id) }}" class="text-muted">Tender</a>
            </li>
            <li class="breadcrumb-item">
                <a href="" class="text-muted">Offerer</a>
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
            <h3 class="card-label">Choose Offerer</h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <a href="{{ route('offerer.create') }}" class="btn btn-primary font-weight-bolder">
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
                </span>New Offerer</a>
            <!--end::Button-->
        </div>
    </div>
    <form action="{{ url('/tender-offerer') }}" method="POST">
    @csrf
    <input type="hidden" name="tender_id" value="{{$tender->id}}">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Offerer Name:</label>
                    <select name="offerer_id" id="offerer" class="form-control" required style="width: 100%">
                        <option value="">Choose Offerer</option>
                        @foreach ($offerers as $offerer)
                            <option value="{{$offerer->id}}">{{$offerer->offerer_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>    
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-right">
                    <button type="submit" class="btn font-weight-bold btn-success mr-2">Submit</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<br>
<!--end::Card-->
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Offerer List</h3>
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table" id="kt_datatable" style="margin-top: 13px !important">
            <thead>
                <tr>
                    <th class="text-center column-fit">#</th>
                    <th>Offerer Name</th>
                    <th>Contract</th>
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