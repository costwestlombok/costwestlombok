@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">@lang('labels.organizations')</h4>
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
      <form method="post" id="form" action="{{ route('organization.store') }}">
          <div class="form-group">
              
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <label for="name">@lang('labels.organization_name'):</label>
              <input type="text" class="form-control" name="organization_name"/>
          </div>
          <div class="form-group">
              <label for="price">@lang('labels.organization_legal_name'):</label>
              <input type="text" class="form-control" name="organization_legal_name"/>
          </div>
          <div class="form-group">
              <label for="price">Description :</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <div class="form-group">
              <label for="quantity">Address:</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
              <label for="quantity">Phone:</label>
              <input type="text" class="form-control" name="phone"/>
          </div>
          <div class="form-group">
              <label for="quantity">Postal code:</label>
              <input type="text" class="form-control" name="postal_code"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
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
        organization_name: {
          required: true,
        },
        organization_legal_name: {
          required: true,
        },
        description: {
          required: true,
        },
      },
      messages: {
        organization_name: {
          required: "Debe ingresar un nombre",
        },
        organization_legal_name: {
          required: "Debe ingresar un nombre",
        }
        description: {
          required: "Debe ingresar una descripcion",
        }
      },
      submitHandler: function(form) {
        form.submit();
      }
     });
  </script>
@endpush