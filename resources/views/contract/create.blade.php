@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Contract</h4>
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
      <form method="post" action="{{ route('contract.store') }}">
        @csrf
          <div class="form-group">
              <label for="name">Award:</label>
              <select class="form-control" name="awards_id" id="award">
                <option value="">Choose Award</option>
                @foreach ($awards as $award)
                  <option value="{{$award->id}}">{{$award->process_number}}</option>
                @endforeach
              </select>
          </div>

          <div class="form-group">
              <label for="name">Contract Number:</label>
              <input type="text" class="form-control" name="number" required/>
          </div>

          <div class="form-group">
              <label for="name">Contract Title:</label>
              <input type="text" class="form-control" name="contract_title" required/>
          </div>

          <div class="form-group">
              <label for="name">Contract Scope:</label>
              <textarea class="form-control" name="contract_scope" rows="5"></textarea>
          </div>
          
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                  <label for="start">Start Date:</label>
                  <input type="date" class="form-control" name="start_date" required/>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="end">End Date:</label>
                  <input type="date" class="form-control" name="end_date" required/>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="max_extend_date">Max Extended Date:</label>
                  <input type="date" class="form-control" name="max_extend_date" required/>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="price_local_currency">Price in Local Currency:</label>
                  <input type="text" class="form-control" name="price_local_currency" required/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="price_usd_currency">Price in USD Currency:</label>
                  <input type="text" class="form-control" name="price_usd_currency" required/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="">Supplier Name:</label>
                  <select class="form-control" name="suppliers_id" id="supplier">
                    <option value="">Choose supplier</option>
                    
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
@push('scripts')
  <script>
     $('#award').change(function(){
          var award_id = $(this).val();
          $.ajax({
            type: "GET",
            url: "{{url('/get-supplier')}}/"+award_id,
            success: function (data){
              $('#supplier option:gt(0)').remove();
              $.each(data, function(){
                $("#supplier").append('<option value="'+this.id+'">'+this.offerer.offerer_name+'</option>')
              });
            }
          });
      });
  </script>
@endpush