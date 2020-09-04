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
                action="{{ isset($contract_method) ? route('contract_method.update', $contract_method) : route('contract_method.store') }}">
                @csrf
                @if(isset($contract_method))
                @method('patch')
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Method Name</label>
                                <input type="text" class="form-control"
                                    value="{{ $contract_method->method_name ?? '' }}" name="method_name" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">Cancel</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($contract_method) ? 'Update' : 'Create' }}</button>
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