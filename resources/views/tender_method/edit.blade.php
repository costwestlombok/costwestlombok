@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Method</h4>
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
      <form method="post" action="{{ route('tender_method.update', $method->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
          <div class="form-group">
              
              
              <label for="name">Method Name:</label>
              <input type="text" class="form-control" name="method_name" value="{{$method->method_name}}" />
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        
      </form>
  </div>
</div>
@endsection