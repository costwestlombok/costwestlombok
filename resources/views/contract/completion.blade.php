@extends('layout')

@section('content')

@if(!$data)
<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Add Execution's Warranty</h4>
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
      <form method="post" id="form" action="{{ url('/completion') }}" >
          @csrf
          <input type="hidden" value="{{$contract}}" name="contracts_id">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Final scope:</label>
                    <input type="text" name="final_scope" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="name">Description:</label>
                <textarea type="text" name="description" class="form-control" rows="5"></textarea>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">End Date:</label>
                    <input type="date" name="date" class="form-control" value="{{date('m-d-Y')}}">
                </div>
                <div class="form-group">
                    <label for="name">Justification:</label>
                    <input type="text" name="justification" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Final Cost:</label>
                    <input type="text" name="final_cost" class="form-control">
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
          </div>
          
      </form>
  </div>
</div>
@else
<div class="panel panel-flat">
    <div class="panel-heading">
        <h4 class="panel-title">Completion Data</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-togglable table-hover datatable datatable-header-basic">
                <thead>
                    <tr>
                        <th data-toggle="true">Final Scope</th>
                        <th>Description</th>
                        <th>Justification</th>
                        <th>Final Cost</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data->final_scope}}</td>
                        <td>{{$data->description}}</td>
                        <td>{{$data->justification}}</td>
                        <td>{{number_format($data->final_cost)}}</td>
                        <td>
                            <form action="{{ url('completions/destroy', $data->id)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger" type="submit">
                                    <i class="icon-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection


@push('scripts')	
<script src="{{asset('js/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('js/tables/datatables/extensions/fixed_header.min.js')}}"></script>
<script src="{{asset('js/pages/datatable_extension_fixed_header.js')}}"></script>

<script src="{{asset('js/tables/footable.min.js')}}"></script>
<script src="{{asset('js/pages/tables_responsive.js')}}"></script>

<script src="{{asset('js/pages/fab_buttons.js')}}"></script>
@endpush