@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Offerer</h4>
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
      <form method="post" action="{{ route('offerer.store') }}">
        @csrf
          <div class="form-group">
              <label for="name">Offerer Name:</label>
              <input type="text" class="form-control" name="offerer_name" required/>
          </div>
          <div class="form-group">
              <label for="name">Legal Name:</label>
              <input type="text" class="form-control" name="legal_name"/>
          </div>
          <div class="form-group">
              <label for="name">Phone:</label>
              <input type="text" class="form-control" name="phone" required/>
          </div>
          <div class="form-group">
              <label for="name">Website:</label>
              <input type="text" class="form-control" name="website"/>
          </div>
          <div class="form-group">
            <label for="name">Address:</label>
            <textarea name="address" id="" rows="3" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="name">Description:</label>
            <textarea name="description" id="" rows="5" class="form-control"></textarea>
          </div>
          <div class="pull-right">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
  </div>
</div>
@endsection