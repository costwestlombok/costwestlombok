@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Execution</h4>
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
      <form method="post" action="{{ route('execution.store') }}">
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
            <label for="name">Price:</label>
            <input type="text" name="varprice" class="form-control">
        </div>
        

          <div class="form-group">
              <label for="name">Start Date:</label>
              <input type="date" class="form-control" name="start_date" />
          </div>

          <div class="form-group">
              <label for="name">Program:</label>
              <input type="text" class="form-control" name="program" />
          </div>
          <div class="form-group">
            <label for="name">Contract State:</label>
            <textarea name="contract_state" rows="10" class="form-control"></textarea>
        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="current_price">Contact:</label>
                  <select name="contact_id" class="form-control" id="">
                      @foreach ($contacts as $contact)
                          <option value="{{$contact->id}}">{{$contact->name}}</option>
                      @endforeach
                  </select>
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