@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">Evaluación de Ofertas/Adjudicación</h4>
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
      <form method="post" action="{{ route('award.store') }}">


          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
          <div class="form-group">
              <label for="name">Invitación y calificación:</label>
              <select class="form-control" name="tenders_id" id="tenders_id">
                <option value="0">Elija invitación</option>
                <?php 
                      if (count($tenders) > 0):
                        foreach ($tenders as $tender): 
                ?>
                      <option value="<?= $tender['id'] ?>"><?= $tender['process_name'] ?></option>
                <?php 
                        endforeach; 
                      endif;
                ?>
              </select>
          </div>

          <div class="form-group">
              <label for="name">Numero de proceso:</label>
              <input type="text" class="form-control" name="process_number"/>
          </div>

          <div class="form-group">
              <label for="name">Costo estimado del contrato:</label>
              <input type="text" class="form-control" name="contract_estimate_cost"/>
          </div>

          <div class="form-group">
              <label for="name">Número de participantes:</label>
              <input type="text" class="form-control" name="participants_number"/>
          </div>

          

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Metodo de calificación:</label>
                  <select class="form-control" name="tendermethods_id" id="tendermethods_id">
                    <option value="0">Elija un metodo</option>
                    <?php 
                          if (count($tendermethods) > 0):
                            foreach ($tendermethods as $method): 
                    ?>
                          <option value="<?= $method['id'] ?>"><?= $method['method_name'] ?></option>
                    <?php 
                            endforeach; 
                          endif;
                    ?>
                  </select>
              </div>
            </div>
          </div>

          


          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">file 1:</label>
                  <input type="file" class="form-control" name="resettlement_description" id="resettlement_description">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">file 2:</label>
                  <input type="file" class="form-control" name="resettlement_description" id="resettlement_description">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">file 3:</label>
                  <input type="file" class="form-control" name="resettlement_description" id="resettlement_description">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">file 4:</label>
                  <input type="file" class="form-control" name="resettlement_description" id="resettlement_description">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="">Status:</label>
                  <select class="form-control" name="status" id="status">
                    <option value="0">Choose status</option>
                    <?php 
                          if (count($status) > 0):
                            foreach ($status as $stat): 
                    ?>
                          <option value="<?= $stat['id'] ?>"><?= $stat['status_name'] ?></option>
                    <?php 
                            endforeach; 
                          endif;
                    ?>
                  </select>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>
@endsection