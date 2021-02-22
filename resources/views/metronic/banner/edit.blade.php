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
            <form method="post" action="{{ isset($banner) ? route('banner.update', $banner) : route('banner.store') }}"
                enctype="multipart/form-data">
                @csrf
                @if(isset($banner))
                @method('patch')
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>{{ __('labels.order') }}</label>
                                <input type="text" class="form-control" name="order" value="{{ $banner->order ?? '' }}"
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">{{ __('labels.banner') }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image"
                                        accept="image/*">
                                    <label class="custom-file-label"
                                        for="image">{{ isset($banner) ? ($banner->image ? __('labels.change_file_text') : __('labels.choose_file')) : __('labels.choose_file') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <button type="reset" class="btn btn-secondary"
                            onclick="javascript:history.back()">{{ __('labels.cancel') }}</button>
                        <button type="submit"
                            class="btn btn-primary ml-2">{{ isset($banner) ? __('labels.save_changes') : __('labels.save') }}</button>
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