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
        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">Contract Detail</h2>
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
                <a href="{{url('project-tender/'.$contract->award->tender->project->id)}}" class="text-muted">Tender</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{url('tender-award/'.$contract->award->tender->id)}}" class="text-muted">Award</a>
            </li>
            <li class="breadcrumb-item">
                <a href="" class="text-muted">Contract</a>
            </li>
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page Heading-->
</div>
<br>
<!--end::Info-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
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
                                                        <a href="#"  data-id="{{$contract->id}}" class="button navi-link">
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
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection