@extends('layouts.metronic')
@section('script')
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="/metronic/assets/js/pages/crud/forms/widgets/form-repeater.js"></script>
<!--end::Page Vendors-->
<script>
    var COST_URL = "{{ url('api/project-document') }}";
</script>
<script>
    jQuery(document).ready(function () {
        $('#kt_datatable').DataTable({
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
                    data: 'document_name'
                },
                {
                    data: 'document_type'
                },
                {
                    data: 'author'
                },
                {
                    data: 'document_description'
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
            order: [[5, "desc"]],
            columnDefs: [
                {
                    targets: 6,
                    title: '{{ __("labels.action") }}',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return '@if(Auth::user())\
                        <div class="text-right nowrap">\
                        <a href="#" data-id="'+ full.id + '" class="button btn btn-xs btn-clean btn-icon" data-id=' + full.id + ' title="Delete"><i class="fas fa-trash"></i></a>\
                        </div>\
                        @endif';
                    },
                },
                {
                    targets: 5,
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
        });
        
        $(document).on('click', '.button', function (e) {
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
            }).then(function (result) {
                if (result.value) {
                    window.location.href = "/api/project-file/" + id + "/delete";
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
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                {{ __('labels.document') }} </h5>
            <!--end::Title-->
            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0 mr-5">
                <li class="breadcrumb-item">
                    <a href="{{ url('dashboard') }}" class="text-muted">{{ __('labels.dashboard') }}</a>
                </li>
                @if(isset($project))
                <li class="breadcrumb-item">
                    <a href="{{ route('project.show', $project) }}" class="text-muted">{{ __('labels.project') }}</a>
                </li>
                @endif
                <li class="breadcrumb-item">
                    {{ __('labels.document') }}
                </li>
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Details-->
        @if(isset($project))
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            <a href="javascript:history.back()" class="btn btn-default font-weight-bold">{{ __('labels.back') }} </a>
            <!--end::Button-->
        </div>
        <!--end::Toolbar-->
        @endif
    </div>
</div>
<!--end::Subheader-->

<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        @if(Auth::user())
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ __('labels.create') }} {{ __('labels.document') }}</h3>
                </div>
            </div>
            <form method="post" action="{{ isset($file) ? url('project-file/'.$file->id) : url('project-file') }}"
                enctype="multipart/form-data">
                @csrf
                @if(isset($file))
                @method('patch')
                @endif
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">{{ __('labels.document_name') }}</label>
                                <input type="text" name="document_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('labels.document_type') }}</label>
                                <select class="form-control" name="document_type" required>
                                    <option selected disabled>...</option>
                                    <option value="landAndSettlementImpact">{{ __('labels.landAndSettlementImpact') }}</option>
                                    <option value="environmentalImpact">{{ __('labels.environmentalImpact') }}</option>
                                    <option value="finalAudit">{{ __('labels.finalAudit') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('labels.author') }}</label>
                                <input type="text" name="author" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('labels.publication_date') }}</label>
                                <input type="date" name="date_of_publication" class="form-control"
                                    value="{{date('m-d-Y')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('labels.document') }}</label>
                                <div></div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file" required>
                                    <label class="custom-file-label" for="file">{{ __('labels.choose_file') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">{{ __('labels.description') }}</label>
                                <textarea name="document_description" rows="5" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="float-right">
                                <button type="submit"
                                    class="btn font-weight-bold btn-success mr-2">{{ __('labels.save') }}</button>
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
                    <h3 class="card-label">{{ __('labels.document_list') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th class="text-center column-fit">#</th>
                            <th>{{ __('labels.document_name') }}</th>
                            <th>{{ __('labels.document_type') }}</th>
                            <th>{{ __('labels.author') }}</th>
                            <th>{{ __('labels.description') }}</th>
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