@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Official Data</h4>
  </div>
  <div class="panel-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('official.update', $official->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
          
          <div class="form-group">
              <label for="price">Organization: </label>
              <select class="form-control" id="entity">
                <option value="" selected="selected">Choose an Organization</option>
                @foreach( $organizations as $org )
                  <option value='{{ $org->id }}' @if($official->unit->entity_id == $org->id) selected @endif>{{ $org->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="price">Unit: </label>
              <select class="form-control" name="entity_unit_id" id="unit">
                <option value="" selected="selected">Choose an Unit</option>
                @foreach( $units as $unit )
                    <option value='{{ $unit->id }}' @if($official->entity_unit_id == $unit->id)  selected="selected" @endif>{{ $unit->unit_name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="name">Official Name:</label>
              <input type="text" class="form-control" name="name" value="{{$official->name}}" />
          </div>
          <div class="form-group">
              <label for="name">Position:</label>
              <input type="text" class="form-control" name="position" value="{{$official->position}}" />
          </div>
          <div class="form-group">
              <label for="name">Email:</label>
              <input type="text" class="form-control" name="email" value="{{ $official->email }}"/>
          </div>
          <div class="form-group">
              <label for="name">Phone:</label>
              <input type="text" class="form-control" name="phone" value="{{$official->phone}}" />
          </div>
          <div class="pull-right">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
      </form>
  </div>
</div>
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