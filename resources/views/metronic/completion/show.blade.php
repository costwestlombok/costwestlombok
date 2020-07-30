@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<!--begin::Info-->
<div class="d-flex align-items-center flex-wrap mr-1">
    <!--begin::Page Heading-->
    <div class="d-flex align-items-baseline flex-wrap mr-5">
        <!--begin::Page Title-->
        <h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">Contract Completion</h2>
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
                <a href="" class="text-muted">Completion</a>
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
            <div class="col-xl-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b card-stretch">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Info-->
                            <div class="d-flex flex-column mr-auto">
                                <!--begin: Title-->
                                <div class="d-flex flex-column mr-auto">
                                    <a href="#" class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">{{$completion->contract->contract_title}}</a>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Info-->
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
                                                <a href=""
                                                    class="navi-link">
                                                    <span class="navi-icon">
                                                        <i class="flaticon2-pen"></i>
                                                    </span>
                                                    <span class="navi-text">Edit</span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
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
                        <!--end::Info-->
                        <!--begin::Data-->
                        <div class="d-flex w-100 align-items-center mb-4 mt-5">
                            <span class="text-dark-75 font-weight-bolder mr-2 w-25">Final Scope</span>
                            <a href="#" class="text-muted text-hover-primary">: {{ $completion->final_scope }}</a>
                        </div>
                        <div class="d-flex w-100 align-items-center mb-4">
                            <span class="text-dark-75 font-weight-bolder mr-2 w-25">Final Cost</span>
                            <span class="text-muted text-hover-primary">: Rp {{number_format($completion->final_cost)}}</span>
                        </div>
                        <div class="d-flex w-100 align-items-center mb-4">
                            <span class="text-dark-75 font-weight-bolder mr-2 w-25">Final Date</span>
                            <span class="label label-lg label-light-success label-inline font-weight-bold py-4">: {{ date('D, d M Y', strtotime($completion->date)) }}</span>
                        </div>
                        <div class="d-flex w-100 align-items-center mb-4">
                            <span class="text-dark-75 font-weight-bolder mr-2 w-25">Justification</span>
                            <p class="text-muted text-hover-primary w-75">: {{$completion->justification}}</p>
                        </div>
                        <div class="d-flex w-100 align-items-center mb-4">
                            <span class="text-dark-75 font-weight-bolder mr-2 w-25">Description</span>
                            <a href="#" class="text-muted text-hover-primary w-75">: {{$completion->description}}</a>
                        </div>
                        <!--end::Data-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end:: Card-->
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection