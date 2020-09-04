@extends('layouts.metronic')
@section('style')
<link href="/metronic/assets/css/pages/wizard/wizard-3.css" rel="stylesheet" type="text/css" />
@endsection
@section('script')
<script src="/metronic/assets/js/pages/custom/wizard/wizard-3.js"></script>
<script src="/metronic/assets/js/pages/crud/forms/widgets/select2.js"></script>
<script>
    var KTSelect2 = function () {
        // Private functions
        var demos = function () {
            // basic
            $('#entity').select2({
                placeholder: "Choose an organization"
            });
            $('#unit').select2({
                placeholder: "Choose a unit"
            });
            $('#official').select2({
                placeholder: "Choose an official"
            });
        }
        return {
            init: function () {
                demos();
            }
        };
    }();
    var KTTypeahead = function () {
        var demo3 = function () {
            var contract_type = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // url points to a json file that contains an array of country names, see
                // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                // prefetch: COST_URL
                prefetch: "{{ url('/get-contract-type') }}"
            });

            // passing in `null` for the `options` arguments will result in the default
            // options being used
            
            $('#contract_type_id').typeahead(null, {
                name: 'contract_type_id',
                source: contract_type
            });
        }
        var demo1 = function () {
            var tender_method = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // url points to a json file that contains an array of country names, see
                // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                // prefetch: COST_URL
                prefetch: "{{ url('/get-tender-method') }}"
            });

            // passing in `null` for the `options` arguments will result in the default
            // options being used
            
            $('#tender_method_id').typeahead(null, {
                name: 'tender_method_id',
                source: tender_method
            });
        }
        var demo2 = function () {
            var tender_status = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // url points to a json file that contains an array of country names, see
                // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                // prefetch: COST_URL
                prefetch: "{{ url('/get-tender-status') }}"
            });

            // passing in `null` for the `options` arguments will result in the default
            // options being used
            
            $('#tender_status_id').typeahead(null, {
                name: 'tender_status_id',
                source: tender_status
            });
        }
        var demo4 = function () {
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
                demo3();
                demo4();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTTypeahead.init();
        KTSelect2.init();
        $('#entity').change(function () {
            var entity_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{url('/get-unit')}}/" + entity_id,
                success: function (data) {
                    $('#unit option:gt(0)').remove();
                    $.each(data, function () {
                        $("#unit").append('<option value="' + this.id + '">' + this.unit_name + '</option>')
                    });
                }
            });
        });

        $('#unit').change(function () {
            var unit_id = $(this).val();
            console.log("tes");
            $.ajax({
                type: "GET",
                url: "{{url('/get-official')}}/" + unit_id,
                success: function (data) {
                    $('#official option:gt(0)').remove();
                    $.each(data, function () {
                        $("#official").append('<option value="' + this.id + '">' + this.name + '</option>')
                    });
                }
            });
        });
    });
</script>
@endsection
@section('content')
@php
$organizations = App\Organization::all();
$statuses = App\Status::all();
$projects = App\Project::all();
$contract_types = App\ContractType::all();
$tender_methods = App\TenderMethod::all();
$tender_statuses = App\TenderStatus::all();
if(isset($tender)){
$units = App\OrganizationUnit::where('entity_id', $tender->official->unit->org->id)->get();
$officials = App\Official::where('entity_unit_id', $tender->official->unit->id)->get();
}
@endphp
<div class="subheader py-2 py-lg-4  subheader-transparent " id="kt_subheader">
    <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                {{ isset($tender) ? 'Edit' : 'Add' }} Tender </h5>
            <!--end::Title-->
            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Search Form-->
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                    {{ isset($tender) ? 'Edit tender details and save changes' : 'Enter tender details and submit' }}
                </span>
            </div>
            <!--end::Search Form-->
        </div>
        <!--end::Details-->
    </div>
