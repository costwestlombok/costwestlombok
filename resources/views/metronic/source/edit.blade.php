@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Form-->
    <form method="post" action="{{ isset($source) ? route('source.update', $source) : route('source.store') }}">
        @csrf
        @if(isset($source))
        @method('patch')
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="name">Source Name</label>
                        <input type="text" class="form-control" value="{{ $source->source_name ?? '' }}" name="source_name" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Acronym</label>
                        <input type="text" class="form-control" value="{{ $source->acronym ?? '' }}" name="acronym"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button type="reset" class="btn btn-secondary" onclick="javascript:history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary mr-2">{{ isset($source) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
@endsection