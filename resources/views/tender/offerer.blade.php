@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Add Offerer for This Tender</h4>
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
      <form method="post" id="form" action="{{ url('/tender-offerer') }}">
          @csrf
          <input type="hidden" value="{{$tender_id}}" name="tender_id">
          <div class="row">
            <div class="form-group">
                <label for="name">Offerer Name:</label>
                <select name="offerer_id" class="form-control" required>
                    <option value="">Choose Offerer</option>
                    @foreach ($offerers as $offerer)
                        <option value="{{$offerer->id}}">{{$offerer->offerer_name}}</option>
                    @endforeach
                </select>
            </div>
           </div>
            <div class="pull-right">
                <button type="submit" value="submit" class="btn btn-info">Submit</button>
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
                        <th data-hide="phone, tablet">#</th>
                        <th data-toggle="true">Nama Offerer</th>
                        <th data-hide="phone, tablet"></th>
                    </tr>
                </thead>
                @foreach ($tender_offerers as $data)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$data->offerer->offerer_name}}</td>
                    <td>
                        <form action="{{ url('/tender-offerer/'.$data->id) }}" method="post">
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