@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
<script>
    var KTSelect2 = function () {
        // Private functions
        var demos = function () {
            // basic
            $('#contact').select2({
                placeholder: "Choose a contact"
        });
        }
        return {
            init: function () {
                demos();
            }
        };
    }();
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
        KTSelect2.init();
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
                action="{{ isset($execution) ? route('execution.update', $execution) : route('execution.store') }}"
                enctype="multipart/form-data">
                @csrf
                @if(isset($execution))
                @method('patch')
                @endif
                <input type="hidden" name="engage_id" value="{{$contract->id}}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Start Date</label>
                        <input type="date" name="start_date" class="form-control"
                            value="{{Carbon\Carbon::parse($execution->start_date ?? date('Y-m-d'))->format('Y-m-d') }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="name">Price:</label>
                        <input type="text" name="varprice" value="{{ number_format($execution->varprice ?? '0') }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Program:</label>
                        <input type="text" class="form-control" value="{{$execution->program ?? ''}}" name="program" />
                    </div>
                    <div class="form-group">
                        <label for="name">Contract State:</label>
                        <textarea name="contract_state" rows="10"
                            class="form-control">{{$execution->contract_state ?? ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="current_price">Contact:</label>
                        <select name="contact_id" class="form-control" id="contact">
                            @foreach ($contacts as $contact)
                            <option value="{{$contact->id}}" @if($execution) @if($execution->contact_id == $contact->id)
                                selected @endif @endif>{{$contact->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Date of Publication:</label>
                        <input type="date" name="date_of_publication"
                            value="{{Carbon\Carbon::parse($execution->date_of_publication ?? date('Y-m-d'))->format('Y-m-d') }}"
                            class="form-control">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status:</label>
                        <div class="typeahead">
                            <input class="form-control" value="{{$execution->status->status_name ?? ''}}" id="status_id"
                                name="status_id" type="text" dir="ltr" style="width: 100%">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">Cancel</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($execution) ? 'Update' : 'Create' }}</button>
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