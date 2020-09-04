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

        var demo2 = function () {
            var warranty = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // url points to a json file that contains an array of country names, see
                // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
                // prefetch: COST_URL
                prefetch: "{{ url('/get-warranty-type') }}"
            });

            // passing in `null` for the `options` arguments will result in the default
            // options being used
            
            $('#warranty_types_id').typeahead(null, {
                name: 'warranty_types_id',
                source: warranty
            });
        }
        return {
            // public functions
            init: function () {
                demo1();
                demo2();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTTypeahead.init();
    });
</script>
@endsection
@section('content')
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Form-->
            <form method="post"
                action="{{ isset($warranty) ? url('warranty/'.$warranty->id.'/update') : url('warranty') }}">
                @csrf
                @if(isset($warranty))
                @method('patch')
                @endif
                <input type="hidden" name="executions_id" value="{{ $execution->id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label>Warranty Type</label>
                        <div class="typeahead">
                            <input class="form-control" value="{{ $warranty->type->name ?? '' }}" id="warranty_types_id"
                                name="warranty_types_id" type="text" dir="ltr" style="width: 100%">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="number">Amount</label>
                        <input type="text" name="amount" value="{{ $warranty->amount ?? '' }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="name">Expiration Date</label>
                        <input type="date" name="expiration_date" class="form-control"
                            value="{{ Carbon\Carbon::parse($warranty->expiration_date ?? date('Y-m-d'))->format('Y-m-d') }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Publication Date</label>
                        <input type="date" name="date_of_publication" class="form-control"
                            value="{{ Carbon\Carbon::parse($warranty->date_of_publication ?? date('Y-m-d'))->format('Y-m-d') }}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="typeahead">
                            <input class="form-control" value="{{ $warranty->status->status_name ?? '' }}"
                                id="status_id" name="status_id" type="text" dir="ltr" style="width: 100%" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">Cancel</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($warranty) ? 'Update' : 'Create' }}</button>
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