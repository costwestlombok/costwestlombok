@extends('layouts.metronic')
@section('style')
    <link href="/metronic/assets/css/pages/wizard/wizard-3.css" rel="stylesheet" type="text/css" />
    <style>
        select[name='project_status_id'] {
            width: 100% !important;
            height: calc(1.5em + 1.3rem + 2px) !important;
        }
    </style>
@endsection
@section('content')
    @php
        $purposes = \App\Models\Purpose::all();
        $sectors = \App\Models\Sector::all();
        $organizations = \App\Models\Organization::all();
        $statuses = \App\Models\Status::all();
        if (isset($project)) {
            $units = \App\Models\OrganizationUnit::where('entity_id', $project->official->unit->org->id ?? null)->get();
            $officials = \App\Models\Official::where('entity_unit_id', $project->official->unit->id ?? null)->get();
            $subsectors = \App\Models\Subsector::where('sector_id', $project->subsector->sector->id ?? null)->get();
        }
    @endphp
    <div class="subheader py-2 py-lg-4  subheader-transparent " id="kt_subheader">
        <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    {{ isset($project) ? __('labels.edit') : __('labels.create') }} {{ __('labels.project') }} </h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                        {{ isset($project) ? __('labels.project_edit_sub') : __('labels.project_add_sub') }}
                    </span>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Details-->
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
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
                                            <span>1.</span>{{ __('labels.project_description') }}
                                        </h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 1 Nav-->
                                <!--begin::Wizard Step 2 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            <span>2.</span>{{ __('labels.management') }}
                                        </h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 2 Nav-->
                                <!--begin::Wizard Step 3 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            <span>3.</span>{{ __('labels.location') }}
                                        </h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 3 Nav-->
                                <!--begin::Wizard Step 4 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            <span>4.</span>{{ __('labels.date_and_status') }}
                                        </h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 4 Nav-->
                            </div>
                        </div>
                        <!--end: Wizard Nav-->
                        <!--begin: Wizard Body-->
                        <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                            <div class="col-xl-12 col-xxl-7">
                                <!--begin: Wizard Form-->
                                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="post" action="{{ isset($project) ? route('project.update', $project) : route('project.store') }}">
                                    @csrf
                                    @if (isset($project))
                                        @method('patch')
                                    @endif
                                    <!--begin: Wizard Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h4 class="mb-10 font-weight-bold text-dark">
                                            {{ __('labels.project_description_sub') }}</h4>
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label for="name">{{ __('labels.project_code') }}</label>
                                            <input type="text" class="form-control" name="project_code" value="{{ $project->project_code ?? '' }}" required />
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label for="name">{{ __('labels.project_name') }}</label>
                                            <input type="text" class="form-control" name="project_title" value="{{ $project->project_title ?? '' }}" required />
                                        </div>
                                        <!--end::Input-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label for="name">{{ __('labels.project_description') }}</label>
                                            <textarea name="project_description" id="project_description" rows="3" class="form-control">{{ $project->project_description ?? '' }}</textarea>
                                        </div>
                                        <div class="form-group fv-plugins-icon-container">
                                            <label>{{ __('labels.purpose') }}</label>
                                            <select class="form-control" name="purpose_id" id="purpose" style="width: 100%;">
                                                <option value="">{{ __('labels.choose_purpose') }}</option>
                                                @foreach ($purposes as $purpose)
                                                    <option value="{{ $purpose->id }}" @if (isset($project)) @if ($project->purpose_id == $purpose->id)
                                                        selected @endif @endif>{{ $purpose->purpose_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group fv-plugins-icon-container">
                                            <label for="name">{{ __('labels.budget') }}</label>
                                            <input type="number" class="form-control" name="budget" id="budget" value="{{ $project->budget ?? '0' }}" required>
                                        </div>
                                        <div class="form-group fv-plugins-icon-container">
                                            <label for="name">{{ __('labels.environment_impact_description') }}</label>
                                            <textarea name="environment_desc" id="environment_desc" class="form-control" rows="3">{{ $project->environment_desc ?? '' }}</textarea>
                                        </div>
                                        <div class="form-group fv-plugins-icon-container">
                                            <label for="name">{{ __('labels.settlement_description') }}</label>
                                            <textarea name="settlement_desc" id="settlement_desc" class="form-control" rows="3">{{ $project->settlement_desc ?? '' }}</textarea>
                                        </div>
                                        <div class="form-group fv-plugins-icon-container">
                                            <label for="name">{{ __('labels.project_scope') }}</label>
                                            <textarea name="project_scope" id="project_scope" class="form-control" rows="3">{{ $project->project_scope ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 1-->
                                    <!--begin: Wizard Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">{{ __('labels.management_sub') }}</h4>
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container d-none">
                                            <div class="form-group">
                                                <label for="name">{{ __('labels.role') }}</label>
                                                <div class="typeahead">
                                                    <input class="form-control" value="{{ $project->role->role_name ?? '' }}" id="role_id" name="role_id" type="text" dir="ltr" style="width: 100%">
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label>{{ __('labels.organization') }}</label>
                                            <select class="form-control" name="" id="entity" style="width: 100%;">
                                                <option value="">{{ __('labels.choose_organization') }}</option>
                                                @foreach ($organizations as $org)
                                                    <option value="{{ $org->id }}" @if (isset($project)) @if ($org->id == ($project->official->unit->org->id ?? null)) selected @endif @endif>{{ $org->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label for="name">{{ __('labels.organization_unit') }}</label>
                                            <select class="form-control" name="" id="unit" style="width: 100%;">
                                                <option value="">{{ __('labels.choose_organization_unit') }}</option>
                                                @if (isset($project))
                                                    @foreach ($units as $unit)
                                                        <option value="{{ $unit->id }}" @if ($unit->id == $project->official->unit->id) selected @endif>{{ $unit->unit_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <!--end::Input-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label for="name">{{ __('labels.official') }}</label>
                                            <select class="form-control" name="official_id" id="official" style="width: 100%;">
                                                @if (isset($project))
                                                    @foreach ($officials as $official)
                                                        <option value="{{ $official->id }}" @if ($official->id == $project->official_id) selected @endif>{{ $official->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label for="name">{{ __('labels.sector') }}</label>
                                                    <select class="form-control" name="" id="sector" style="width: 100%;">
                                                        <option value="">{{ __('labels.choose_sector') }}</option>
                                                        @foreach ($sectors as $sector)
                                                            <option value="{{ $sector->id }}" @if (isset($project)) @if ($sector->id == ($project->subsector->sector->id ?? null)) selected @endif @endif>{{ $sector->sector_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label for="name">{{ __('labels.subsector') }}</label>
                                                    <select class="form-control" name="subsector_id" id="subsector" style="width: 100%;">
                                                        @if (isset($project))
                                                            @foreach ($subsectors as $subsector)
                                                                <option value="{{ $subsector->id }}" @if ($subsector->id == $project->subsector_id) selected @endif>{{ $subsector->subsector_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 2-->
                                    <!--begin: Wizard Step 3-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">{{ __('labels.location_sub') }}</h4>
                                        <div class="form-group fv-plugins-icon-container">
                                            <label for="name">{{ __('labels.project_location') }}</label>
                                            <textarea name="project_location" id="project_location" class="form-control" rows="3">{{ $project->project_location ?? '' }}</textarea>
                                        </div>
                                        <hr>
                                        <!--begin::Select-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <input id="map_search" type="text" class="form-control" name="map_search" />
                                                    </div>
                                                    <!--end::Input-->
                                                    {!! $map['js'] !!}
                                                    {!! $map['html'] !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Select-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">{{ __('labels.initial_latitude') }}</label>
                                                    <input type="text" class="form-control" name="initial_lat" id="initial_lat" value="{{ $project->initial_lat ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">{{ __('labels.initial_longitude') }}</label>
                                                    <input type="text" class="form-control" name="initial_lon" id="initial_lon" value="{{ $project->initial_lon ?? '' }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">{{ __('labels.final_latitude') }}</label>
                                                    <input type="text" class="form-control" name="final_lat" id="final_lat" value="{{ $project->final_lat ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">{{ __('labels.final_longitude') }}</label>
                                                    <input type="text" class="form-control" name="final_lon" id="final_lon" value="{{ $project->final_lon ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 3-->
                                    <!--begin: Wizard Step 4-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">{{ __('labels.date_and_status') }}</h4>
                                        <div class="my-5">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label for="name">{{ __('labels.start_date') }}</label>
                                                <input type="date" class="form-control" name="start_date" id="start_date" value="{{ isset($project) ? ($project->start_date ? $project->start_date->format('Y-m-d') : '') : '' }}">
                                            </div>
                                            <!--end::Input-->
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label for="name">{{ __('labels.end_date') }}</label>
                                                <input type="date" class="form-control" name="end_date" id="end_date" value="{{ isset($project) ? ($project->end_date ? $project->end_date->format('Y-m-d') : '') : '' }}">
                                            </div>
                                            <!--end::Input-->
                                            <div class="form-group">
                                                <label for="name">{{ __('labels.approved_date') }}</label>
                                                <input type="date" class="form-control" name="date_of_approved" id="date_of_approved" value="{{ isset($project) ? ($project->date_of_approved ? $project->date_of_approved->format('Y-m-d') : '') : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">{{ __('labels.publication_date') }}</label>
                                                <input type="date" class="form-control" name="date_of_publication" id="date_of_publication" value="{{ isset($project) ? ($project->date_of_publication ? $project->date_of_publication->format('Y-m-d') : '') : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('labels.status') }}</label>
                                                <select class="form-control" name="project_status_id" id="status" style="width: 100%;" required>
                                                    <option value="">{{ __('labels.choose_status') }}</option>
                                                    @foreach (\App\Models\ProjectStatus::all() as $status)
                                                        <option value="{{ $status->id }}" @if (isset($project)) @if ($status->id == $project->project_status_id)
                                                            selected @endif @endif>{{ __('labels.' . $status->code) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 4-->
                                    <!--begin: Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">{{ __('labels.previous') }}</button>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">{{ isset($project) ? __('labels.save_changes') : __('labels.save') }}</button>
                                            <button type="button" class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">{{ __('labels.next') }}</button>
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
    </div>
@endsection
@section('script')
    <script>
        "use strict";

        // Class definition
        var KTWizard3 = function() {
            // Base elements
            var _wizardEl;
            var _formEl;
            var _wizard;
            var _validations = [];

            // Private functions
            var initWizard = function() {
                // Initialize form wizard
                _wizard = new KTWizard(_wizardEl, {
                    startStep: 1, // initial active step number
                    clickableSteps: true // allow step clicking
                });

                // Validation before going to next page
                _wizard.on('beforeNext', function(wizard) {
                    // Don't go to the next step yet
                    _wizard.stop();

                    // Validate form
                    var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
                    validator.validate().then(function(status) {
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
                            }).then(function() {
                                KTUtil.scrollTop();
                            });
                        }
                    });
                });

                // Change event
                _wizard.on('change', function(wizard) {
                    KTUtil.scrollTop();
                });
            }

            var initValidation = function() {
                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                // Step 1
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            project_code: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('labels.project_code') }} {{ __('labels.is_required') }}"
                                    }
                                }
                            },
                            project_title: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('labels.project_title') }} {{ __('labels.is_required') }}"
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

                // Step 2
                _validations.push(FormValidation.formValidation(
                    _formEl, {}
                ));

                // Step 3
                _validations.push(FormValidation.formValidation(
                    _formEl, {}
                ));

                // Step 4
                _validations.push(FormValidation.formValidation(
                    _formEl, {
                        fields: {
                            status_id: {
                                validators: {
                                    notEmpty: {
                                        message: "{{ __('labels.status') }} {{ __('labels.is_required') }}"
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
                init: function() {
                    _wizardEl = KTUtil.getById('kt_wizard_v3');
                    _formEl = KTUtil.getById('kt_form');

                    initWizard();
                    initValidation();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTWizard3.init();
        });
    </script>
    <script src="/metronic/assets/js/pages/crud/forms/widgets/select2.js"></script>
    <script>
        var COST_URL = "{{ url('/get-entity') }}";
    </script>
    <script>
        var selectPurpose;
        var purpose_name = '';

        var KTSelect2 = function() {
            // Private functions
            var demos = function() {
                // basic
                $('#entity').select2({
                    placeholder: "{{ __('labels.choose_organization') }}"
                });
                $('#unit').select2({
                    placeholder: "{{ __('labels.choose_organization_unit') }}"
                });
                $('#official').select2({
                    placeholder: "{{ __('labels.choose_official') }}"
                });
                $('#sector').select2({
                    placeholder: "{{ __('labels.choose_sector') }}"
                });
                $('#subsector').select2({
                    placeholder: "{{ __('labels.choose_subsector') }}"
                });
                selectPurpose = $('#purpose').select2({
                    placeholder: "{{ __('labels.choose_purpose') }}",
                    language: {
                        noResults: function(params) {
                            return "<button onclick='openModal()' class='btn btn-link btn-sm'><i class='fa fa-plus'></i> {{ __('labels.add_purpose') }}</button>";
                        }
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    }
                });


                $('#status').select2({
                    placeholder: "{{ __('labels.choose_status') }}"
                });
            }
            return {
                init: function() {
                    demos();
                }
            };
        }();
        var KTTypeahead = function() {
            var demo3 = function() {
                var role = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    // url points to a json file that contains an array of country names, see
                    // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                    // prefetch: COST_URL
                    prefetch: "{{ url('/get-role') }}"
                });

                // passing in `null` for the `options` arguments will result in the default
                // options being used
                $('#role_id').typeahead(null, {
                    name: 'role_id',
                    source: role
                });
            }
            return {
                // public functions
                init: function() {
                    demo3();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTTypeahead.init();
            KTSelect2.init();
            $('#entity').change(function() {
                var entity_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('/get-unit') }}/" + entity_id,
                    success: function(data) {
                        $('#unit option:gt(0)').remove();
                        $.each(data, function() {
                            $("#unit").append('<option value="' + this.id + '">' + this.unit_name + '</option>')
                        });
                    }
                });
            });

            $('#unit').change(function() {
                var unit_id = $(this).val();
                console.log("tes");
                $.ajax({
                    type: "GET",
                    url: "{{ url('/get-official') }}/" + unit_id,
                    success: function(data) {
                        $('#official option:gt(0)').remove();
                        $.each(data, function() {
                            $("#official").append('<option value="' + this.id + '">' + this.name + '</option>')
                        });
                    }
                });
            });

            $('#sector').change(function() {
                var sector_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('/get-subsector') }}/" + sector_id,
                    success: function(data) {
                        $('#subsector option:gt(0)').remove();
                        $.each(data, function() {
                            $("#subsector").append('<option value="' + this.id + '">' + this.subsector_name + '</option>')
                        });
                    }
                });
            });
        });

        function openModal() {
            purpose_name = $('.select2-search__field').val();
            $('select[name=purpose_id]').select2('close')
            $("#modalPurpose").modal('toggle');
            $("#input-purpose").val(purpose_name)
        }

        $(function() {
            $("#form-purpose").submit(function(e) {
                e.preventDefault()
                let data = $(this).serialize();
                let url = $(this).attr('action')
                $.ajax({
                    data: data,
                    url: url,
                    type: 'post',
                    success: function(res) {
                        var option = new Option(res.purpose_name, res.id, true, true);
                        selectPurpose.append(option).trigger('change');
                        // manually trigger the `select2:select` event
                        selectPurpose.trigger({
                            type: 'select2:select',
                            params: {
                                data: data
                            }
                        });
                        openModal();
                    },
                    error: function(err) {
                        console.log("Error simpan barang : ", err)
                    }
                })
            })
        })
    </script>

    <div class="modal fade" id="modalPurpose" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('labels.add_purpose') }}</h5>
                </div>
                <form id="form-purpose" action="{{ route('catalog.purpose.api-web.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-10 form-group">
                            <label class="required form-label" for="">{{ __('labels.purpose') }}</label>
                            <input type="text" id="input-purpose" class="form-control" name="purpose_name" placeholder="{{ __('labels.purpose') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="openModal()">{{ __('labels.cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('labels.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
