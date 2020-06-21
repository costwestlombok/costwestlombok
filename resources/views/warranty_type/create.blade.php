@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Warranty Type</h4>
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
      <form method="post" action="{{ route('warranty-type.store') }}">
          <div class="form-group">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <label for="name">Warranty Type Name:</label>
              <input type="text" class="form-control" name="name" required/>
          </div>
          <div class="pull-right">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
  </div>
</div>
@endsection