</div>
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
                                    <span>1.</span>Tender Description</h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->
                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    <span>2.</span>Management and Date</h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 2 Nav-->
                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    <span>3.</span>File</h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 3 Nav-->
                    </div>
                </div>
                <!--end: Wizard Nav-->
                <!--begin: Wizard Body-->
                <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                    <div class="col-xl-12 col-xxl-7">
                        <!--begin: Wizard Form-->
                        <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="post"
                            action="{{ isset($tender) ? route('tender.update', $tender) : route('tender.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if(isset($tender))
                            @method('patch')
                            @endif
                            <input type="hidden" name="project_id" value="{{$project->id}}">
                            <!--begin: Wizard Step 1-->
                            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">

                                <h4 class="mb-10 font-weight-bold text-dark">Enter the Details of your tender</h4>
                                <!--begin::Input-->
                                <div class="form-group fv-plugins-icon-container">
                                    <label for="name">Prosess Number</label>
                                    <input type="text" class="form-control" name="process_number"
                                        value="{{$tender->process_number ?? ''}}" />
                                </div>
                                <!--end::Input-->
                                <!--begin::Input-->
                                <div class="form-group fv-plugins-icon-container">
                                    <label for="name">Process Name</label>
                                    <input type="text" class="form-control" name="project_process_name"
                                        value="{{$tender->project_process_name ?? ''}}" />
                                </div>
                                <!--end::Input-->
                                <div class="form-group fv-plugins-icon-container">
                                    <label for="name">Tender Amount</label>
                                    <input type="text" class="form-control" name="amount"
                                        value="{{ number_format($tender->amount ?? '0') }}" />
                                </div>
                                <div class="form-group fv-plugins-icon-container">
                                    <div class="form-group">
                                        <label for="name">Contract type</label>
                                        <div class="typeahead">
                                            <input class="form-control"
                                                value="{{$tender->contract_type->type_name ?? ''}}"
                                                id="contract_type_id" name="contract_type_id" type="text" dir="ltr"
                                                style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group fv-plugins-icon-container">
                                    <div class="form-group">
                                        <label for="name">Tender method</label>
                                        <div class="typeahead">
                                            <input class="form-control"
                                                value="{{$tender->tender_method->method_name ?? ''}}"
                                                id="tender_method_id" name="tender_method_id" type="text" dir="ltr"
                                                style="width: 100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tender Status</label>
                                    <div class="typeahead">
                                        <input class="form-control"
                                            value="{{$tender->tender_status->status_name ?? ''}}" id="tender_status_id"
                                            name="tender_status_id" type="text" dir="ltr" style="width: 100%">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="typeahead">
                                        <input class="form-control" value="{{$tender->status->status_name ?? ''}}"
                                            id="status_id" name="status_id" type="text" dir="ltr" style="width: 100%"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <!--end: Wizard Step 1-->
                            <!--begin: Wizard Step 2-->
                            <div class="pb-5" data-wizard-type="step-content">
                                <!--begin::Input-->
                                <div class="form-group fv-plugins-icon-container">
                                    <label>Organization/Entity</label>
                                    <select class="form-control" name="" id="entity" style="width: 100%;">
                                        <option value="0">Choose an organization/entity</option>
                                        @foreach ($organizations as $org)
                                        <option value="{{$org->id}}" @if(isset($tender)) @if($org->id ==
                                            $tender->official->unit->org->id) selected @endif @endif>{{$org->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--end::Input-->
                                <!--begin::Input-->
                                <div class="form-group fv-plugins-icon-container">
                                    <label for="name">Unit</label>
                                    <select class="form-control" name="" id="unit" style="width: 100%;">
                                        <option value="">Choose a unit</option>
                                        @if(isset($tender))
                                        @foreach ($units as $unit)
                                        <option value="{{$unit->id}}" @if($unit->id == $tender->official->unit->id)
                                            selected @endif>{{$unit->unit_name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <!--end::Input-->
                                <div class="form-group fv-plugins-icon-container">
                                    <label for="name">Official</label>
                                    <select class="form-control" name="official_id" id="official" style="width: 100%;">
                                        @if(isset($tender))
                                        @foreach ($officials as $official)
                                        <option value="{{$official->id}}" @if($official->id == $tender->official_id)
                                            selected @endif>{{$official->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="date" name="start_date" class="form-control"
                                        value="{{ date_format(Carbon\Carbon::parse($tender->start_date ?? date('Y-m-d')), 'Y-m-d') }}">
                                </div>
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="date" name="end_date" class="form-control"
                                        value="{{ date_format(Carbon\Carbon::parse($tender->end_date ?? date('Y-m-d')), 'Y-m-d') }}">
                                </div>
                                <div class="form-group">
                                    <label>Max Extended Date</label>
                                    <input type="date" name="max_extended_process" class="form-control"
                                        value="{{ date_format(Carbon\Carbon::parse($tender->max_extended_process ?? date('Y-m-d')), 'Y-m-d') }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Date of Publication</label>
                                    <input type="date" class="form-control" name="date_of_publication"
                                        id="date_of_publication"
                                        value="{{ date_format(Carbon\Carbon::parse($tender->date_of_publication ?? date('Y-m-d')), 'Y-m-d') }}">
                                </div>
                            </div>
                            <!--end: Wizard Step 2-->
                            <!--begin: Wizard Step 3-->
                            <div class="pb-5" data-wizard-type="step-content">
                                <div class="my-5">
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label for="name">File International Invitation</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="international_invitation"
                                                id="international_invitation">
                                            <label class="custom-file-label" for="international_invitation">
                                                {{ isset($tender) ? ($tender->international_invitation ? 'Upload file to change document' : 'Choose file') : 'Choose file'}}</label>
                                        </div>
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->

                                    <div class="form-group">
                                        <label for="name">File Basement</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="basement" id="basement">
                                            <label class="custom-file-label"
                                                for="basement">{{ isset($tender) ? ($tender->basement ? 'Upload file to change document' : 'Choose file') : 'Choose file'}}</label>
                                        </div>
                                    </div>
                                    <!--end::Input-->
                                    <div class="form-group">
                                        <label for="name">File Resolution</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="resolution"
                                                id="resolution">
                                            <label class="custom-file-label"
                                                for="resolution">{{ isset($tender) ? ($tender->resolution ? 'Upload file to change document' : 'Choose file') : 'Choose file'}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">File Convocation</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="convocation"
                                                id="convocation">
                                            <label class="custom-file-label"
                                                for="convocation">{{ isset($tender) ? ($tender->convocation ? 'Upload file to change document' : 'Choose file') : 'Choose file'}}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">File TDR</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="tdr" id="tdr">
                                            <label class="custom-file-label"
                                                for="tdr">{{ isset($tender) ? ($tender->tdr ? 'Upload file to change document' : 'Choose file') : 'Choose file'}}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">File Clarification</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="clarification"
                                                id="clarification">
                                            <label class="custom-file-label"
                                                for="clarification">{{ isset($tender) ? ($tender->clarification ? 'Upload file to change document' : 'Choose file') : 'Choose file'}}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">File Acceptance Certificate</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="acceptance_certificate"
                                                id="acceptance_certificate">
                                            <label class="custom-file-label"
                                                for="acceptance_certificate">{{ isset($tender) ? ($tender->acceptance_certificate ? 'Upload file to change document' : 'Choose file') : 'Choose file'}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end: Wizard Step 3-->
                            <!--begin: Wizard Actions-->
                            <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                <div class="mr-2">
                                    <button type="button"
                                        class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4"
                                        data-wizard-type="action-prev">Previous</button>
                                </div>
                                <div>
                                    <button type="submit"
                                        class="btn btn-success font-weight-bold text-uppercase px-9 py-4"
                                        data-wizard-type="action-submit">Submit</button>
                                    <button type="button"
                                        class="btn btn-primary font-weight-bold text-uppercase px-9 py-4"
                                        data-wizard-type="action-next">Next</button>
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