@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Source</h4>
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
      <form method="post" action="{{ route('source.store') }}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
              <label for="name">Source Name:</label>
              <input type="text" class="form-control" name="source_name"/>
          </div>
          <div class="form-group">
              
              <label for="name">Acronym:</label>
              <input type="text" class="form-control" name="acronym"/>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>
@endsection