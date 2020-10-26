@extends('layouts.metronic')
@section('content')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ __('labels.contract_detail') }}</h5>
            <!--end::Title-->
            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('dashboard') }}" class="text-muted">{{ __('labels.dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('project.show', $award->tender->project) }}"
                        class="text-muted">{{ __('labels.project') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('project.tender.index', $award->tender->project) }}"
                        class="text-muted">{{ __('labels.tender') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tender.award.index', $award->tender) }}"
                        class="text-muted">{{ __('labels.award') }}</a>
                </li>
                <li class="breadcrumb-item">
                    {{ __('labels.contract') }}
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
        @includeWhen($contract, 'metronic.shared.contract', ['contract' => $contract])
    </div>
    <!--end::Container-->
</div>
@endsection