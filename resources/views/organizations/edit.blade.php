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
              <input type="text" class="form-control" name="organization_name" value="{{$organization->organization_name}}" />
          </div>
          <div class="form-group">
              <label for="price">Organization legal name :</label>
              <input type="text" class="form-control" name="organization_legal_name" value="{{$organization->organization_legal_name}}"/>
          </div>
          <div class="form-group">
              <label for="price">Description :</label>
              <input type="text" class="form-control" name="description" value="{{$organization->description}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Address:</label>
              <input type="text" class="form-control" name="address" value="{{$organization->address}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Phone:</label>
              <input type="text" class="form-control" name="phone" value="{{$organization->phone}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Postal code:</label>
              <input type="text" class="form-control" name="postal_code" value="{{$organization->postal_code}}"/>
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
        
      </form>
  </div>
</div>
@endsection