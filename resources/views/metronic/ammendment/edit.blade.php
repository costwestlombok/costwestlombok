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
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Form-->
            <form method="post"
                action="{{ isset($ammendment) ? route('ammendment.update', $ammendment) : route('ammendment.store') }}"
                enctype="multipart/form-data">
                @csrf
                @if(isset($ammendment))
                @method('patch')
                @endif
                <input type="hidden" name="engage_id" value="{{ $contract->id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">{{ __('labels.modification_number') }}</label>
                        <input type="number" class="form-control" value="{{ $ammendment->modification_number ?? '' }}"
                            name="modification_number" required />
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('labels.modification_type') }}</label>
                        <input type="text" class="form-control" value="{{ $ammendment->modification_type ?? '' }}"
                            name="modification_type" required />
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('labels.justification') }}</label>
                        <textarea class="form-control" name="justification" rows="5"
                            required>{{ $ammendment->justification ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="current_price">{{ __('labels.current_price') }}</label>
                        <input type="text" class="form-control" name="current_price"
                            value="{{ $ammendment->current_price ?? '' }}" required />
                    </div>
                    <div class="form-group">
                        <label for="current_contract_scope">{{ __('labels.current_contract_scope') }}</label>
                        <textarea rows="5" class="form-control"
                            name="current_contract_scope">{{ $ammendment->current_contract_scope ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('labels.publication_date') }}</label>
                        <input type="date" name="date_of_publication" class="form-control"
                            value="{{ Carbon\Carbon::parse($contract->date_of_publication ?? date('Y-m-d'))->format('Y-m-d') }}">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('labels.addendum_file') }}</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="adendum" id="adendum">
                            <label class="custom-file-label"
                                for="adendum">{{ isset($ammendment) ? ($ammendment->adendum ? __('labels.change_file_text') : __('labels.choose_file')) : __('labels.choose_file') }}</label>
                        </div>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ __('labels.status') }}</label>
                        <div class="typeahead">
                            <input class="form-control" value="{{ $ammendment->status->status_name ?? '' }}"
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