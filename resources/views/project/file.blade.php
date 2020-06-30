@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Add Project File</h4>
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
      <form method="post" id="form" action="{{ url('/project/file-store') }}" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
          @csrf
          <input type="hidden" value="{{$project}}" name="project_id">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Document Name:</label>
                  <input type="text" name="document_name" class="form-control">
              </div>
              <div class="form-group">
                <label for="name">Description:</label>
                <textarea name="document_description" rows="5" class="form-control"></textarea>
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Author Name:</label>
                    <input type="text" name="author" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Date of Publication:</label>
                    <input type="date" name="date_of_publication" class="form-control" value="{{date('m-d-Y')}}">
                </div>
                <div class="form-group">
                    <label for="name">File:</label>
                    <input type="file" name="file" class="form-control">
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
                        <th data-hide="phone, tablet">#</th>
                        <th data-toggle="true">File Name</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Actions</th>
                        <th data-hide="phone, tablet"></th>
                    </tr>
                </thead>
                    @foreach ($data as $file)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$file->document_name}}</td>
                            <td>{{$file->author}}</td>
                            <td>{{$file->document_description}}</td>
                            <td>
                                <a href="{{ url('/storage/'.$file->document_path) }}" target="_blank"><i class="icon-file-download"></i> Download file</a>
                            </td>
                            <td>
                                <form action="{{ url('project/file/destroy', $file->id)}}" method="post">
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