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
                                <label for="name">{{ __('labels.name') }}</label>
                                <input type="text" name="name" value="{{$budget->name ?? ''}}" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('labels.description') }}</label>
                                <textarea name="description" rows="6"
                                    class="form-control">{{$budget->description ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('labels.start_date') }}</label>
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ date_format(Carbon\Carbon::parse($budget->start_date ?? date('Y-m-d')), 'Y-m-d') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('labels.end_date') }}</label>
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ date_format(Carbon\Carbon::parse($budget->end_date ?? date('Y-m-d')), 'Y-m-d') }}">
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('labels.amount') }}</label>
                                <input type="text" name="amount" value="{{ number_format($budget->amount ?? 0)}}"
                                    class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">{{ __('labels.cancel') }}</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($budget) ? __('labels.save_changes') : __('labels.save') }}</button>
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