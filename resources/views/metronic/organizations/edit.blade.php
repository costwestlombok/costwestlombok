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
            <form method="post"
                action="{{ isset($organization) ? route('organization.update', $organization) : route('organization.store') }}">
                @csrf
                @if(isset($organization))
                @method('patch')
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{ __('labels.organization_name') }}</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $organization->name ?? '' }}" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{ __('labels.organization_legal_name') }}</label>
                                <input type="text" class="form-control" name="legal_name"
                                    value="{{ $organization->legal_name ?? '' }}" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{ __('labels.description') }}</label>
                                <textarea class="form-control" rows="3"
                                    name="description">{{ $organization->description ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{ __('labels.address') }}</label>
                                <textarea class="form-control" rows="3"
                                    name="address">{{ $organization->address ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{ __('labels.phone') }}</label>
                                <input type="text" class="form-control" name="phone"
                                    value="{{ $organization->phone ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{ __('labels.website') }}</label>
                                <input type="text" class="form-control" name="website"
                                    value="{{ $organization->website ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>{{ __('labels.postal_code') }}</label>
                                <input type="text" class="form-control" name="postal_code"
                                    value="{{ $organization->postal_code ?? '' }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">{{ __('labels.cancel') }}</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($organization) ? __('labels.save_changes') : __('labels.save') }}</button>
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