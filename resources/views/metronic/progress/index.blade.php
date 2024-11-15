@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
    <script>
        $(document).on('click', '.button', function(e) {
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
                    window.location.href = "/project-progress/" + id + "/delete";
                }
            });
        });
    </script>
@endsection
@section('content')
    {{-- Project Sub Header --}}
    <div class="subheader py-2 py-lg-4 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    {{ __('labels.progress') }} </h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0 mr-5">
                    <li class="breadcrumb-item">
                        <a href="{{ url('dashboard') }}" class="text-muted">{{ __('labels.dashboard') }}</a>
                    </li>
                    @if (isset($project))
                        <li class="breadcrumb-item">
                            <a href="{{ route('project.show', $project) }}" class="text-muted">{{ __('labels.project') }}</a>
                        </li>
                    @endif
                    <li class="breadcrumb-item">
                        {{ __('labels.progress') }}
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Details-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="/metronic/demo5/.html" class=""></a>
                <!--end::Button-->
                <!--begin::Button-->
                <a href="{{ url('project-progress/' . $project->id . '/create') }}" class="btn btn-primary font-weight-bolder"><span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>{{ __('labels.create') }} {{ __('labels.progress') }}</a>
                <!--end::Button-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    {{-- End Project Sub Header --}}
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            @foreach ($advances as $item)
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Info-->
                            <div class="d-flex flex-column mr-auto">
                                <!--begin: Title-->
                                <a href="#" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">{{ __('labels.progress_date') }}:
                                    {{ Carbon\Carbon::parse($item->date_of_advance)->translatedFormat('l, d M Y') }}</a>
                                <span class="label label-lg label-light-success label-inline font-weight-bold py-4 w-25 text-truncate">{{ $item->status->status_name ?? '-' }}</span>
                                <!--end::Title-->
                            </div>
                            <!--end::Info-->
                            @if (Auth::check())
                                <!--begin::Toolbar-->
                                <div class="card-toolbar mb-auto">
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-item">
                                                    <a href="{{ url('progress/' . $item->id . '/edit') }}" class="navi-link">
                                                        <span class="svg-icon menu-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path
                                                                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                                                                        fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <span class="navi-text ml-2"> {{ __('labels.edit') }}</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" data-id="{{ $item->id }}" class="button navi-link">
                                                        <span class="svg-icon menu-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
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

                        <!--end::Section-->
                        <div class="row mt-5 mb-5">
                            <div class="col-md-6">
                                <div class="d-flex flex-column align-items-cente py-2">
                                    <!--begin::Title-->
                                    <p class="text-dark-75 font-weight-bold font-size-lg mb-1">
                                        {{ __('labels.theme_issues_description') }}
                                    </p>
                                    <!--end::Title-->
                                    <!--begin::Data-->
                                    <span class="text-muted font-weight-bold">{{ $item->description_issues ?? '-' }}</span>
                                    <!--end::Data-->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-column align-items-cente py-2">
                                    <!--begin::Title-->
                                    <p class="text-dark-75 font-weight-bold font-size-lg mb-1">
                                        {{ __('labels.problem_description') }}</p>
                                    <!--end::Title-->
                                    <!--begin::Data-->
                                    <span class="text-muted font-weight-bold">{{ $item->description_problems ?? '-' }}</span>
                                    <!--end::Data-->
                                </div>
                            </div>
                        </div>
                        <div class="row mr-1 ml-1">
                            <!--begin::Content-->
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                <div class="mr-12 d-flex flex-column mb-7 w-25">
                                    <span class="d-block font-weight-bold mb-4">{{ __('labels.scheduled_finance') }}</span>
                                    <span class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text w-25">{{ number_format($item->scheduled_financing) }}</span>
                                </div>
                                <!--begin::Progress-->
                                <div class="flex-row-fluid mb-7">
                                    <span class="d-block font-weight-bold mb-4">{{ __('labels.physical_program') }} (%) </span>
                                    <div class="d-flex align-items-center pt-2">
                                        <div class="progress progress-xs mt-2 mb-2 w-100">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ number_format($item->programmed_percent) }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="ml-3 font-weight-bolder">{{ number_format($item->programmed_percent) }}%</span>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <div class="row mr-1 ml-1">
                            <!--begin::Content-->
                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                <div class="mr-12 d-flex flex-column mb-7 w-25">
                                    <span class="d-block font-weight-bold mb-4">{{ __('labels.real_finance') }}</span>
                                    <span class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text w-25">{{ number_format($item->real_financing) }}</span>
                                </div>
                                <!--begin::Progress-->
                                <div class="flex-row-fluid mb-7">
                                    <span class="d-block font-weight-bold mb-4">{{ __('labels.real_physical') }} </span>
                                    <div class="d-flex align-items-center pt-2">
                                        <div class="progress progress-xs mt-2 mb-2 w-100">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ number_format($item->real_percent) }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="ml-3 font-weight-bolder">{{ number_format($item->real_percent) }}%</span>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-5 ml-1">
                            <span class="mr-4">
                                <i class="icon-2x flaticon2-image-file"></i>
                            </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">{{ $item->image->count() }}
                                    {{ __('labels.image') }}</span>
                                <span class="font-weight-bolder font-size-h5">
                                    <a href="{{ url('advance-images/' . $item->id) }}" class="tect-primary">{{ __('labels.create') }}
                                        {{ __('labels.image') }}</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            @endforeach
            @include('metronic.shared.pagination', ['data' => $advances])
        </div>
        <!--end::Container-->
    </div>
@endsection
