@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Progress</h4>
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
      <form method="post" action="{{ route('progress.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Project:</label>
            <select class="form-control" name="project_id" id="" required>
            <option value="">Choose project</option>
            @foreach ($projects as $project)
                <option value="{{$project->id}}">{{$project->project_title}}</option>
            @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Physical Program (%):</label>
                    <input type="number" step="0.01" name="programmed_percent" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Real Physical (%):</label>
                    <input type="number" step="0.01" name="real_percent" class="form-control">
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Scheduled Finance:</label>
                    <input type="text" name="scheduled_financing" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Real Finance:</label>
                    <input type="text" name="real_financing" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="name">Description of Problems:</label>
            <textarea name="description_problems" rows="5" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="name">Description of Theme/Issues:</label>
            <textarea name="description_issues" rows="5" class="form-control"></textarea>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Advance Date:</label>
                    <input type="date" name="date_of_advance" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Publication Date:</label>
                    <input type="date" name="date_of_publication" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Guaranties File:</label>
                    <input type="file" name="guaranties_doc" class="form-control">
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Advance File:</label>
                    <input type="file" name="advance_doc" class="form-control">
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Status:</label>
                    <select class="form-control" name="status_id">
                    <option value="">Choose status</option>
                    @foreach ($status as $stat)
                        <option value="{{$stat->id}}">{{$stat->status_name}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
  </div>
</div>
@endsection