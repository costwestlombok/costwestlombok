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
                action="{{ isset($offerer) ? route('offerer.update', $offerer) : route('offerer.store') }}">
                @csrf
                @if(isset($offerer))
                @method('patch')
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Offerer Name</label>
                                <input type="text" class="form-control" name="offerer_name"
                                    value="{{$offerer->offerer_name ?? ''}}" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Legal Name</label>
                                <input type="text" class="form-control" name="legal_name"
                                    value="{{$offerer->legal_name ?? ''}}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{$offerer->phone ?? ''}}"
                                    required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Website</label>
                                <input type="text" class="form-control" name="website"
                                    value="{{$offerer->website ?? ''}}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Address</label>
                                <textarea name="address" id="" rows="5" class="form-control"
                                    required>{{$offerer->address ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name">Description</label>
                                <textarea name="description" id="" rows="5"
                                    class="form-control">{{$offerer->description ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">Cancel</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($offerer) ? 'Update' : 'Create' }}</button>
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