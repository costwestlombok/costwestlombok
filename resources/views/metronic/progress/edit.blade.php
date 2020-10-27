@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
<script>
    var KTTypeahead = function () {
        var demo1 = function () {
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
            }
        };
    }();

    jQuery(document).ready(function () {
        KTTypeahead.init();
    });
</script>
@endsection
@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Form-->
            <form method="post"
                action="{{ isset($progress) ? url('progress/'.$progress->id) : url('/project-progress') }}"
                enctype="multipart/form-data">
                @csrf
                @if(isset($progress))
                @method('patch')
                @endif
                <input type="hidden" name="project_id" value="{{$project->id}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('labels.physical_program') }} (%)</label>
                                <input type="number" step="0.01" name="programmed_percent"
                                    value="{{number_format($progress->programmed_percent ?? '0')}}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('labels.real_physical') }} (%)</label>
                                <input type="number" step="0.01" name="real_percent"
                                    value="{{number_format($progress->real_percent ?? '0')}}" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('labels.scheduled_finance') }}</label>
                                <input type="text" name="scheduled_financing" class="form-control"
                                    value="{{number_format($progress->scheduled_financing ?? '0')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('labels.real_finance') }}</label>
                                <input type="text" name="real_financing" class="form-control"
                                    value="{{number_format($progress->real_financing ?? '0')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('labels.problem_description') }}</label>
                        <textarea name="description_problems" rows="5"
                            class="form-control">{{$progress->description_problems ?? ''}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('labels.theme_issues_description') }}</label>
                        <textarea name="description_issues" rows="5"
                            class="form-control">{{$progress->description_issues ?? ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('labels.advance_date') }}</label>
                        <input type="date" name="date_of_advance" class="form-control"
                            value="{{Carbon\Carbon::parse($progress->date_of_advance ?? date('Y-m-d'))->format('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('labels.publication_date') }}</label>
                        <input type="date" name="date_of_publication" class="form-control"
                            value="{{Carbon\Carbon::parse($progress->date_of_publication ?? date('Y-m-d'))->format('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('labels.guaranties_file') }}</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="guaranties_doc" id="guaranties_doc">
                            <label class="custom-file-label"
                                for="guaranties_doc">{{ isset($progress) ? ($progress->guaranties_doc ? __('labels.change_file_text') : __('labels.choose_file')) : __('labels.choose_file') }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('labels.advance_file') }}</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="advance_doc" id="advance_doc">
                            <label class="custom-file-label"
                                for="advance_doc">{{ isset($progress) ? ($progress->advance_doc ? __('labels.change_file_text') : __('labels.choose_file')) : __('labels.choose_file') }}</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('labels.status') }}</label>
                        <div class="typeahead">
                            <input class="form-control" value="{{$progress->status->status_name ?? ''}}" id="status_id"
                                name="status_id" type="text" dir="ltr" style="width: 100%">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">{{ __('labels.cancel') }}</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($budget) ? __('labels.save_changes') : __('labels.save') }}</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection