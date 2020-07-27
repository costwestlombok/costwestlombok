@extends('layouts.metronic')
@section('style')
<link href="/metronic/assets/css/pages/wizard/wizard-3.css" rel="stylesheet" type="text/css" />
@endsection
@section('script')
<script>
    var KTSelect2 = function () {
        // Private functions
        var demos = function () {
            // basic
            $('#supplier').select2({
                placeholder: "Choose an supplier"
            });
        }
        return {
            init: function () {
                demos();
            }
        };
    }();
    var KTTypeahead = function () {
        var demo2 = function () {
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
                demo2();
            }
        };
    }();

    jQuery(document).ready(function () {
        KTTypeahead.init();
        KTSelect2.init();
    });
</script>
@endsection
@php
    $suppliers = App\TenderOfferer::where('tender_id', $award->tender->id)->get();
@endphp
@section('content')
{{-- card --}}
<div class="card">
    <form action="{{ isset($contract) ? route('contract.update', $contract) : route('contract.store') }}" method="POST">
        @csrf
        @if(isset($contract))
        @method('patch')
        @endif
        <input type="hidden" name="awards_id" value="{{$award->id}}">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Contract Number:</label>
                <input type="text" class="form-control" name="number" value="{{$contract->number ?? ''}}" required />
            </div>

            <div class="form-group">
                <label for="name">Contract Title:</label>
                <input type="text" class="form-control" name="contract_title"
                    value="{{$contract->contract_title ?? ''}}" required />
            </div>

            <div class="form-group">
                <label for="name">Contract Scope:</label>
                <textarea class="form-control" name="contract_scope"
                    rows="5">{{$contract->contract_scope ?? ''}}</textarea>
            </div>

            <div class="form-group">
                <label for="">Supplier Name:</label>
                <select class="form-control" name="suppliers_id" id="supplier">
                    <option value="">Choose supplier</option>
                    @foreach ($suppliers as $supp)
                    <option value="{{$supp->offerer_id}}" @if(isset($contract)) @if($contract->supplier_id == $supp->offerer_id) selected @endif @endif >{{$supp->offerer->legal_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price_local_currency">Price in Local Currency:</label>
                        <input type="text" class="form-control" value="{{number_format($contract->price_local_currency ?? '0')}}" name="price_local_currency" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price_usd_currency">Price in USD Currency:</label>
                        <input type="text" class="form-control" value="{{number_format($contract->price_usd_currency ?? '0')}}" name="price_usd_currency" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start">Start Date:</label>
                        <input type="date" class="form-control" value="{{Carbon\Carbon::parse($contract->start_date ?? date('Y-m-d'))}}" name="start_date" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="end">End Date:</label>
                        <input type="date" class="form-control" value="{{Carbon\Carbon::parse($contract->end_date ?? date('Y-m-d'))}}" name="end_date" required />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="max_extend_date">Max Extended Date:</label>
                <input type="date" class="form-control" value="{{Carbon\Carbon::parse($contract->max_entended_date ?? date('Y-m-d'))}}" name="max_extend_date" required />
            </div>
            <div class="form-group">
                <label>Status:</label>
                <div class="typeahead">
                    <input class="form-control" value="{{$contract->status->status_name ?? ''}}" id="status_id"
                        name="status_id" type="text" dir="ltr" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button type="reset" class="btn btn-secondary" onclick="javascript:history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary mr-2">{{ isset($contract) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
</div>
{{-- End card --}}
@endsection