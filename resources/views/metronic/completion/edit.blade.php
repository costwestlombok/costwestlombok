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
                action="{{ isset($completion) ? url('contract-completion/'.$completion->id.'/update') : url('contract-completion/') }}">
                @csrf
                @if(isset($completion))
                @method('patch')
                @endif
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" value="{{ $contract->id }}" name="contracts_id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('labels.final_scope') }}</label>
                                <textarea name="final_scope" rows="5" class="form-control"
                                    required>{{ $completion->final_scope ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('labels.final_cost') }}</label>
                                <input type="text" name="final_cost" class="form-control"
                                    value="{{ number_format($completion->final_cost ?? 0) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('labels.final_date') }}</label>
                                <input type="date" name="date" class="form-control"
                                    value="{{ isset($completion) ? ($completion->date ? $completion->date->format('Y-m-d') : ($completion->contract->end_date ? $completion->contract->end_date->format('Y-m-d') : '')) : (isset($contract) ? ($contract->end_date ? $contract->end_date->format('Y-m-d') : '') : '') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('labels.justification') }}</label>
                                <textarea name="justification" rows="5"
                                    class="form-control">{{ $completion->justification ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('labels.description') }}</label>
                                <textarea name="description" rows="5"
                                    class="form-control">{{ $completion->description ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">{{ __('labels.cancel') }}</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($completion) ? __('labels.save_changes') : __('labels.save') }}</button>
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