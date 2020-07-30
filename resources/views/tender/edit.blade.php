@extends('layout')

@section('content')
<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Tender</h4>
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
      <form method="post" action="{{ route('tender.update', $tender->id) }}" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">Project:</label>
                  <select class="form-control" name="project_id" id="projects_id">
                    <option value="">Choose project</option>
                    @foreach ($projects as $project)
                      <option value="{{$project->id}}" @if($project->id == $tender->project_id) selected @endif>{{$project->project_title}}</option>                        
                    @endforeach
                  </select>
              </div>
            </div>
          </div>

          <div class="form-group">
              <label for="name">Prosess Number:</label>
              <input type="text" class="form-control" name="process_number" value="{{$tender->process_number}}"/>
          </div>

          <div class="form-group">
              <label for="name">Process Name:</label>
              <input type="text" class="form-control" name="project_process_name" value="{{$tender->project_process_name}}"/>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                  <label for="name">Organization/Entity:</label>
                  <select class="form-control" name="" id="entity">
                    <option value="0">Choose entity</option>
                    @foreach ($organizations as $org)
                        <option value="{{$org->id}}" @if($org->id == $tender->official->unit->org->id) selected @endif>{{$org->name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="name">Unit:</label>
                  <select class="form-control" name="" id="unit">
                    <option value="" >Choose unit</option>
                    @foreach ($units as $unit)
                        <option value="{{$unit->id}}" @if($unit->id == $tender->official->unit->id) selected @endif>{{$unit->unit_name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="name">Official:</label>
                  <select class="form-control" name="official_id" id="official">
                    <option value="">Choose Official</option>
                    @foreach ($officials as $official)
                        <option value="{{$official->id}}" @if($official->id == $tender->official_id) selected @endif>{{$official->name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Contract type:</label>
                  <select class="form-control" name="contract_type_id" id="contract_type_id">
                    <option value="0">Choose contract type</option>
                    @foreach ($contract_types as $ct)
                        <option value="{{$ct->id}}" @if($ct->id == $tender->contract_type_id) selected @endif>{{$ct->type_name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Tender method:</label>
                  <select class="form-control" name="tender_method_id" id="tender_method_id">
                    <option value="">Choose a tender method</option>
                    @foreach ($tender_methods as $tm)
                        <option value="{{$tm->id}}" @if($tm->id == $tender->tender_method_id) selected @endif>{{$tm->method_name}}</option>
                    @endforeach
                  </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Start Date</label>
                <input type="date" name="start_date" class="form-control" value="{{ date_format(Carbon\Carbon::parse($tender->start_date), 'm-d-Y') }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>End Date</label>
                <input type="date" name="end_date" class="form-control" value="{{ date_format(Carbon\Carbon::parse($tender->end_date), 'm-d-Y') }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Max Extended Date</label>
                <input type="date" name="max_extended_process" class="form-control" value="{{ date_format(Carbon\Carbon::parse($tender->max_extended_process), 'm-d-Y') }}">
              </div>
            </div>
          </div>
          
          <div class="form-group">
              <label for="name">Tender Amount:</label>
              <input type="text" class="form-control" name="amount" value="{{ number_format($tender->amount) }}"/>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">File Evaluation Process:</label>
                  <input type="file" class="form-control" name="evaluation_process" id="evaluation_process">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">File International Invitation:</label>
                  <input type="file" class="form-control" name="international_invitation" id="international_invitation">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">File Basement:</label>
                  <input type="file" class="form-control" name="basement" id="basement">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">File Resolution:</label>
                  <input type="file" class="form-control" name="resolution" id="resolution">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">File Convocation:</label>
                  <input type="file" class="form-control" name="convocation" id="convocation">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">File TDR:</label>
                  <input type="file" class="form-control" name="tdr" id="tdr">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">File Clarification:</label>
                  <input type="file" class="form-control" name="clarification" id="clarification">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">File Acceptance Certificate:</label>
                  <input type="file" class="form-control" name="acceptance_certificate" id="acceptance_certificate">
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
                      <option value="{{$status->id}}" @if($status->id == $tender->status_id) selected @endif>{{$status->status_name}}</option>
                  @endforeach
                </select>
            </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Tender Status:</label>
                <select class="form-control" name="tender_status_id">
                  <option value="">Choose tender status</option>
                  @foreach ($tender_statuses as $t_status)
                      <option value="{{$t_status->id}}" @if($t_status->id == $tender->tender_status_id) selected @endif>{{$t_status->status_name}}</option>
                  @endforeach
                </select>
            </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">Date of Publication:</label>
                  <input type="date" class="form-control" name="date_of_publication" id="date_of_publication" value="{{ date_format(Carbon\Carbon::parse($tender->date_of_publication), 'm-d-Y') }}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="pull-right">
                  <button type="submit" class="btn btn-primary">Update</button>
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
  </script>
@endpush