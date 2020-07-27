@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Form-->
    <form method="post" action="{{ isset($warranty_type) ? route('warranty-type.update', $warranty_type) : route('warranty-type.store') }}">
        @csrf
        @if(isset($warranty_type))
        @method('patch')
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="name">Warranty Type:</label>
                        <input type="text" class="form-control" value="{{ $warranty_type->name ?? '' }}" name="name" required/>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button type="reset" class="btn btn-secondary" onclick="javascript:history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary mr-2">{{ isset($warranty_type) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
@endsection