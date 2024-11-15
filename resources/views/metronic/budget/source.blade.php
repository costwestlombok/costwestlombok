@extends('layouts.metronic')
@section('script')
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="/metronic/assets/js/pages/crud/forms/widgets/form-repeater.js"></script>
    <!--end::Page Vendors-->
    <script>
        var COST_URL = "{{ url('api/budget/' . $budget->id . '/source') }}";
    </script>
    <script>
        var KTTypeahead = function() {
            var demo1 = function() {
                var source = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    // url points to a json file that contains an array of country names, see
                    // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                    // prefetch: COST_URL
                    prefetch: "{{ url('/get-sources') }}"
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
                init: function() {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function() {
            $('#kt_datatable').DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: COST_URL,
                columns: [{
                        data: "id",
                        className: "right-align",
                        render: function(data, type, row, meta) {
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
                order: [
                    [3, "desc"]
                ],
                columnDefs: [{
                        targets: 4,
                        title: '{{ __('labels.action') }}',
                        orderable: false,
                        render: function(data, type, full, meta) {
                            return '\
                            <div class="text-right nowrap">\
                            <a href="#"  data-id="' + full.id + '" class="button btn btn-sm btn-clean btn-icon" data-id=' + full.id + ' title="Delete"><i class="fas fa-trash"></i></a>\
                            </div>\
                        ';
                        },
                    },
                    {
                        targets: 3,
                        render: function(data, type, full, meta) {
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
            });
            KTTypeahead.init();

            $(document).on('click', '.button', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var link = $(this).attr('href');
                Swal.fire({
                    title: "{{ __('labels.delete_sub') }}",
                    text: "{!! __('labels.delete_text') !!}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "{{ __('labels.delete_confirm') }}",
                    cancelButtonText: "{{ __('labels.cancel') }}"
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            type: "GET",
                            url: "/budget-source/" + id + "/delete",
                            success: function(data) {
                                toastr.success("{{ __('labels.delete_success') }}");
                                var table = $('#kt_datatable').DataTable();
                                table.ajax.reload(null, false);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ __('labels.source') }}</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0 mr-5">
                    <li class="breadcrumb-item">
                        <a href="{{ url('dashboard') }}" class="text-muted">{{ __('labels.dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('project') }}" class="text-muted">{{ __('labels.project') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('project-budget/' . $budget->project->id) }}" class="text-muted">{{ __('labels.budget') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        {{ __('labels.source') }}
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
            @if (Auth::user())
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">{{ __('labels.create') }} {{ __('labels.source') }}</h3>
                        </div>
                    </div>
                    <form action="{{ url('budget-source') }}" method="POST">
                        @csrf
                        <input type="hidden" name="budget_id" value="{{ $budget->id }}">
                        <input type="hidden" name="project_id" value="{{ $budget->project->id }}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('labels.source_name') }}</label>
                                        <div class="typeahead">
                                            <input class="form-control" id="source_id" name="source_id" type="text" dir="ltr" style="width: 100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">{{ __('labels.amount') }}</label>
                                        <input type="number" class="form-control" name="amount" value=0>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="float-right">
                                        <button type="submit" class="btn font-weight-bold btn-success mr-2">{{ __('labels.save') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <!--end::Card-->
            @endif
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">{{ __('labels.source_list') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table" id="kt_datatable" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th class="text-center column-fit">#</th>
                                <th>{{ __('labels.source_list') }}</th>
                                <th>{{ __('labels.amount') }}</th>
                                <th class="column-fit">{{ __('labels.created_at') }}</th>
                                <th class="text-right column-fit">{{ __('labels.action') }}</th>
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
