@extends('layouts.metronic')
@section('style')
<link href="/metronic/assets/css/pages/wizard/wizard-3.css" rel="stylesheet" type="text/css" />
@endsection
@section('script')
<script src="/metronic/assets/js/pages/custom/wizard/wizard-3.js"></script>
<script src="/metronic/assets/js/pages/crud/forms/widgets/select2.js"></script>
<script>
    var COST_URL = "{{ url('/get-entity') }}";
</script>
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
            $('#sector').select2({
                placeholder: "Choose a sector"
            });
            $('#subsector').select2({
                placeholder: "Choose a subsector"
            });
            $('#purpose').select2({
                placeholder: "Choose a purpose"
            });
            $('#status').select2({
                placeholder: "Choose a status"
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
            init: function () {
                demo3();
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

        $('#sector').change(function () {
            var sector_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{url('/get-subsector')}}/" + sector_id,
                success: function (data) {
                    $('#subsector option:gt(0)').remove();
                    $.each(data, function () {
                        $("#subsector").append('<option value="' + this.id + '">' + this.subsector_name + '</option>')
                    });
                }
            });
        });
    });
</script>
@endsection
@section('content')
@php
$purposes = App\Purpose::all();
$sectors = App\Sector::all();
$organizations = App\Organization::all();
$statuses = App\Status::all();
if(isset($project)){
$units = App\OrganizationUnit::where('entity_id', $project->official->unit->org->id)->get();
$officials = App\Official::where('entity_unit_id', $project->official->unit->id)->get();
$subsectors = App\Subsector::where('sector_id', $project->subsector->sector->id)->get();
}
@endphp
<div class="subheader py-2 py-lg-4  subheader-transparent " id="kt_subheader">
    <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                {{ isset($project) ? 'Edit' : 'Add' }} Project </h5>
            <!--end::Title-->
            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->
            <!--begin::Search Form-->
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                    {{ isset($project) ? 'Edit project details and save changes' : 'Enter project details and submit' }}
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
                                        <span>1.</span>Project Description</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step 1 Nav-->
                            <!--begin::Wizard Step 2 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        <span>2.</span>Management</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step 2 Nav-->
                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        <span>3.</span>Location</h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step 3 Nav-->
                            <!--begin::Wizard Step 4 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        <span>4.</span>Date and Status</h3>
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
                            <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="post"
                                action="{{ isset($project) ? route('project.update', $project) : route('project.store') }}">
                                @csrf
                                @if(isset($project))
                                @method('patch')
                                @endif
                                <!--begin: Wizard Step 1-->
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">

                                    <h4 class="mb-10 font-weight-bold text-dark">Enter the Details of your Project
                                    </h4>
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <label for="name">Project Code </label>
                                        <input type="text" class="form-control" name="project_code"
                                            value="{{ $project->project_code ?? ''}}" required />
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <label for="name">Project Name</label>
                                        <input type="text" class="form-control" name="project_title"
                                            value="{{$project->project_title ?? ''}}" required />
                                    </div>
                                    <!--end::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <label for="name">Project Description</label>
                                        <textarea name="project_description" id="project_description" rows="3"
                                            class="form-control">{{$project->project_description ?? ''}}</textarea>
                                    </div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>Purpose</label>
                                        <select class="form-control" name="purpose_id" id="purpose" style="width: 100%;"
                                            required>
                                            <option value="">Choose purposes</option>
                                            @foreach ($purposes as $purpose)
                                            <option value="{{$purpose->id}}" @if(isset($project)) @if($project->
                                                purpose_id
                                                == $purpose->id)
                                                selected @endif @endif>{{$purpose->purpose_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label for="name">Budget</label>
                                        <input type="text" class="form-control" name="budget" id="budget"
                                            value="{{ number_format($project->budget ?? '0') }}" required>
                                    </div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label for="name">SEFIN code</label>
                                        <input type="text" class="form-control" name="code_sefin"
                                            value="{{$project->code_sefin ?? ''}}" id="code_sefin">
                                    </div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label for="name">Environment impact description</label>
                                        <textarea name="environment_desc" id="environment_desc" class="form-control"
                                            rows="3">{{$project->environment_desc ?? ''}}</textarea>
                                    </div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label for="name">Settlement description</label>
                                        <textarea name="settlement_desc" id="settlement_desc" class="form-control"
                                            rows="3">{{$project->settlement_desc ?? ''}}</textarea>
                                    </div>
                                </div>
                                <!--end: Wizard Step 1-->
                                <!--begin: Wizard Step 2-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <div class="form-group">
                                            <label for="name">Role</label>
                                            <div class="typeahead">
                                                <input class="form-control" value="{{$project->role->role_name ?? ''}}"
                                                    id="role_id" name="role_id" type="text" dir="ltr"
                                                    style="width: 100%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>Organization/Entity</label>
                                        <select class="form-control" name="" id="entity" style="width: 100%;">
                                            <option value="0">Choose an organization/entity</option>
                                            @foreach ($organizations as $org)
                                            <option value="{{$org->id}}" @if(isset($project)) @if($org->id ==
                                                $project->official->unit->org->id) selected @endif
                                                @endif>{{$org->name}}
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
                                            @if(isset($project))
                                            @foreach ($units as $unit)
                                            <option value="{{$unit->id}}" @if($unit->id ==
                                                $project->official->unit->id)
                                                selected @endif>{{$unit->unit_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <!--end::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <label for="name">Official</label>
                                        <select class="form-control" name="official_id" id="official"
                                            style="width: 100%;">
                                            @if(isset($project))
                                            @foreach ($officials as $official)
                                            <option value="{{$official->id}}" @if($official->id ==
                                                $project->official_id)
                                                selected @endif>{{$official->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label for="name">Sector</label>
                                                <select class="form-control" name="" id="sector" style="width: 100%;">
                                                    <option value="">Choose sector</option>
                                                    @foreach ($sectors as $sector)
                                                    <option value="{{$sector->id}}" @if(isset($project)) @if($sector->id
                                                        ==
                                                        $project->subsector->sector->id) selected @endif
                                                        @endif>{{$sector->sector_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label for="name">Sub sector</label>
                                                <select class="form-control" name="subsector_id" id="subsector"
                                                    style="width: 100%;">
                                                    @if(isset($project))
                                                    @foreach ($subsectors as $subsector)
                                                    <option value="{{$subsector->id}}" @if($subsector->id ==
                                                        $project->subsector_id) selected
                                                        @endif>{{$subsector->subsector_name}}</option>
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
                                    <h4 class="mb-10 font-weight-bold text-dark">Select Initial Locatioan and End
                                        Location
                                    </h4>
                                    <!--begin::Select-->
                                    <div class="form-group fv-plugins-icon-container">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <input id="map_search" type="text" class="form-control"
                                                        name="map_search" />
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
                                                <label for="name">Initial Lat</label>
                                                <input type="text" class="form-control" name="initial_lat"
                                                    id="initial_lat"
                                                    value="{{$project->initial_lat ?? -8.683070211544514}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Inital Lon</label>
                                                <input type="text" class="form-control" name="initial_lon"
                                                    id="initial_lon"
                                                    value="{{$project->initial_lon ?? 116.13077257514645}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Final Lat</label>
                                                <input type="text" class="form-control" name="final_lat" id="final_lat"
                                                    value="{{$project->final_lat ?? -8.679305276105104}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Final Lon</label>
                                                <input type="text" class="form-control" name="final_lon" id="final_lon"
                                                    value="{{$project->final_lon ?? 116.13759645742493}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Wizard Step 3-->
                                <!--begin: Wizard Step 4-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="my-5">
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label for="name">Start Date</label>
                                            <input type="date" class="form-control" name="start_date" id="start_date"
                                                value="{{ date_format(Carbon\Carbon::parse($project->start_date ?? date('Y-m-d')), 'Y-m-d') }}">
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label for="name">End Date</label>
                                            <input type="date" class="form-control" name="end_date" id="end_date"
                                                value="{{ date_format(Carbon\Carbon::parse($project->end_date ?? date('Y-m-d')), 'Y-m-d') }}">
                                        </div>
                                        <!--end::Input-->
                                        <div class="form-group">
                                            <label for="name">Approved Date</label>
                                            <input type="date" class="form-control" name="date_of_approved"
                                                id="date_of_approved"
                                                value="{{ date_format(Carbon\Carbon::parse($project->date_of_approved ?? date('Y-m-d')), 'Y-m-d') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Publication Date</label>
                                            <input type="date" class="form-control" name="date_of_publication"
                                                id="date_of_publication"
                                                value="{{ date_format(Carbon\Carbon::parse($project->date_of_publication ?? date('Y-m-d')), 'Y-m-d') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status_id" id="status"
                                                style="width: 100%;">
                                                <option value="">Choose status</option>
                                                @foreach ($statuses as $status)
                                                <option value="{{$status->id}}" @if(isset($project)) @if($status->id
                                                    ==
                                                    $project->status_id)
                                                    selected @endif @endif>{{$status->status_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Wizard Step 4-->
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
</div>
@endsection