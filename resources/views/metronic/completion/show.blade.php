@extends('layouts.metronic')
@section('content')
@php
if (!isset($contract)) {
$contract = $completion->contract;
}
@endphp
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ __('labels.contract_completion') }}</h5>
            <!--end::Title-->
            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/dashboard') }}" class="text-muted">{{ __('labels.dashboard') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('project.show', $contract->award->tender->project) }}"
                        class="text-muted">{{ __('labels.project') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('project.tender.index', $contract->award->tender->project) }}"
                        class="text-muted">{{ __('labels.tender') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('tender.award.index', $contract->award->tender) }}"
                        class="text-muted">{{ __('labels.award') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('award.contract.index', $contract->award) }}"
                        class="text-muted">{{ __('labels.contract') }}</a>
                </li>
                <li class="breadcrumb-item">
                    {{ __('labels.completion') }}
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
        @if($completion)
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <!--begin::Info-->
                    <div class="d-flex flex-column mr-auto">
                        <!--begin: Title-->
                        <div class="d-flex flex-column mr-auto">
                            <a href="#"
                                class="text-dark text-hover-primary font-size-h4 font-weight-bolder mb-1">{{ $completion->contract->contract_title }}</a>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Info-->
                    @if(Auth::user())
                    <!--begin::Actions-->
                    <div class="card-toolbar mb-7">
                        <div class="dropdown dropdown-inline">
                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ki ki-bold-more-hor"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover">
                                    <li class="navi-item">
                                        <a href="{{ url('contract-completion/'.$completion->id.'/edit') }}"
                                            class="navi-link">
                                            <span class="svg-icon menu-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15"
                                                            height="2" rx="1" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <span class="navi-text ml-2"> {{ __('labels.edit') }}</span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="javascript:deleteFn('completion', '{{ $completion->id }}')"
                                            class="navi-link">
                                            <span class="svg-icon menu-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path
                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                            fill="#000000" fill-rule="nonzero" />
                                                        <path
                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                            fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <span class="navi-text ml-2"> {{ __('labels.delete') }}</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                        </div>
                    </div>
                    <!--end::Actions-->
                    @endif
                </div>
                <!--end::Info-->
                <!--begin::Data-->
                <div class="d-flex w-100 align-items-center mb-4 mt-5">
                    <span class="text-dark-75 mr-2 w-25">{{ __('labels.final_scope') }}</span>
                    <span class="text-muted font-weight-bold">
                        {{ $completion->final_scope }}</span>
                </div>
                <div class="d-flex w-100 align-items-center mb-4">
                    <span class="text-dark-75 mr-2 w-25">{{ __('labels.final_cost') }}</span>
                    <span class="text-muted font-weight-bold">Rp
                        {{ number_format($completion->final_cost) }}</span>
                </div>
                <div class="d-flex w-100 align-items-center mb-4">
                    <span class="text-dark-75 mr-2 w-25">{{ __('labels.final_date') }}</span>
                    <span class="label label-lg label-light-success label-inline font-weight-bold py-4">
                        {{ Carbon\Carbon::parse($completion->date)->translatedFormat('l, d M Y') }}</span>
                </div>
                <div class="d-flex w-100 align-items-center mb-4">
                    <span class="text-dark-75 mr-2 w-25">{{ __('labels.justification') }}</span>
                    <p class="text-muted font-weight-bold w-75" style="white-space: pre-line">
                        {!!$completion->justification!!}</p>
                </div>
                <div class="d-flex w-100 align-items-center mb-4">
                    <span class="text-dark-75 mr-2 w-25">{{ __('labels.description') }}</span>
                    <p href="#" class="text-muted font-weight-bold w-75" style="white-space: pre-line">
                        {{ $completion->description }}</p>
                </div>
                <!--end::Data-->
            </div>
            <!--end::Body-->
        </div>
        <!--end:: Card-->
        @endif
    </div>
    <!--end::Container-->
</div>
@endsection