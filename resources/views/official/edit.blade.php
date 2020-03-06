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
      <form method="post" action="{{ route('official.update', $official->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
          

          <div class="form-group">
              <label for="price">Organization: </label>
              <select class="form-control" name="organizations_id">
                <option value="0" selected="selected">Choose an Organizatin</option>
                @foreach( $organizations as $org )
                  @if($official->organizations_id == $org->id)
                  <option value='{{ $org->id }}' selected="selected">{{ $org->organization_name }}</option>
                  @else
                  <option value='{{ $org->id }}'>{{ $org->organization_name }}</option>
                  @endif
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="price">Unit: </label>
              <select class="form-control" name="organization_units_id">
                <option value="0" selected="selected">Choose an Unit</option>
                @foreach( $units as $unit )
                  @if($official->organization_units_id == $unit->id) 
                  <option value='{{ $unit->id }}' selected="selected">{{ $unit->unit_name }}</option>
                  @else
                  <option value='{{ $unit->id }}'>{{ $unit->unit_name }}</option>
                  @endif
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="name">Official Name:</label>
              <input type="text" class="form-control" name="official_name" value="{{$official->official_name}}" />
          </div>
          <div class="form-group">
              <label for="name">Position:</label>
              <input type="text" class="form-control" name="position" value="{{$official->position}}" />
          </div>
          <div class="form-group">
              <label for="name">Email:</label>
              <input type="text" class="form-control" name="email"{{ $official->email }}/>
          </div>
          <div class="form-group">
              <label for="name">Phone:</label>
              <input type="text" class="form-control" name="phone" value="{{$official->phone}}" />
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
        
      </form>
  </div>
</div>
@endsection