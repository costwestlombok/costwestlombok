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
                action="{{ isset($contact) ? route('contact.update', $contact) : route('contact.store') }}">
                @csrf
                @if(isset($contact))
                @method('patch')
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">{{ __('labels.name') }}</label>
                                <input type="text" name="name" value="{{$contact->name ?? ''}}" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('labels.position') }}</label>
                                <input type="text" name="position" value="{{$contact->position ?? ''}}"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" name="email" value="{{$contact->email ?? ''}}" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('labels.phone') }}</label>
                                <input type="text" name="phone" value="{{$contact->phone ?? ''}}" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="name">{{ __('labels.address') }}</label>
                                <textarea name="address" rows="3" class="form-control"
                                    required>{{$contact->address ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">{{ __('labels.cancel') }}</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($contact) ? __('labels.save_changes') : __('labels.save') }}</button>
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