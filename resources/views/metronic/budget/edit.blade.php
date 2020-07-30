@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Form-->
    <form method="post"
        action="{{ isset($budget) ? url('project-budget/'.$budget->id.'/update') : url('project-budget/') }}">
        @csrf
        @if(isset($budget))
        @method('patch')
        @endif
        <div class="card-body">
            <div class="row">
                <input type="hidden" value="{{$project->id}}" name="project_id">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Description:</label>
                        <textarea name="description" rows="6" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Start Date:</label>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">End Date:</label>
                        <input type="date" name="end_date" class="form-control" value="{{date('m-d-Y')}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Ammount:</label>
                        <input type="text" name="amount" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <button type="reset" class="btn btn-secondary" onclick="javascript:history.back()">Cancel</button>
                    <button type="submit"
                        class="btn btn-primary mr-2">{{ isset($budget) ? 'Update' : 'Create' }}</button>
                </div>
            </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
@endsection