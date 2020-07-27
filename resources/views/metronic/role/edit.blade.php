@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Form-->
    <form method="post" action="{{ isset($role) ? route('role.update', $role) : route('role.store') }}">
        @csrf
        @if(isset($role))
        @method('patch')
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="name">Role Name:</label>
                        <input type="text" class="form-control" value="{{ $role->role_name ?? '' }}" name="role_name" required/>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button type="reset" class="btn btn-secondary" onclick="javascript:history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary mr-2">{{ isset($role) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
@endsection