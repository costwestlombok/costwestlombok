@extends('layouts.metronic')
@section('script')
<script>
    var COST_URL = "{{ url('api/banner') }}";
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
                    data: 'image',
                    render: function (data, type, row, meta) {
                        return "<img style='max-width: 350px; border-radius: 0.85rem;' src='{{ url('storage/') }}/" + data + "' />";
                    },
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'order',
                    searchable: false
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
            order: [[2, "asc"]],
            columnDefs: [
                {
                    targets: 4,
                    title: "{{ __('labels.action') }}",
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return '\
                        <div class="text-right nowrap">\
                            <a href="/banner/' + full.id + '/edit" class="btn btn-xs btn-clean btn-icon">\
                                <i class="fas fa-pen"></i>\
                            </a>\
                            <a href=\'javascript:deleteFn("banner", "' + full.id + '");\' class="button btn btn-xs btn-clean btn-icon">\
                                <i class="fas fa-trash"></i>\
                            </a>\
                        </div>\
                        ';
                    },
                },
                {
                    targets: 3,
                    render: function (data, type, full, meta) {
                        return '\
                        <div class="text-right nowrap">\
                            <code>' + data + '</code>\
                        </div>';
                    },
                },
                {
                    targets: 2,
                    className: 'text-center'
                },
                {
                    targets: 0,
                    className: 'text-center'
                },
            ],
        });
    });
</script>
@endsection
@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ __('labels.banner') }}</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <a href="{{ route('banner.create') }}" class="btn btn-primary font-weight-bolder">
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
                        </span>{{ __('labels.create') }} {{ __('labels.banner') }}</a>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th class="text-center column-fit">#</th>
                            <th>{{ __('labels.banner') }}</th>
                            <th class="text-center column-fit">{{ __('labels.order') }}</th>
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