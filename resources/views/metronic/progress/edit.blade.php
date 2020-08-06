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
<!--begin::Card-->
<div class="card">
    <!--begin::Form-->
    <form method="post"
        action="{{ isset($progress) ? url('progress/'.$progress->id) : url('/project-progress') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($progress))
        @method('patch')
        @endif
        <input type="hidden" name="project_id" value="{{$project->id}}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Physical Program (%):</label>
                        <input type="number" step="0.01" name="programmed_percent" value="{{number_format($progress->programmed_percent ?? '0')}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Real Physical (%):</label>
                        <input type="number" step="0.01" name="real_percent" value="{{number_format($progress->real_percent ?? '0')}}" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Scheduled Finance:</label>
                        <input type="text" name="scheduled_financing" class="form-control" value="{{number_format($progress->scheduled_financing ?? '0')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Real Finance:</label>
                        <input type="text" name="real_financing" class="form-control" value="{{number_format($progress->real_financing ?? '0')}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name">Description of Problems:</label>
                <textarea name="description_problems" rows="5" class="form-control">{{$progress->description_problems ?? ''}}</textarea>
            </div>
    
            <div class="form-group">
                <label for="name">Description of Theme/Issues:</label>
                <textarea name="description_issues" rows="5" class="form-control">{{$progress->description_issues ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="name">Advance Date:</label>
                <input type="date" name="date_of_advance" class="form-control" value="{{Carbon\Carbon::parse($progress->date_of_advance ?? date('Y-m-d'))->format('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="name">Publication Date:</label>
                <input type="date" name="date_of_publication" class="form-control" value="{{Carbon\Carbon::parse($progress->date_of_publication ?? date('Y-m-d'))->format('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="">Guaranties File:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="guaranties_doc"
                        id="guaranties_doc">
                    <label class="custom-file-label" for="guaranties_doc">{{$progress->guaranties_doc ? 'Upload file to change document' : 'Choose file'}}</label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Advance File:</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="advance_doc"
                        id="advance_doc">
                    <label class="custom-file-label" for="advance_doc">{{$progress->advance_doc ? 'Upload file to change document' : 'Choose file'}}</label>
                </div>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <div class="typeahead">
                    <input class="form-control" value="{{$progress->status->status_name ?? ''}}" id="status_id"
                        name="status_id" type="text" dir="ltr" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button type="reset" class="btn btn-secondary" onclick="javascript:history.back()">Cancel</button>
                <button type="submit"
                    class="btn btn-primary mr-2">{{ isset($progress) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
@endsection