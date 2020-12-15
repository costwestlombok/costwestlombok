@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
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
                                <label for="name">{{ __('labels.sources') }}</label>
                                <input type="text" class="form-control" value="{{ $source->source_name ?? '' }}"
                                    name="source_name" required />
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('labels.acronym') }}</label>
                                <input type="text" class="form-control" value="{{ $source->acronym ?? '' }}"
                                    name="acronym" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">{{ __('labels.cancel') }}</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($source) ? __('labels.save_changes') : __('labels.save') }}</button>
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