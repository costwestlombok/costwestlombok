@extends('layouts.metronic')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<script>
    var COST_URL = "{{ url('api/advance-image') }}";
    var IMAGE_URL = "{{url('advance-images/'.$advance->id)}}";
</script>
<script>

    "use strict";

    var KTDropzoneDemo = function () {
    // Private functions
        var demo1 = function () {
            // multiple file upload
            $('#kt_dropzone_2').dropzone({
                url: IMAGE_URL, // Set the url for your upload script location
                paramName: "file", // The name that will be used to transfer the file
                maxFiles: 10,
                maxFilesize: 10, // MB
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        };
        return {
            // public functions
            init: function() {
                demo1();
            }
        };
    }();
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
                        data: 'image'
                    },
                    {
                        data: 'path'
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
        KTDropzoneDemo.init();

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
                <a href="" class="text-muted">Advance Images</a>
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
            <h3 class="card-label">Upload Images</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="dropzone dropzone-default dropzone-primary dz-clickable" id="kt_dropzone_2">
            <div class="dropzone-msg dz-message needsclick">
                <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                <span class="dropzone-msg-desc">Upload up to 10 files</span>
            </div>
        </div>
    </div>
</div>
<br>
<!--end::Card-->
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Advance Image List</h3>
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table" id="kt_datatable" style="margin-top: 13px !important">
            <thead>
                <tr>
                    <th class="text-center column-fit">#</th>
                    <th>Image Name</th>
                    <th>Path</th>
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