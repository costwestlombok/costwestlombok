@extends('layouts.metronic')
@section('style')
@endsection
@section('script')
<script>
    $('#entity').change(function(){
        var entity_id = $(this).val();
        $.ajax({
          type: "GET",
          url: "{{url('/get-unit')}}/"+entity_id,
          success: function (data){
            $('#unit option:gt(0)').remove();
            $.each(data, function(){
              $("#unit").append('<option value="'+this.id+'">'+this.unit_name+'</option>')
            });
          }
        });
    });
</script>
@endsection
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Form-->
    <form method="post" action="{{ isset($official) ? route('official.update', $official) : route('official.store') }}">
        @csrf
        @if(isset($official))
        @method('patch')
        @endif
        @php
            $organizations = App\Organization::all();
            if(isset($official->unit->entity_id)){
                $units = App\OrganizationUnit::where('entity_id', $official->unit->entity_id)->get();
            }
        @endphp
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Organization</label>
                        <select class="form-control" id="entity" required>
                            <option value="" selected="selected">Choose an Organization</option>
                            @foreach( $organizations as $org )
                              <option value='{{ $org->id }}' @if(isset($official->unit->entity_id)) @if($official->unit->entity_id == $org->id) selected @endif @endif>{{ $org->name }}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Organization Unit</label>
                        <select class="form-control" name="entity_unit_id" id="unit" required>
                            <option value="">Choose a unit</option>
                            @if(isset($units))
                                @foreach( $units as $unit )
                                    <option value='{{ $unit->id }}' @if($official->entity_unit_id == $unit->id)  selected="selected" @endif>{{ $unit->unit_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Official Name</label>
                        <input type="text" class="form-control" value="{{$official->name ?? ''}}" name="name" required/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Position:</label>
                        <input type="text" class="form-control" value="{{$official->position ?? ''}}" name="position"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="text" class="form-control" value="{{$official->email ?? ''}}" name="email"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Phone:</label>
                        <input type="text" class="form-control" name="phone" value="{{$official->phone ?? ''}}"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="float-right">
                <button type="reset" class="btn btn-secondary" onclick="javascript:history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary mr-2">{{ isset($official) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
<!--end::Card-->
@endsection