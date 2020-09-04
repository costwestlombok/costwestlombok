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
<script>
    var COST_URL = "{{ url('api/budget-source') }}";
</script>
<script>
    var KTTypeahead = function () {
        var demo1 = function () {
            var source = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // url points to a json file that contains an array of country names, see
                // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                // prefetch: COST_URL
                prefetch: "{{ url('/get-source') }}"
            });

            // passing in `null` for the `options` arguments will result in the default
            // options being used

            $('#source_id').typeahead(null, {
                name: 'source_id',
                source: source
            });
        }
        return {
            // public functions
            init: function () {
                demo1();
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
                        data: 'source_name'
                    },
                    {
                        data: 'amount'
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
        KTTypeahead.init();
        
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
                            url: "/budget-source/"+ id +"/delete",
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
        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">Project Source</h2>
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
                <a href="{{ url('project-budget/'.$budget->project->id) }}" class="text-muted">Budget</a>
            </li>
            <li class="breadcrumb-item">
                <a href="" class="text-muted">Source</a>
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
            <h3 class="card-label">Choose Source</h3>
        </div>
    </div>
    <form action="{{ url('budget-source') }}" method="POST">
        @csrf
        <input type="hidden" name="budget_id" value="{{$budget->id}}">
        <input type="hidden" name="project_id" value="{{$budget->project->id}}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Source Name</label>
                        <div class="typeahead">
                            <input class="form-control" id="source_id" name="source_id" type="text" dir="ltr"
                                style="width: 100%">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Amount</label>
                        <input type="text" class="form-control" name="amount">
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
            <h3 class="card-label">Source List</h3>
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table" id="kt_datatable" style="margin-top: 13px !important">
            <thead>
                <tr>
                    <th class="text-center column-fit">#</th>
                    <th>Source Name</th>
                    <th>Amount</th>
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