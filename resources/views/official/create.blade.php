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
      <form method="post" action="{{ route('official.store') }}">
          
          {{ csrf_field() }}
          <div class="form-group">
              <label for="price">Organization: </label>
              <select class="form-control" name="organizations_id">
                <option value="0" selected="selected">Choose an Organizatin</option>
                @foreach( $organizations as $org )
                  <option value='{{ $org->id }}'>{{ $org->organization_name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="price">Unit: </label>
              <select class="form-control" name="organization_units_id">
                <option value="0" selected="selected">Choose an Unit</option>
                @foreach( $units as $unit )
                  <option value='{{ $unit->id }}'>{{ $unit->unit_name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="name">Official Name:</label>
              <input type="text" class="form-control" name="official_name"/>
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

          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>
@endsection