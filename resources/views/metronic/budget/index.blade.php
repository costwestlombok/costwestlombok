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
                title: "{{ __('labels.delete_sub') }}",
                text: "{!! __('labels.delete_text') !!}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "{{ __('labels.delete_confirm') }}",
                cancelButtonText: "{{ __('labels.cancel') }}"
            }).then(function(result) {
                if (result.value) {
                    window.location.href = "/project-budget/"+ id +"/delete"; 
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
                {{ __('labels.budget') }} </h5>
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
                    {{ __('labels.budget') }}
                </li>
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Details-->
        @if(isset($project))
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Button-->
            @if(Auth::user())
            <a href="{{ url('project-budget/'.$project->id.'/create') }}"
                class="btn btn-primary font-weight-bolder"><span class="svg-icon svg-icon-md">
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
                </span>{{ __('labels.create') }} {{ __('labels.budget') }}
            </a>
            @else
            <a href="javascript:history.back()" class="btn btn-default font-weight-bold">{{ __('labels.back') }} </a>
            @endif
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
        @foreach ($budgets as $budget)
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <!--begin::Info-->
                    <div class="d-flex flex-column mr-auto">
                        <!--begin: Title-->
                        <a href="#"
                            class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $budget->name }}</a>
                        <!--end::Title-->
                    </div>
                    <!--end::Info-->
                    @if(Auth::check())
                    <!--begin::Toolbar-->
                    <div class="card-toolbar mb-auto">
                        <div class="dropdown dropdown-inline">
                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ki ki-bold-more-hor"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover">
                                    <li class="navi-item">
                                        <a href="{{ url('project-budget/'.$budget->id.'/edit') }}" class="navi-link">
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
                                        <a href="#" data-id="{{ $budget->id }}" class="button navi-link">
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
                    <!--end::Toolbar-->
                    @endif
                </div>
                <!--end::Info-->
                <!--begin::Description-->
                <div class="mb-5 mt-3 font-weight-bold">{{ $budget->description }}</div>
                <!--end::Description-->

                <div class="d-flex align-items-center flex-wrap mt-14">
                    <div class="mr-12 d-flex flex-column mb-7">
                        <span class="d-block font-weight-bold mb-4">{{ __('labels.start_date') }}</span>
                        <span
                            class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($budget->start_date)->translatedFormat('l, d M Y') }}</span>
                    </div>
                    <div class="mr-12 d-flex flex-column mb-7">
                        <span class="d-block font-weight-bold mb-4">{{ __('labels.due_date') }}</span>
                        <span
                            class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($budget->end_date)->translatedFormat('l, d M Y') }}</span>
                    </div>
                </div>

                <div class="d-flex flex-wrap">
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                        <span class="mr-4">
                            <i class="flaticon-price-tag icon-2x"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">{{ __('labels.budget') }}</span>
                            <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold">Rp
                                </span>{{ number_format($budget->amount) }}</span>
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                        <span class="mr-4">
                            <i class="flaticon2-calendar-9 icon-2x"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">{{ __('labels.duration') }}</span>
                            <span class="font-weight-bolder font-size-h5">
                                {{ number_format($budget->duration) }}
                                <span class="text-dark-50 font-weight-bold"> {{ __('labels.days') }}</span>
                            </span>
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                        <span class="mr-4">
                            <i class="fas fa-money-bill-wave icon-2x"></i>
                        </span>
                        <div class="d-flex flex-column flex-lg-fill">
                            <a href="{{ url('budget-source/'.$budget->id) }}"
                                class="text-dark-75 font-weight-bolder font-size-sm">{{ $budget->source->count() }}
                                {{ __('labels.source') }}
                            </a>
                            @if(Auth::check())
                            <a href="{{ url('budget-source/'.$budget->id) }}"
                                class="text-primary font-weight-bolder">{{ __('labels.create') }}
                                {{ __('labels.source') }}</a>
                            @endif
                        </div>
                    </div>
                    <!--end: Item-->
                </div>
            </div>
            <!--end::Body-->
        </div>
        <!--end:: Card-->
        @endforeach
        @include('metronic.shared.pagination', ['data' => $budgets])
    </div>
    <!--end::Container-->
</div>
@endsection