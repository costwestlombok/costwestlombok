@extends('layout')

@section('content')


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
      <form method="post" id="form" action="{{ url('/warranty') }}" >
          @csrf

          <input type="hidden" value="{{$execution}}" name="executions_id">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Warranty Type:</label>
                  <select name="warranty_types_id" class="form-control">
                      <option value="">Choose warranty type</option>
                      @foreach ($warranty_types as $wt)
                        <option value="{{$wt->id}}">{{$wt->name}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="name">Amount:</label>
                <input type="text" name="ammount" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Expiration Date:</label>
                <input type="date" name="expiration_date" class="form-control" value="{{date('m-d-Y')}}">
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Publication Date:</label>
                    <input type="date" name="date_of_publication" class="form-control" value="{{date('m-d-Y')}}">
                </div>
                <div class="form-group">
                    <label for="name">Status:</label>
                    <select name="status_id" class="form-control">
                        <option value="">Choose status</option>
                        @foreach ($status as $stat)
                            <option value="{{$stat->id}}">{{$stat->status_name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
          </div>
          
      </form>
  </div>
</div>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h4 class="panel-title">Warranty List</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-togglable table-hover datatable datatable-header-basic">
                <thead>
                    <tr>
                        <th data-hide="phone, tablet">#</th>
                        <th data-toggle="true">Warranty Type</th>
                        <th>Expiration Date</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$item->type->name}}</td>
                            <td>{{ Carbon\Carbon::parse($item->expiration_date)->format('D, d M Y') }}</td>
                            <td>{{ number_format($item->ammount) }}</td>
                            <td>
                                <form action="{{ url('warranty/destroy', $item->id)}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit">
                                        <i class="icon-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach                
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@push('scripts')	
<script src="{{asset('js/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('js/tables/datatables/extensions/fixed_header.min.js')}}"></script>
<script src="{{asset('js/pages/datatable_extension_fixed_header.js')}}"></script>

<script src="{{asset('js/tables/footable.min.js')}}"></script>
<script src="{{asset('js/pages/tables_responsive.js')}}"></script>

<script src="{{asset('js/pages/fab_buttons.js')}}"></script>
@endpush