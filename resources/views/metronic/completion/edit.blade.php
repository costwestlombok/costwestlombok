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
        action="{{ isset($completion) ? url('contract-completion/'.$completion->id.'/update') : url('contract-completion/') }}">
        @csrf
        @if(isset($completion))
        @method('patch')
        @endif
        <div class="card-body">
            <div class="row">
                <input type="hidden" value="{{$contract->id}}" name="contracts_id">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Final Scope:</label>
                        <input type="text" name="final_scope" class="form-control" value="{{$completion->final_scope ?? ''}}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Final Cost:</label>
                        <input type="text" name="final_cost" class="form-control" value="{{ number_format($completion->final_cost ?? '0') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Justification:</label>
                        <textarea name="justification" rows="3" class="form-control">{{$completion->justification}}</textarea>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Final Date:</label>
                        <input type="date" name="date" class="form-control" value="{{ Carbon\Carbon::parse($contract->date ?? date('Y-m-d'))->format('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Description:</label>
                        <textarea name="description" rows="7" class="form-control">{{$completion->description}}</textarea>
                    </div>
                    
                </div>
            </div>
            <div class="card-footer">
                <div class="float-right">
                    <button type="reset" class="btn btn-secondary" onclick="javascript:history.back()">Cancel</button>
                    <button type="submit"
                        class="btn btn-primary mr-2">{{ isset($completion) ? 'Update' : 'Create' }}</button>
                </div>
            </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
@endsection