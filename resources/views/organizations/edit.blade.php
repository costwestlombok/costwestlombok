@extends('layout')


@section('content')
<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Organization</h4>
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
      <form method="post" action="{{ route('organization.update', $organization->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

          <div class="form-group">
              <label for="name">Organization Name:</label>
              <input type="text" class="form-control" name="name" value="{{$organization->name}}" />
          </div>
          <div class="form-group">
              <label for="price">Organization legal name :</label>
              <input type="text" class="form-control" name="legal_name" value="{{$organization->legal_name}}"/>
          </div>
          <div class="form-group">
              <label for="price">Description :</label>
              <textarea class="form-control" name="description" rows="3">{{$organization->description}}</textarea>
          </div>
          <div class="form-group">
              <label for="quantity">Address:</label>
              <textarea name="address" class="form-control" rows="3">{{$organization->address}}</textarea>
          </div>
          <div class="form-group">
              <label for="quantity">Phone:</label>
              <input type="text" class="form-control" name="phone" value="{{$organization->phone}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Website:</label>
              <input type="text" class="form-control" name="website" value="{{$organization->website}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Postal code:</label>
              <input type="text" class="form-control" name="postal_code" value="{{$organization->postal_code}}"/>
          </div>

          <div class="pull-right">
            <button type="submit" class="btn btn-primary">Update Data</button>
          </div>
        
      </form>
  </div>
</div>
@endsection