@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Form-->
    <form method="post" action="{{ isset($organization) ? route('organization.update', $organization) : route('organization.store') }}">
        @csrf
        @if(isset($organization))
        @method('patch')
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Organization Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $organization->name ?? '' }}" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Organization Legal Name</label>
                        <input type="text" class="form-control" name="legal_name" value="{{ $organization->legal_name ?? '' }}" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="description">{{ $organization->description ?? '' }}</textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" name="address">{{ $organization->address ?? '' }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $organization->phone ?? '' }}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control" name="website" value="{{ $organization->website ?? '' }}" />
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Postal Code</label>
                        <input type="text" class="form-control" name="postal_code" value="{{ $organization->postal_code ?? '' }}" />
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button type="reset" class="btn btn-secondary" onclick="javascript:history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary mr-2">{{ isset($organization) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
@endsection