@extends('layouts.metronic')
@section('script')
<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('metronic/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="/metronic/assets/js/pages/crud/forms/widgets/form-repeater.js"></script>
<!--end::Page Vendors-->
<script>
    var COST_URL = "{{ url('api/tender-offerer') }}";
</script>
<script>
    var KTSelect2 = function () {
        // Private functions
        var demos = function () {
            // basic
            $('#offerer').select2({
                placeholder: "{{ __('labels.choose_offerer') }}"
            });
        }
        return {
            init: function () {
                demos();
            }
        };
    }();

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
                    title: '{{ __("labels.action") }}',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return '\
                        <div class="text-right nowrap">\
                        <a href="#" data-id="'+ full.id + '" class="button btn btn-xs btn-clean btn-icon" data-id=' + full.id + ' title="Delete"><i class="fas fa-trash"></i></a>\
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
        });

        KTSelect2.init();

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
                    $.ajax({
                        type: "GET",
                        url: "/tender-offerer/" + id + "/delete",
                        success: function (data) {
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
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                {{ __('labels.offerer') }} </h5>
            <!--end::Title-->
            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0 mr-5">
                <li class="breadcrumb-item">
                    <a href="{{ url('dashboard') }}" class="text-muted">{{ __('labels.dashboard') }}</a>
                </li>
                @if(isset($tender))
                <li class="breadcrumb-item">
                    <a href="{{ route('project.show', $tender->project) }}"
                        class="text-muted">{{ __('labels.project') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('project.tender.index', $tender->project) }}"
                        class="text-muted">{{ __('labels.tender') }}</a>
                </li>
                @endif
                <li class="breadcrumb-item">
                    {{ __('labels.offerer') }}
                </li>
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Details-->
        @if(isset($tender))
        <!--begin::Toolbar-->
        <div class="d-flex align-items-right">
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
                </span>{{ __('labels.create') }} {{ __('labels.offerer') }}</a>
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
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ __('labels.choose_offerer') }}</h3>
                </div>
            </div>
            <form action="{{ url('/tender-offerer') }}" method="POST">
                @csrf
                <input type="hidden" name="tender_id" value="{{$tender->id}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">{{ __('labels.name') }}</label>
                                <select name="offerer_id" id="offerer" class="form-control" required
                                    style="width: 100%">
                                    <option value="">{{ __('labels.choose_offerer') }}</option>
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
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ __('labels.offerer_list') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th class="text-center column-fit">#</th>
                            <th>{{ __('labels.name') }}</th>
                            <th>{{ __('labels.contract') }}</th>
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