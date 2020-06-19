@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Add Official Data</h4>
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
      <form method="post" action="{{ route('official.store') }}">
          
          {{ csrf_field() }}
          <div class="form-group">
              <label for="price">Organization: </label>
              <select class="form-control" id="entity" required>
                <option value="" selected="selected">Choose an Organization</option>
                @foreach( $organizations as $org )
                  <option value='{{ $org->id }}'>{{ $org->name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="price">Organization Unit: </label>
              <select class="form-control" name="entity_unit_id" id="unit" required>
              </select>
          </div>
          <div class="form-group">
              <label for="name">Official Name:</label>
              <input type="text" class="form-control" name="name" required/>
          </div>
          <div class="form-group">
              <label for="name">Position:</label>
              <input type="text" class="form-control" name="position"/>
          </div>
          <div class="form-group">
              <label for="name">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="name">Phone:</label>
              <input type="text" class="form-control" name="phone"/>
          </div>
          <div class="pull-right">
            <button type="submit" class="btn btn-primary">Save</button>
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