@extends('layouts.metronic')
@section('title', 'OPD')
@section('style')
<!--begin::Page Vendors Styles(used by this page)-->
<link href="metronic/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
@endsection
@section('script')
<!--begin::Page Vendors(used by this page)-->
<script src="metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors-->
<script>
    var COST_URL = "{{ url('api/organization') }}";
</script>
<script>
    "use strict";
    var KTDatatables = function () {
        var initTable1 = function () {
            var table = $('#kt_datatable');
            // begin first table
            table.DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
                order: [[4, "desc"]],
                columnDefs: [
                    {
                        targets: [0, 4],
                        orderable: false,
                    },
                ],
                language: {
                    "url": "{{ app()->getLocale() == 'id' ? 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json' : '' }}"
                },
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
        KTDatatables.init();
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
                    <h3 class="card-label">OPD</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <button data-toggle="modal" data-target="#create" class="btn btn-primary font-weight-bolder">
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
                        </span>{{ __('labels.create') }} OPD
                    </button>
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable-->
                <table class="table" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                        <tr>
                            <th class="text-center column-fit">#</th>
                            <th>OPD</th>
                            <th>{{ __('labels.name') }}</th>
                            <th>{{ __('labels.project') }}</th>
                            <th class="column-fit">{{ __('labels.created_at') }}</th>
                            <th class="text-right column-fit">{{ __('labels.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agencies as $a)
                        <tr>
                            <td class="text-center">{{ number($loop->index + 1) }}</td>
                            <td>{{ $a->name }}</td>
                            <td>{{ $a->full_name }}</td>
                            <td>{{ $a->projects()->count() }}</td>
                            <td class="column-fit"><code>{{ $a->created_at }}</code></td>
                            <td class="text-right column-fit">
                                <div class="text-right nowrap">
                                    <button data-toggle="modal" data-target="#account-{{ $a->id }}"
                                        class="btn btn-xs btn-clean btn-icon" title="Account">
                                        <i class="fas fa-user"></i>
                                    </button>
                                    <button data-toggle="modal" data-target="#edit-{{ $a->id }}"
                                        class="btn btn-xs btn-clean btn-icon" title="Edit details">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button data-toggle="modal" data-target="#delete-{{ $a->id }}"
                                        class="btn btn-xs btn-clean btn-icon" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<form action="{{ route('agency.store') }}" method="post">
    @csrf
    <div class="modal fade" id="create" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('labels.create') }} OPD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>OPD</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('labels.name') }}</label>
                        <input type="text" name="full_name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">{{ __('labels.close') }}</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">{{ __('labels.save') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
@foreach($agencies as $a)
<form action="{{ route('agency.update', $a) }}" method="post">
    @csrf
    @method('put')
    <div class="modal fade" id="edit-{{ $a->id }}" data-backdrop="static" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('labels.edit') }} OPD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>OPD</label>
                        <input type="text" name="name" value="{{ $a->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('labels.name') }}</label>
                        <input type="text" name="full_name" value="{{ $a->full_name }}" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">{{ __('labels.close') }}</button>
                    <button type="submit"
                        class="btn btn-primary font-weight-bold">{{ __('labels.save_changes') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="{{ route('agency.destroy', $a) }}" method="post">
    @csrf
    @method('delete')
    <div class="modal fade" id="delete-{{ $a->id }}" data-backdrop="static" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>{{ __('labels.delete') }} OPD</h5>
                    <p>{{ __('labels.delete_sub') }}</p>
                    <div class="float-right">
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                            data-dismiss="modal">{{ __('labels.close') }}</button>
                        <button type="submit"
                            class="btn btn-primary font-weight-bold ml-1">{{ __('labels.delete') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="{{ route('agency.user', $a) }}" method="post">
    <input type="hidden" name="type" value="agency">
    @csrf
    <div class="modal fade" id="account-{{ $a->id }}" data-backdrop="static" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __($a->user ? 'labels.edit' : 'labels.create') }} {{ __('labels.user') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>{{ __('labels.name') }}</label>
                        <input type="text" name="name" value="{{ $a->user->name ?? '' }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" value="{{ $a->user->username ?? '' }}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $a->user->email ?? '' }}" class="form-control"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" {{ $a->user ? '' : 'required' }}>
                        @if($a->user)
                        <span class="form-text text-muted">{{ __('labels.password_help') }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Tutup</button>
                    <button type="submit"
                        class="btn btn-primary font-weight-bold">{{ __($a->user ? 'labels.save_changes' : 'labels.save') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection