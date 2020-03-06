@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Purposes</h4>
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
      <form method="post" id="form" action="{{ route('purpose.store') }}">
          <div class="form-group">
              
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <label for="name">Purpose Name:</label>
              <input type="text" class="form-control" name="purpose_name" id="purpose_name"/>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>
@endsection

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <script>
     $("#form").validate({
      rules: {
        purpose_name: {
          required: true,
        }
      },
      messages: {
        purpose_name: {
          required: "Debe ingresar un nombre",
        }
      },
      submitHandler: function(form) {
        form.submit();
      }
     });
  </script>
@endpush