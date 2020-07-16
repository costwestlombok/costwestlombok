@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Add Disbursment</h4>
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
      <form method="post" id="form" action="{{ url('/disbursment') }}">
          @csrf
          <input type="hidden" value="{{$execution}}" name="executions_id">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Order:</label>
                  <input type="number" name="order" class="form-control">
              </div>
              <div class="form-group">
                <label for="name">Description:</label>
                <textarea name="description" rows="5" class="form-control"></textarea>
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Amount:</label>
                    <input type="text" name="amount" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Date:</label>
                    <input type="date" name="date" class="form-control" value="{{date('m-d-Y')}}">
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
        <h4 class="panel-title">Project Document List</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-togglable table-hover datatable datatable-header-basic">
                <thead>
                    <tr>
                        <th data-hide="phone, tablet">Order</th>
                        <th data-toggle="true">Description</th>
                        <th>Amount</th>
                        <th>Disbursment Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                   @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->order }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ number_format($item->amount) }}</td>
                        <td>{{ Carbon\Carbon::parse($item->date)->format("D, d M Y") }}</td>
                        <td>
                            <form action="{{ url('disbursment/destroy', $item->id)}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-danger" type="submit">
                                    <i class="icon-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                   @endforeach
                <tbody>
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