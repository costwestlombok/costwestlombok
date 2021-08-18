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
                placeholder: "{{ __('labels.choose_offerer') }}"
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
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card">
            <form action="{{ isset($contract) ? route('contract.update', $contract) : route('contract.store') }}"
                method="POST">
                @csrf
                @if(isset($contract))
                @method('patch')
                @endif
                <input type="hidden" name="awards_id" value="{{ $award->id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __('labels.contract_number') }}</label>
                        <input type="text" class="form-control" name="number" value="{{ $contract->number ?? '' }}"
                            required />
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('labels.contract_title') }}</label>
                        <input type="text" class="form-control" name="contract_title"
                            value="{{ $contract->contract_title ?? '' }}" required />
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('labels.contract_scope') }}</label>
                        <textarea class="form-control" name="contract_scope"
                            rows="5">{{ $contract->contract_scope ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">{{ __('labels.offerer') }}</label>
                        <select class="form-control" name="suppliers_id" id="supplier">
                            <option value="">{{ __('labels.choose_offerer') }}</option>
                            @foreach ($suppliers as $supp)
                            <option value="{{ $supp->offerer_id }}" @if(isset($contract)) @if($contract->suppliers_id ==
                                $supp->offerer_id) selected @endif @endif >{{ $supp->offerer->legal_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price_local_currency">{{ __('labels.price_local_currency') }}</label>
                                <input type="text" class="form-control"
                                    value="{{ isset($contract) ? ($contract->price_local_currency ?? ($contract->award->cost ?? '0')) : (isset($award) ? ($award->cost ?? '0') : '0') }}"
                                    name="price_local_currency" />
                            </div>
                        </div>
                        @if(false)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price_usd_currency">{{ __('labels.price_usd_currency') }}</label>
                                <input type="text" class="form-control"
                                    value="{{ $contract->price_usd_currency ?? '0' }}" name="price_usd_currency"
                                    required />
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start">{{ __('labels.start_date') }}</label>
                                <input type="date" class="form-control"
                                    value="{{ isset($contract) ? ($contract->start_date ? $contract->start_date->format('Y-m-d') : ($contract->award->tender->start_date ? $contract->award->tender->start_date->format('Y-m-d') : '')) : (isset($award) ? ($award->tender->start_date ? $award->tender->start_date->format('Y-m-d') : '') : '') }}"
                                    name="start_date" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end">{{ __('labels.end_date') }}</label>
                                <input type="date" class="form-control"
                                    value="{{ isset($contract) ? ($contract->end_date ? $contract->end_date->format('Y-m-d') : ($contract->award->tender->end_date ? $contract->award->tender->end_date->format('Y-m-d') : '')) : (isset($award) ? ($award->tender->end_date ? $award->tender->end_date->format('Y-m-d') : '') : '') }}"
                                    name="end_date" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="max_extend_date">{{ __('labels.max_extended_date') }}</label>
                        <input type="date" class="form-control"
                            value="{{ isset($contract) ? ($contract->max_entended_date ? $contract->max_entended_date->format('Y-m-d') : '') : '' }}"
                            name="max_extend_date" />
                    </div>
                    <div class="form-group">
                        <label>{{ __('labels.status') }}</label>
                        <div class="typeahead">
                            <input class="form-control" value="{{ $contract->status->status_name ?? '' }}"
                                id="status_id" name="status_id" type="text" dir="ltr" style="width: 100%">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">{{ __('labels.cancel') }}</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($contract) ? __('labels.save_changes') : __('labels.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
@endsection