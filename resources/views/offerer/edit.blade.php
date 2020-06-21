@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Offer</h4>
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
      <form method="post" action="{{ route('offerer.update', $offerer->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
          <div class="form-group">
              <label for="name">Offerer Name:</label>
              <input type="text" class="form-control" name="offerer_name" value="{{$offerer->offerer_name}}" required/>
          </div>
          <div class="form-group">
              <label for="name">Legal Name:</label>
              <input type="text" class="form-control" name="legal_name" value="{{$offerer->legal_name}}"/>
          </div>
          <div class="form-group">
              <label for="name">Phone:</label>
              <input type="text" class="form-control" name="phone" value="{{$offerer->phone}}" required/>
          </div>
          <div class="form-group">
              <label for="name">Website:</label>
              <input type="text" class="form-control" name="website" value="{{$offerer->website}}"/>
          </div>
          <div class="form-group">
            <label for="name">Address:</label>
            <textarea name="address" id="" rows="3" class="form-control">{{$offerer->address}}</textarea>
          </div>
          <div class="form-group">
            <label for="name">Description:</label>
            <textarea name="description" id="" rows="5" class="form-control">{{$offerer->description}}</textarea>
          </div>
          <div class="pull-right">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
      </form>
  </div>
</div>
@endsection