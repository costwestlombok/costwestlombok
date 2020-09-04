@extends('layout')

@section('content')


<div class="panel panel-flat">
    <div class="panel-heading">
        <h4 class="panel-title">Add Project Budget</h4>
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
        <form method="post" id="form" action="{{ url('/project/source') }}">
            @csrf
            <input type="hidden" value="{{$project}}" name="project_id">
            <input type="hidden" value="{{$budget}}" name="budget_id">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Source:</label>
                        <select name="source_id" class="form-control">
                            <option value="">Choose Source</option>
                            @foreach ($sources as $source)
                            <option value="{{$source->id}}">{{$source->source_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Amount:</label>
                        <input type="text" name="amount" class="form-control" required>
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
        <h4 class="panel-title">Project Source List</h4>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-togglable table-hover datatable datatable-header-basic">
                <thead>
                    <tr>
                        <th data-hide="phone, tablet">#</th>
                        <th data-toggle="true">Budget</th>
                        <th>Amount</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th data-hide="phone, tablet">Actions</th>
                    </tr>
                </thead>
                @foreach ($data as $file)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$file->name}}</td>
                    <td>{{ number_format($file->amount) }}</td>
                    <td>{{ Carbon\Carbon::parse($file->start_date)->format("D, d M Y") }}</td>
                    <td>{{ Carbon\Carbon::parse($file->end_date)->format("D, d M Y") }}</td>
                    <td>
                        <a href="{{ url('/project/source/'.$project.'/'.$file->id) }}" class="btn btn-info"> Project
                            Source</a>
                    </td>
                    <td>
                        <form action="{{ url('project/budget/destroy', $file->id)}}" method="post">
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