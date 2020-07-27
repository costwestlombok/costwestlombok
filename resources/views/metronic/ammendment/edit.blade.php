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
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Form-->
    <form method="post"
        action="{{ isset($ammendment) ? route('ammendment.update', $ammendment) : route('ammendment.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($ammendment))
        @method('patch')
        @endif
        <input type="hidden" name="engage_id" value="{{$contract->id}}">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Modification Number:</label>
                <input type="number" class="form-control" name="modification_number" required />
            </div>

            <div class="form-group">
                <label for="name">Modification Type:</label>
                <input type="text" class="form-control" name="modification_type" required />
            </div>

            <div class="form-group">
                <label for="name">Justification:</label>
                <textarea class="form-control" name="justification" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="current_price">Current Price:</label>
                <input type="text" class="form-control" name="current_price" required />
            </div>
            <div class="form-group">
                <label for="current_contract_scope">Current Contract Scope:</label>
                <textarea rows="5" class="form-control" name="current_contract_scope"></textarea>
            </div>
            <div class="form-group">
                <label for="">Date of Publication:</label>
                <input type="date" name="date_of_publication" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="">Adendum File:</label>
                <input type="file" name="adendum" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <div class="typeahead">
                    <input class="form-control" value="{{$ammendment->status->status_name ?? ''}}" id="status_id"
                        name="status_id" type="text" dir="ltr" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button type="reset" class="btn btn-secondary" onclick="javascript:history.back()">Cancel</button>
                <button type="submit"
                    class="btn btn-primary mr-2">{{ isset($ammendment) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
@endsection