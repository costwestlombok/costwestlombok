@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
<script>
    jQuery(document).ready(function () {
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
                        window.location.href = "/api/contract/"+ id +"/delete"; 
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
        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">Contracts</h2>
        <!--end::Page Title-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
            <li class="breadcrumb-item">
                <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
            </li>
            @if(isset($award))
            <li class="breadcrumb-item">
                <a href="{{ url('/project') }}" class="text-muted">Project</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{url('project-tender/'.$tender->project->id)}}" class="text-muted">Tender</a>
            </li>
            @endif
            <li class="breadcrumb-item">
                <a href="" class="text-muted">Contracts</a>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page Heading-->
</div>
<br>
<!--end::Info-->
{{-- Project Sub Header --}}
<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">

            <!--begin::Separator-->
            <div class=" mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Search Form-->
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{$contracts->total()}} Total</span>
                <form class="ml-5">
                    <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                        <input type="text" class="form-control" id="kt_subheader_search_form" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/General/Search.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path
                                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!--end::Search Form-->
            <!--begin::Group Actions-->
            <div class="d-flex- align-items-center flex-wrap mr-2 d-none" id="kt_subheader_group_actions">
                <div class="text-dark-50 font-weight-bold">
                    <span id="kt_subheader_group_selected_rows">23</span>Selected:</div>
                <div class="d-flex ml-6">
                    <div class="dropdown mr-2" id="kt_subheader_group_actions_status_change">
                        <button type="button" class="btn btn-light-primary font-weight-bolder btn-sm dropdown-toggle"
                            data-toggle="dropdown">Update Status</button>
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-sm">
                            <ul class="navi navi-hover pt-3 pb-4">
                                <li
                                    class="navi-header font-weight-bolder text-uppercase text-primary font-size-lg pb-0">
                                    Change status to:</li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" data-toggle="status-change" data-status="1">
                                        <span class="navi-text">
                                            <span
                                                class="label label-light-success label-inline font-weight-bold">Approved</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" data-toggle="status-change" data-status="2">
                                        <span class="navi-text">
                                            <span
                                                class="label label-light-danger label-inline font-weight-bold">Rejected</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" data-toggle="status-change" data-status="3">
                                        <span class="navi-text">
                                            <span
                                                class="label label-light-warning label-inline font-weight-bold">Pending</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link" data-toggle="status-change" data-status="4">
                                        <span class="navi-text">
                                            <span class="label label-light-info label-inline font-weight-bold">On
                                                Hold</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button class="btn btn-light-success font-weight-bolder btn-sm mr-2"
                        id="kt_subheader_group_actions_fetch" data-toggle="modal"
                        data-target="#kt_datatable_records_fetch_modal">Fetch Selected</button>
                    <button class="btn btn-light-danger font-weight-bolder btn-sm mr-2"
                        id="kt_subheader_group_actions_delete_all">Delete All</button>
                </div>
            </div>
            <!--end::Group Actions-->
        </div>
        <!--end::Details-->
    </div>
