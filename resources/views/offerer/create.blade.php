@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Penawar</h4>
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
              <label for="name">Nama Penawar:</label>
              <input type="text" class="form-control" name="offerer_name"/>
          </div>
          <div class="form-group">
              <label for="name">Nama Resmi Penawar:</label>
              <input type="text" class="form-control" name="offerer_legal_name"/>
          </div>
          <div class="form-group">
              <label for="name">Nomor Telpon:</label>
              <input type="text" class="form-control" name="phone"/>
          </div>
          <div class="form-group">
              <label for="name">Website:</label>
              <input type="text" class="form-control" name="website"/>
          </div>
          <div class="form-group">
            <label for="name">Alamat:</label>
            <textarea name="address" id="" rows="3" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="name">Keterangan:</label>
            <textarea name="desctiption" id="" rows="5" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>
@endsection