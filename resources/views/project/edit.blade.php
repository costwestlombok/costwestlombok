@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Project</h4>
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
      <form method="post" id="form" action="{{ route('project.update', $project->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
          
          <div class="form-group">
              <label for="name">Project Code:</label>
              <input type="text" class="form-control" name="project_code" value="{{$project->project_code}}" required/>
          </div>

          <div class="form-group">
              <label for="name">Purpose:</label>
              <select class="form-control" name="purpose_id" id="purpose_id" required>
                <option value="">Choose purposes</option>
                @foreach ($purposes as $purpose)
                    <option value="{{$purpose->id}}" @if($project->purpose_id == $purpose->id) selected @endif>{{$purpose->purpose_name}}</option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="name">Project Name:</label>
              <input type="text" class="form-control" name="project_title" value="{{$project->project_title}}" required/>
          </div>

          <div class="form-group">
              <label for="name">Project Description:</label>
              <textarea name="project_description" id="project_description" rows="3" class="form-control">{{$project->project_description}}</textarea>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Sector:</label>
                  <select class="form-control" name="" id="sector">
                    <option value="">Choose sector</option>
                    @foreach ($sectors as $sector)
                        <option value="{{$sector->id}}">{{$sector->sector_name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Sub sector:</label>
                  <select class="form-control" name="subsector_id" id="subsector">
                    <option value="">Choose sub sector</option>
                  </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                  <label for="name">Organization/Entity:</label>
                  <select class="form-control" name="" id="entity">
                    <option value="0">Choose entity</option>
                    @foreach ($organizations as $org)
                        <option value="{{$org->id}}">{{$org->name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="name">Unit:</label>
                  <select class="form-control" name="" id="unit">
                    <option value="">Choose unit</option>
                  </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="name">Official:</label>
                  <select class="form-control" name="official_id" id="official">
                    <option value="">Choose Official</option>
                  </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">Budget:</label>
                  <input type="text" class="form-control" name="budget" id="budget" value="{{$project->budget}}" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">SEFIN code:</label>
                  <input type="text" class="form-control" name="code_sefin" value="{{$project->code_sefin}}" id="code_sefin">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Start Date:</label>
                  <input type="date" class="form-control" name="start_date" id="start_date" value="{{$project->start_date}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">End Date:</label>
                  <input type="date" class="form-control" name="end_date" id="end_date" value="{{$project->end_date}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Approved Date:</label>
                  <input type="date" class="form-control" name="date_of_approved" id="date_of_approved" value="{{$project->date_of_approved}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Publication Date:</label>
                  <input type="date" class="form-control" name="date_of_publication" id="date_of_publication" value="{{$project->date_of_publication}}">
              </div>
            </div>
          </div>
          <div class="form-group">
              <label for="name">Environment impact description:</label>
              <textarea name="environment_desc" id="environment_desc" class="form-control" rows="3">{{$project->environment_desc}}</textarea>
          </div>

          <div class="form-group">
              <label for="name">Settlement description:</label>
              <textarea name="settlement_desc" id="settlement_desc" class="form-control" rows="3">{{$project->settlement_desc}}</textarea>
          </div>
          <div class="row">
            <div class="col-md-12">
              {!! $map['js'] !!}
              {!! $map['html'] !!}
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Initial Lat:</label>
                  <input type="text" class="form-control" name="initial_lat" id="initial_lat" value="{{$project->initial_lat}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Inital Lon:</label>
                  <input type="text" class="form-control" name="initial_lon" id="initial_lon" value="{{$project->initial_lon}}">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Final Lat:</label>
                  <input type="text" class="form-control" name="final_lat" id="final_lat" value="{{$project->final_lat}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Final Lon:</label>
                  <input type="text" class="form-control" name="final_lon" id="final_lon" value="{{$project->final_lon}}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Status:</label>
                <select class="form-control" name="status_id" id="status_id">
                  <option value="">Choose status</option>
                  @foreach ($statuses as $status)
                      <option value="{{$status->id}}">{{$status->status_name}}</option>
                  @endforeach
                </select>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="pull-right">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
      </form>
  </div>
</div>
@endsection


@push('scripts')
  <script>
     $('#entity').change(function(){
          var entity_id = $(this).val();
          $.ajax({
            type: "GET",
            url: "{{url('/get-unit')}}/"+entity_id,
            success: function (data){
              $('#unit option:gt(0)').remove();
              $.each(data, function(){
                $("#unit").append('<option value="'+this.id+'">'+this.unit_name+'</option>')
              });
            }
          });
      });

      $('#unit').change(function(){
          var unit_id = $(this).val();
          $.ajax({
            type: "GET",
            url: "{{url('/get-official')}}/"+unit_id,
            success: function (data){
              $('#official option:gt(0)').remove();
              $.each(data, function(){
                $("#official").append('<option value="'+this.id+'">'+this.name+'</option>')
              });
            }
          });
      });

      $('#sector').change(function(){
          var sector_id = $(this).val();
          $.ajax({
            type: "GET",
            url: "{{url('/get-subsector')}}/"+sector_id,
            success: function (data){
              $('#subsector option:gt(0)').remove();
              $.each(data, function(){
                $("#subsector").append('<option value="'+this.id+'">'+this.subsector_name+'</option>')
              });
            }
          });
      });

  </script>
@endpush