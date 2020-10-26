<!--begin::Card-->
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
                        <a href="javascript:void(0)"
                            class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $contract->contract_title }}
                        </a>
                        <!--end::Name-->
                        <!--begin::Contacts-->
                        <div class="my-2">
                            <a href="javascript:void(0)"
                                class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                {{ __('labels.contract_number') }} <strong>{{ $contract->number }}</strong></a>
                        </div>
                        <!--end::Contacts-->
                    </div>
                    <!--begin::User-->
                    @if(Auth::check())
                    <!--begin::Actions-->
                    <div class="card-toolbar mb-7">
                        <div class="dropdown dropdown-inline">
                            <a href="javascript:void(0)" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ki ki-bold-more-hor"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover">
                                    <li class="navi-item">
                                        <a href="{{ route('contract.edit', $contract) }}" class="navi-link">
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
                                        <a href="javascript:deleteFn('contract', '{{ $contract->id }}')"
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
                <!--end::Title-->
                <!--begin::Content-->
                <p class="mb-7 mt-3">{{ __('labels.contract_scope') }}
                    <strong>{{ $contract->contract_scope }}</strong></p>
                <div class="d-flex align-items-center flex-wrap mt-14">
                    <div class="mr-12 d-flex flex-column mb-7">
                        <span class="d-block font-weight-bold mb-4">{{ __('labels.start_date') }}</span>
                        <span
                            class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($contract->start_date)->translatedFormat('l, d M Y') }}</span>
                    </div>
                    <div class="mr-12 d-flex flex-column mb-7">
                        <span class="d-block font-weight-bold mb-4">{{ __('labels.due_date') }}</span>
                        <span
                            class="btn btn-light-danger btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($contract->end_date)->translatedFormat('l, d M Y') }}</span>
                    </div>
                    <div class="mr-12 d-flex flex-column mb-7 mr-12">
                        <span class="d-block font-weight-bold mb-4">{{ __('labels.extended_date') }}</span>
                        <span
                            class="btn btn-light-primary btn-sm font-weight-bold btn-upper btn-text">{{ Carbon\Carbon::parse($contract->max_extended_date)->translatedFormat('l, d M Y') }}</span>
                    </div>
                </div>

                <div class="d-flex align-items-center flex-wrap">
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                        <span class="mr-4">
                            <i class="flaticon2-tag icon-2x"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">{{ __('labels.price_local_currency') }}</span>
                            <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold">Rp
                                </span>{{ number_format($contract->price_local_currency) }}</span>
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                        <span class="mr-4">
                            <i class="flaticon-price-tag icon-2x"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">{{ __('labels.price_usd_currency') }}</span>
                            <span class="font-weight-bolder font-size-h5">
                                <span
                                    class="text-dark-50 font-weight-bold">$</span>{{ number_format($contract->price_usd_currency) }}</span>
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                        <span class="mr-4">
                            <i class="flaticon2-information icon-2x"></i>
                        </span>
                        <div class="d-flex flex-column flex-lg-fill">
                            <a href="{{ route('contract.ammendment.index', $contract) }}"
                                class="text-dark-75 font-weight-bolder font-size-sm">{{ $contract->ammendment->count() }}
                                {{ __('labels.ammendment') }}</a>
                            @if(Auth::check())
                            <a href="{{ route('contract.ammendment.index', $contract) }}"
                                class="text-primary font-weight-bolder">{{ __('labels.view_detail') }}</a>
                            @endif
                        </div>
                    </div>
                    <!--end: Item-->
                    <!--begin: Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 my-5">
                        <span class="mr-4">
                            <i class="flaticon2-rocket icon-2x"></i>
                        </span>
                        <div class="d-flex flex-column flex-lg-fill">
                            <span
                                class="text-dark-75 font-weight-bolder font-size-sm">{{ $contract->execution ? 1 : 0 }}
                                {{ __('labels.execution') }}</span>
                            @if($contract->execution)
                            <a href="{{ route('contract.execution.index', $contract) }}"
                                class="text-primary font-weight-bolder">{{ __('labels.view_detail') }}</a>
                            @else
                            @if(Auth::check())
                            <a href="{{ route('contract.execution.create', $contract) }}"
                                class="text-primary font-weight-bolder">{{ __('labels.create') }}
                                {{ __('labels.execution') }}</a>
                            @endif
                            @endif
                        </div>
                    </div>
                    <!--end: Item-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Top-->
    </div>
    <div class="card-footer d-flex align-items-center">
        @if($contract->completion)
        <a href="{{ route('contract.completion.index', $contract) }}"
            class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">{{ __('labels.view') }}
            {{ __('labels.completion') }}</a>
        @else
        <a href="{{ route('contract.completion.create', $contract) }}"
            class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">{{ __('labels.create') }}
            {{ __('labels.completion') }}</a>
        @endif
    </div>
</div>
<!--end::Card-->