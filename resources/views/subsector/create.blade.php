@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Subsector</h4>
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
      <form method="post" action="{{ route('subsector.store') }}">
          
          <div class="form-group"> 
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <label for="name">Subsector name:</label>
              <input type="text" class="form-control" name="subsector_name"/>
          </div>
          <div class="form-group">
              <label for="price">Sector : </label>
              <select class="form-control" name="sectors_id">
                <option value="0" selected="selected">Choose a Sector</option>
                @foreach( $sectors as $sector )
                  <option value='{{ $sector->id }}'>{{ $sector->sector_name }}</option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
          
      </form>
  </div>
</div>
@endsection