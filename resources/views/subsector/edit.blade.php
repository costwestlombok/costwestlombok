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
              <input type="text" class="form-control" name="subsector_name" value="{{$subsector->subsector_name}}" />
          </div>
          <div class="form-group">
              <label for="price">Sector : </label>
              <select class="form-control" name="sectors_id">
                <option value="0" selected="selected">Choose a Sector</option>
                @foreach( $sectors as $sector )
                  @if($subsector->sectors_id == $sector->id)
                    <option value='{{ $sector->id }}' selected="selected">{{ $sector->sector_name }}</option>
                  @else
                    <option value='{{ $sector->id }}'>{{ $sector->sector_name }}</option>
                  @endif
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        
      </form>
  </div>
</div>
@endsection