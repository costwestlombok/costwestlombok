@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Status</h4>
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
      <form method="post" action="{{ route('status.store') }}">
          <div class="form-group">
              
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <label for="name">Status Name:</label>
              <input type="text" class="form-control" name="status_name" required/>
          </div>
          <div class="pull-right">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
  </div>
</div>
@endsection