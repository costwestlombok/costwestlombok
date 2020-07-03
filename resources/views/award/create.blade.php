@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Tender Evaluation/Award</h4>
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
      <form method="post" action="{{ route('award.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="name">Tender Process Name:</label>
              <select class="form-control" name="tender_id" id="tender_id" required>
                <option value="">Choose Tender Process Name</option>
                @foreach ($tenders as $tender)
                    <option value="{{$tender->id}}">{{$tender->project_process_name}}</option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="name">Process Number:</label>
              <input type="text" class="form-control" name="process_number" required/>
          </div>
          <div class="form-group">
              <label for="name">Particpants Number:</label>
              <input type="number" class="form-control" name="participants_number"/>
          </div>
          <div class="form-group">
            <label for="name">Contract Method:</label>
            <select class="form-control" name="contract_method_id" id="contract_method_id">
              <option value="">Choose Method</option>
              @foreach ($contract_methods as $cm)
                  <option value="{{$cm->id}}">{{$cm->method_name}}</option>
              @endforeach
            </select>
        </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Cost Estimation:</label>
                  <input type="text" class="form-control" name="contract_estimate_cost"/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Cost:</label>
                  <input type="text" class="form-control" name="cost"/>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">File - Opening Act:</label>
                  <input type="file" class="form-control" name="opening_act" id="opening_act">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">File Recommendation Report Act:</label>
                  <input type="file" class="form-control" name="recomendation_report_act" id="recomendation_report_act">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">File Award Resolution:</label>
                  <input type="file" class="form-control" name="award_resolution" id="award_resolution">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">File Other:</label>
                  <input type="file" class="form-control" name="others" id="others">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">Publishid At:</label>
                  <input type="date" class="form-control" name="published_at" id="published_at">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="status">Status:</label>
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