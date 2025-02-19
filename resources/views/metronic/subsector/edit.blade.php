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
                action="{{ isset($subsector) ? route('subsector.update', $subsector) : route('subsector.store') }}">
                @csrf
                @if(isset($subsector))
                @method('patch')
                @endif
                @php
                $sectors = \App\Models\Sector::all();
                @endphp
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="price">{{ __('labels.sector') }}</label>
                                <select class="form-control" name="sector_id" required>
                                    <option value="">{{ __('labels.choose_sector') }}</option>
                                    @foreach( $sectors as $sector )
                                    <option value='{{ $sector->id }}' @if(isset($subsector->sector_id))
                                        @if($subsector->sector_id == $sector->id) selected @endif
                                        @endif>{{ $sector->sector_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('labels.subsector') }}</label>
                                <input type="text" class="form-control" value="{{ $subsector->subsector_name ?? '' }}"
                                    name="subsector_name" required />
                            </div>

                            <div class="form-group">
                                <label for="name">{{ __('labels.subsector_code') }}</label>
                                <input type="text" class="form-control" value="{{ $subsector->subsector_code ?? '' }}"
                                    name="subsector_code" required />
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">{{ __('labels.cancel') }}</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($subsector) ? __('labels.save_changes') : __('labels.save') }}</button>
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