</div>
{{-- End Project Sub Header --}}
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            @foreach ($contracts as $contract)
            <div class="col-md-12">
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <!--begin::Top-->
                        <div class="d-flex">
                            <!--begin: Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex">
                                    <!--begin::User-->
                                    <div class="d-plex flex-column mr-auto">
                                        <!--begin::Name-->
                                        <a href="#"
                                            class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$contract->contract_title}}
                                            <!--end::Name-->
                                            <!--begin::Contacts-->
                                            <div class="my-2">
                                                <a href="#"
                                                    class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                    Contract Number: {{$contract->number}}</a>
                                            </div>
                                            <!--end::Contacts-->
                                    </div>
                                    <!--begin::User-->
                                    <!--begin::Actions-->
                                    <div class="card-toolbar mb-7">
                                        <div class="dropdown dropdown-inline" data-toggle="tooltip" title=""
                                            data-placement="left" data-original-title="Quick actions">
                                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="ki ki-bold-more-hor"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <!--begin::Navigation-->
                                                <ul class="navi navi-hover">
                                                    <li class="navi-header pb-1">
                                                        <span
                                                            class="text-primary text-uppercase font-weight-bold font-size-sm">Action:</span>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="{{url('contract/'.$contract->id.'/edit')}}"
                                                            class="navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon2-pen"></i>
                                                            </span>
                                                            <span class="navi-text">Edit</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" data-id="{{$contract->id}}" class="button navi-link">
                                                            <span class="navi-icon">
                                                                <i class="flaticon2-trash"></i>
                                                            </span>
                                                            <span class="navi-text">Hapus</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                                <!--end::Navigation-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Title-->
                                <!--begin::Content-->
                                <p class="mb-7 mt-3">Contract Scope - {{$contract->contract_scope}}</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                                            <span class="mr-4">
                                                <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                                            </span>
                                            <div class="d-flex flex-column text-dark-75">
                                                <span class="font-weight-bolder font-size-sm">Price local
                                                    currency</span>
                                                <span class="font-weight-bolder font-size-h5">
                                                    <span class="text-dark-50 font-weight-bold">Rp
                                                    </span>{{number_format($contract->price_local_currency)}}</span>
                                            </div>
                                        </div>
                                        <!--end: Item-->
                                        <!--begin: Item-->
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                                            <span class="mr-4">
                                                <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                                            </span>
                                            <div class="d-flex flex-column text-dark-75">
                                                <span class="font-weight-bolder font-size-sm">Price USD currency</span>
                                                <span class="font-weight-bolder font-size-h5">
                                                    <span class="text-dark-50 font-weight-bold">$
                                                    </span>{{number_format($contract->price_usd_currency)}}</span>
                                            </div>
                                        </div>
                                        <!--end: Item-->
                                    </div>
                                </div>

                                <hr>
                                <div class="d-flex align-items-center flex-wrap">

                                    <div class="mr-12 d-flex flex-column mb-7">
                                        <span class="d-block font-weight-bold mb-4">Start Date</span>
                                        <span
                                            class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($contract->start_date)->format('D, d M Y') }}</span>
                                    </div>
                                    <div class="mr-12 d-flex flex-column mb-7">
                                        <span class="d-block font-weight-bold mb-4">Due Date</span>
                                        <span
                                            class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($contract->end_date)->format('D, d M Y') }}</span>
                                    </div>
                                    <div class="mr-12 d-flex flex-column mb-7 mr-12">
                                        <span class="d-block font-weight-bold mb-4">Extended Date</span>
                                        <span
                                            class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($contract->max_extended_date)->format('D, d M Y') }}</span>
                                    </div>
                                    <div
                                        class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200 ml-12 mr-12">
                                    </div>
                                    <div class="mr-12 d-flex flex-column mb-7 mr-12">
                                        <span class="d-block font-weight-bold">Ammendements</span>
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                            <span class="mr-4">
                                                <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                                            </span>
                                            <div class="d-flex flex-column flex-lg-fill">
                                                <span
                                                    class="text-dark-75 font-weight-bolder font-size-sm">{{$contract->ammendment->count()}}
                                                    Ammendements</span>
                                                <a href="{{ url('contract-ammendment/'.$contract->id) }}"
                                                    class="text-primary font-weight-bolder">View</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mr-12 d-flex flex-column mb-7 mr-12">
                                        <span class="d-block font-weight-bold">Executions</span>
                                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                            <span class="mr-4">
                                                <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                                            </span>
                                            <div class="d-flex flex-column flex-lg-fill">
                                                <span
                                                    class="text-dark-75 font-weight-bolder font-size-sm">Executions</span>
                                                @if($contract->execution)
                                                <a href="{{url('contract-execution/'.$contract->execution->id)}}"
                                                    class="text-primary font-weight-bolder">View</a>
                                                @else
                                                <a href="{{url('contract-execution/'.$contract->id.'/create')}}"
                                                    class="text-primary font-weight-bolder">Create</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                        @if($contract->completion)
                                        <a class="btn btn-primary"
                                            href="{{url('contract-completion/'.$contract->completion->id)}}">Show
                                            Completion</a>
                                        @else
                                        <a class="btn btn-primary"
                                            href="{{url('contract-completion/'.$contract->id.'/create')}}">Create
                                            Completion</a>
                                        @endif
                                    </div>

                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Top-->

                    </div>
                </div>
            </div>
            <!--end::Card-->
            @endforeach
        </div>
        <!--end::Row-->

        <!--begin::Pagination-->
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex flex-wrap mr-3">

                @if($contracts->lastPage() > 1)
                <a href="{{ $contracts->url(1) }}" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                    <i class="ki ki-bold-double-arrow-back icon-xs"></i>
                </a>
                <a href="{{ $contracts->url(1) }}"
                    class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($contracts->currentPage() == 1) ? ' disabled' : '' }}">
                    <i class="ki ki-bold-arrow-back icon-xs"></i>
                </a>
                @for ($i = 1; $i <= $contracts->lastPage(); $i++)
                    <a href="{{ $contracts->url($i) }}"
                        class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1 {{ ($contracts->currentPage() == $i) ? ' active' : '' }}">{{$i}}</a>
                    @endfor
                    <a href="{{ $contracts->url($contracts->currentPage()+1) }}"
                        class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 {{ ($contracts->currentPage() == $contracts->lastPage()) ? ' disabled' : '' }}">
                        <i class="ki ki-bold-arrow-next icon-xs"></i>
                    </a>
                    <a href="{{ $contracts->url($contracts->lastPage()) }}"
                        class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
                        <i class="ki ki-bold-double-arrow-next icon-xs"></i>
                    </a>
                    @endif

            </div>
            <div class="d-flex align-items-center">
                <select
                    class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary"
                    style="width: 75px;">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="text-muted">Displaying {{$contracts->count()}} of {{$contracts->total()}} records</span>
            </div>
        </div>
        <!--end::Pagination-->
    </div>
    <!--end::Container-->
</div>
@endsection