@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Sectors</h4>
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
      <form method="post" action="{{ route('organization_unit.update', $unit->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
          <div class="form-group">
              <label for="name">Unit Name:</label>
              <input type="text" class="form-control" name="unit_name" value="{{$unit->unit_name}}" />
          </div>
          <div class="form-group">
              <label for="price">Organization: </label>
              <select class="form-control" name="entity_id">
                <option value="0" selected="selected">Choose an Organization</option>
                @foreach( $organizations as $org )
                  <option value='{{ $org->id }}' @if($unit->entity_id == $org->id) selected @endif>{{ $org->name }}</option>
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