@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Ammendment</h4>
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
      <form method="post" action="{{ route('ammendment.store') }}" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
              <label for="name">Contract/Engage:</label>
              <select class="form-control" name="engage_id" id="" required>
                <option value="">Choose Contract</option>
                @foreach ($contracts as $contract)
                  <option value="{{$contract->id}}">{{$contract->contract_title}}</option>
                @endforeach
              </select>
          </div>
          
        <div class="form-group">
            <label for="name">Justification:</label>
            <textarea class="form-control" name="justification" rows="5" required></textarea>
        </div>
        

          <div class="form-group">
              <label for="name">Modification Number:</label>
              <input type="text" class="form-control" name="modification_number" required/>
          </div>

          <div class="form-group">
              <label for="name">Modification Type:</label>
              <input type="text" class="form-control" name="modification_type" required/>
          </div>

          
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="current_price">Current Price:</label>
                  <input type="text" class="form-control" name="current_price" required/>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                  <label for="current_contract_scope">Current Contract Scope:</label>
                  <textarea rows="5" class="form-control" name="current_contract_scope"></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="">Date of Publication:</label>
                  <input type="date" name="date_of_publication" class="form-control">
                  </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="">Adendum File:</label>
                  <input type="file" name="adendum" class="form-control">
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