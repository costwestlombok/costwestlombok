@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Subectors</h4>
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
      <form method="post" action="{{ route('subsector.update', $subsector->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

          <div class="form-group">
              <label for="name">Subsector Name:</label>
              <input type="text" class="form-control" name="subsector_name" value="{{$subsector->subsector_name}}" required/>
          </div>
          <div class="form-group">
              <label for="price">Sector : </label>
              <select class="form-control" name="sector_id" required>
                <option value="0" selected="selected">Choose a Sector</option>
                @foreach( $sectors as $sector )
                  <option value='{{ $sector->id }}' @if($subsector->sector_id == $sector->id) selected="selected" @endif>{{ $sector->sector_name }}</option>
                @endforeach
              </select>
          </div>
          <div class="pull-right">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        
      </form>
  </div>
</div>
@endsection