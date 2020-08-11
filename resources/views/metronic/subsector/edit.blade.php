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
                $sectors = App\Sector::all();
                @endphp
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="price">Sector </label>
                                <select class="form-control" name="sector_id" required>
                                    <option value="">Choose an sector</option>
                                    @foreach( $sectors as $sector )
                                    <option value='{{ $sector->id }}' @if(isset($subsector->sector_id))
                                        @if($subsector->sector_id == $sector->id) selected @endif
                                        @endif>{{ $sector->sector_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Subsector Name</label>
                                <input type="text" class="form-control" value="{{ $subsector->subsector_name ?? '' }}"
                                    name="subsector_name" required />
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">Cancel</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($subsector) ? 'Update' : 'Create' }}</button>
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