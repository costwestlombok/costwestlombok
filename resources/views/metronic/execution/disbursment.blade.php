@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
<script>
    var KTTypeahead = function () {
        var demo1 = function () {
            var status = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // url points to a json file that contains an array of country names, see
                // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                // prefetch: COST_URL
                prefetch: "{{ url('/get-status') }}"
            });

            // passing in `null` for the `options` arguments will result in the default
            // options being used

            $('#status_id').typeahead(null, {
                name: 'status_id',
                source: status
            });
        }
        return {
            // public functions
            init: function () {
                demo1();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTTypeahead.init();
    });
</script>
@endsection
@php
$contacts = App\Contact::all();
@endphp
@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Form-->
            <form method="post"
                action="{{ isset($disbursment) ? url('disbursment/'.$disbursment->id.'/update') : url('/disbursment') }}">
                @csrf
                @if(isset($disbursment))
                @method('patch')
                @endif
                <input type="hidden" name="executions_id" value="{{ $execution->id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label>{{ __('labels.order') }}</label>
                        <input type="number" name="order" value="{{ $disbursment->order ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>{{ __('labels.date') }}</label>
                        <input type="date" name="date" class="form-control"
                            value="{{ Carbon\Carbon::parse($execution->date ?? date('Y-m-d'))->format('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label>{{ __('labels.amount') }}</label>
                        <input type="text" name="amount" class="form-control" value="{{ $disbursment->amount ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label>{{ __('labels.description') }}</label>
                        <textarea name="description" rows="5"
                            class="form-control">{{ $disbursment->description ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>{{ __('labels.status') }}</label>
                        <div class="typeahead">
                            <input class="form-control" value="{{ $disbursment->status->status_name ?? '' }}"
                                id="status_id" name="status_id" type="text" dir="ltr" style="width: 100%">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">{{ __('labels.cancel') }}</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($ammendment) ? __('labels.save_changes') : __('labels.save') }}</button>
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