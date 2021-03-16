@extends('layouts.metronic')
@section('style')
<link href="/metronic/assets/css/pages/wizard/wizard-3.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container">
    <div class="card card-custom">
        <div class="card-body p-0">
            <!--begin: Wizard-->
            <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="first" data-wizard-clickable="true">
                <!--begin: Wizard Nav-->
                <div class="wizard-nav">
                    <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    <span>1.</span>{{ __('labels.award_description') }}</h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->
                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    <span>2.</span>{{ __('labels.file_and_publication_date') }}</h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 2 Nav-->
                    </div>
                </div>
                <!--end: Wizard Nav-->
                <!--begin: Wizard Body-->
                <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                    <div class="col-xl-12 col-xxl-7">
                        <!--begin: Wizard Form-->
                        <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="post"
                            action="{{ isset($award) ? route('award.update', $award) : route('award.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if(isset($award))
                            @method('patch')
                            @endif
                            <input type="hidden" name="tender_id" value="{{ $tender->id }}">
                            <!--begin: Wizard Step 1-->
                            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">

                                <h4 class="mb-10 font-weight-bold text-dark">{{ __('labels.award_description_sub') }}
                                </h4>
                                <!--begin::Input-->
                                <div class="form-group fv-plugins-icon-container">
                                    <label for="name">{{ __('labels.process_number') }}</label>
                                    <input type="text" class="form-control" name="process_number"
                                        value="{{ $award->process_number ?? '' }}" required />
                                </div>
                                <!--end::Input-->
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label for="name">{{ __('labels.participant_number') }}</label>
                                    <input type="number" class="form-control" name="participants_number"
                                        value="{{ $award->participants_number ?? '' }}" required />
                                </div>
                                <!--end::Input-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('labels.cost_estimation') }}</label>
                                            <input type="text" class="form-control" name="contract_estimate_cost"
                                                value="{{ number_format($award->contract_estimate_cost ?? '0') }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('labels.cost') }}</label>
                                            <input type="text" class="form-control" name="cost"
                                                value="{{ number_format($award->cost ?? '0') }}" />
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="form-group fv-plugins-icon-container">
                                    <div class="form-group">
                                        <label for="name">{{ __('labels.contract_method') }}</label>
                                <div class="typeahead">
                                    <input class="form-control" value="{{ $award->contract_method->method_name ?? '' }}"
                                        id="contract_method_id" name="contract_method_id" type="text" dir="ltr"
                                        style="width: 100%">
                                </div>
                            </div>
                    </div> --}}

                    {{-- <div class="form-group">
                                    <label>Status</label>
                                    <div class="typeahead">
                                        <input class="form-control" value="{{ $award->status->status_name ?? '' }}"
                    id="status_id" name="status_id" type="text" dir="ltr" style="width: 100%">
                </div>
            </div> --}}
        </div>
        <!--end: Wizard Step 1-->
        <!--begin: Wizard Step 2-->
        <div class="pb-5" data-wizard-type="step-content">
            <div class="my-5">
                <!--begin::Input-->
                <div class="form-group">
                    <label for="name">{{ __('labels.file_opening_act') }}</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="opening_act" id="opening_act">
                        <label class="custom-file-label"
                            for="opening_act">{{ isset($award) ? ($award->opening_act ? __('labels.change_file_text') : __('labels.choose_file')) : __('labels.choose_file') }}</label>
                    </div>
                </div>
                <!--end::Input-->
                <!--begin::Input-->

                <div class="form-group">
                    <label for="name">{{ __('labels.file_recommendation_report_act') }}</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="recomendation_report_act"
                            id="recomendation_report_act">
                        <label class="custom-file-label"
                            for="recomendation_report_act">{{ isset($award) ? ($award->recomendation_report_act ? __('labels.change_file_text') : __('labels.choose_file')) : __('labels.choose_file') }}</label>
                    </div>
                </div>
                <!--end::Input-->
                <div class="form-group">
                    <label for="name">{{ __('labels.file_resolution') }}</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="award_resolution" id="award_resolution">
                        <label class="custom-file-label"
                            for="award_resolution">{{ isset($award) ? ($award->award_resolution ? __('labels.change_file_text') : __('labels.choose_file')) : __('labels.choose_file') }}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">{{ __('labels.file_other') }}</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="others" id="others">
                        <label class="custom-file-label"
                            for="others">{{ isset($award) ? ($award->others ? __('labels.change_file_text') : __('labels.choose_file')) : __('labels.choose_file') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">{{ __('labels.published_at') }}</label>
                    <input type="date" class="form-control" name="published_at" id="published_at"
                        value="{{ isset($award) ? ($award->published_at ? $tender->published_at->format('Y-m-d') : '') : '' }}">
                </div>
            </div>
        </div>
        <!--end: Wizard Step 2-->
        <!--begin: Wizard Actions-->
        <div class="d-flex justify-content-between border-top mt-5 pt-10">
            <div class="mr-2">
                <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4"
                    data-wizard-type="action-prev">{{ __('labels.previous') }}</button>
            </div>
            <div>
                <button type="submit" class="btn btn-success font-weight-bold text-uppercase px-9 py-4"
                    data-wizard-type="action-submit">{{ isset($tender) ? __('labels.save_changes') : __('labels.save') }}</button>
                <button type="button" class="btn btn-primary font-weight-bold text-uppercase px-9 py-4"
                    data-wizard-type="action-next">{{ __('labels.next') }}</button>
            </div>
        </div>
        <!--end: Wizard Actions-->
        </form>
        <!--end: Wizard Form-->
    </div>
</div>
<!--end: Wizard Body-->
</div>
<!--end: Wizard-->
</div>
</div>
</div>
@endsection
@section('script')
<script>
    "use strict";

    // Class definition
    var KTWizard3 = function () {
        // Base elements
        var _wizardEl;
        var _formEl;
        var _wizard;
        var _validations = [];

        // Private functions
        var initWizard = function () {
            // Initialize form wizard
            _wizard = new KTWizard(_wizardEl, {
                startStep: 1, // initial active step number
                clickableSteps: true  // allow step clicking
            });

            // Validation before going to next page
            _wizard.on('beforeNext', function (wizard) {
                // Don't go to the next step yet
                _wizard.stop();

                // Validate form
                var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        _wizard.goNext();
                        KTUtil.scrollTop();
                    } else {
                        Swal.fire({
                            text: "{{ __('labels.form_wizard_warning_text') }}",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "{{ __('labels.form_wizard_warning_confirm') }}",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light"
                            }
                        }).then(function () {
                            KTUtil.scrollTop();
                        });
                    }
                });
            });

            // Change event
            _wizard.on('change', function (wizard) {
                KTUtil.scrollTop();
            });
        }

        var initValidation = function () {
            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            // Step 1
            _validations.push(FormValidation.formValidation(
                _formEl,
                {
                    fields: {
                        process_number: {
                            validators: {
                                notEmpty: {
                                    message: "{{ __('labels.process_number') }} {{ __('labels.is_required') }}"
                                }
                            }
                        },
                        participants_number: {
                            validators: {
                                notEmpty: {
                                    message: "{{ __('labels.participant_number') }} {{ __('labels.is_required') }}"
                                }
                            }
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            ));
        }

        return {
            // public functions
            init: function () {
                _wizardEl = KTUtil.getById('kt_wizard_v3');
                _formEl = KTUtil.getById('kt_form');

                initWizard();
                initValidation();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTWizard3.init();
    });
</script>
<script>
    var KTTypeahead = function () {
        var demo1 = function () {
            var contract_method = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // url points to a json file that contains an array of country names, see
                // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                // prefetch: COST_URL
                prefetch: "{{ url('/get-contract-method') }}"
            });

            // passing in `null` for the `options` arguments will result in the default
            // options being used

            $('#contract_method_id').typeahead(null, {
                name: 'contract_method_id',
                source: contract_method
            });
        }
        var demo2 = function () {
            var status = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // url points to a json file that contains an array of country names, see
                // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                // prefetch: COST_URL
                prefetch: "{{ url('/get-status') }}"
            });

            // passing in `null` for the `options` arguments will result in the default
            // options being used

            $('#status_id').typeahead(null, {
                name: 'status_id',
                source: status
            });
        }
        return {
            // public functions
            init: function () {
                demo1();
                demo2();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTTypeahead.init();
    });
</script>
@endsection