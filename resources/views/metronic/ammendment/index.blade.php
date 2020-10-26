@extends('layouts.metronic')
@section('script')
<script>
    var COST_URL = "{{ url('api/ammendment/'.$contract->id) }}";
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
                    data: 'justification'
                },
                {
                    data: 'current_contract_scope'
                },
                {
                    data: 'adendum'
                },
                {
                    data: 'current_price'
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
                    title: "{{ __('labels.action') }}",
                    orderable: false,
                    render: function (data, type, full, meta) {
                        @if(Auth::check())
                        return '\
                            <div class="text-right nowrap">\
                            <a href="/ammendment/' + full.id + '/edit" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
                                <i class="fas fa-pen"></i>\
                            </a>\
                            <a href="#"  data-id="' + full.id + '" class="button btn btn-sm btn-clean btn-icon" data-id=' + full.id + ' title="Delete"><i class="fas fa-trash"></i></a>\
                            </div>\
                        ';
                        @else
                        return '';
                        @endif
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
                    targets: 3,
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return '<div class="text-center nowrap">\
                            <a href="/storage/' + data + '" target="_blank">View file</a>\
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
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Contract Ammendment</h5>
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
                    <a href="{{ route('project.show', $contract->award->tender->project) }}"
                        class="text-muted">Project</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('project.tender.index', $contract->award->tender->project) }}"
                        class="text-muted">Tender</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tender.award.index', $contract->award->tender) }}" class="text-muted">Award</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('contract.show', $contract) }}" class="text-muted">Contract</a>
                </li>
                <li class="breadcrumb-item">
                    Contract Ammendments
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
                    <h3 class="card-label">Ammendment List</h3>
                </div>
                @if(Auth::check())
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{ url('contract-ammendment/'.$contract->id.'/create') }}"
                        class="btn btn-primary font-weight-bolder">
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
                </div>
                @endif
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th class="text-center column-fit">#</th>
                            <th>Justification</th>
                            <th>Contract Scope</th>
                            <th>Adendum</th>
                            <th>Contract Price</th>
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