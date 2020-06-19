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
      <form method="post" action="{{ route('sector.store') }}">
        @csrf
          <div class="form-group">
              <label for="name">Sector Name:</label>
              <input type="text" class="form-control" name="sector_name"/>
          </div>
          <div class="pull-right">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
  </div>
</div>
@endsection