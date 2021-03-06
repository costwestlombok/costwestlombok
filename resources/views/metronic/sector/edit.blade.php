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
            <form method="post" action="{{ isset($sector) ? route('sector.update', $sector) : route('sector.store') }}">
                @csrf
                @if(isset($sector))
                @method('patch')
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">{{ __('labels.sector') }}</label>
                                <input type="text" class="form-control" value="{{ $sector->sector_name ?? '' }}"
                                    name="sector_name" required />
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('labels.sector_code') }}</label>
                                <input type="text" class="form-control" value="{{ $sector->sector_code ?? '' }}"
                                    name="sector_code" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">{{ __('labels.cancel') }}</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($sector) ? __('labels.save_changes') : __('labels.save') }}</button>
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