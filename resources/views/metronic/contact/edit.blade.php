@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Form-->
    <form method="post" action="{{ isset($contact) ? route('contact.update', $contact) : route('contact.store') }}">
        @csrf
        @if(isset($contact))
        @method('patch')
        @endif
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="{{$contact->name ?? ''}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Position:</label>
                        <input type="text" name="position" value="{{$contact->position ?? ''}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="email" name="email" value="{{$contact->email ?? ''}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Phone:</label>
                        <input type="text" name="phone" value="{{$contact->phone ?? ''}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Address:</label>
                        <textarea name="address" rows="3" class="form-control" required>{{$contact->address ?? ''}}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button type="reset" class="btn btn-secondary" onclick="javascript:history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary mr-2">{{ isset($contact) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
@endsection