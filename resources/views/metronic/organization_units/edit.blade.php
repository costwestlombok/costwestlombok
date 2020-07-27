@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Form-->
    <form method="post" action="{{ isset($organization_unit) ? route('organization_unit.update', $organization_unit) : route('organization_unit.store') }}">
        @csrf
        @if(isset($organization_unit))
        @method('patch')
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="name">Unit Name:</label>
                        <input type="text" class="form-control" value="{{ $organization_unit->unit_name ?? '' }}" name="unit_name" required/>
                    </div>
                    <div class="form-group">
                        <label for="price">Organization: </label>
                        <select class="form-control" name="entity_id" required>
                          <option value="">Choose an Organization</option>
                          @foreach( $organizations as $org )
                            <option value='{{ $org->id }}' @if(isset($organization_unit->entity_id)) @if($organization_unit->entity_id == $org->id) selected @endif @endif>{{ $org->name }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button type="reset" class="btn btn-secondary" onclick="javascript:history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary mr-2">{{ isset($organization_unit) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
@endsection