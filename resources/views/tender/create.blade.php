@extends('layout')

@section('content')


<div class="panel panel-flat">
  <div class="panel-heading">
    <h4 class="panel-title">@lang('labels.tender')</h4>
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
      <form method="post" action="{{ route('tender.store') }}">


          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Project:</label>
                  <select class="form-control" name="projects_id" id="projects_id">
                    <option value="0">Choose project</option>
                    <?php 
                          if (count($projects) > 0):
                            foreach ($projects as $proj): 
                             if ( $projectID == $proj['id'] ){ 
                    ?>
                          <option value="<?= $proj['id'] ?>" selected><?= $proj['project_name'] ?></option>
                    <?php }else{ ?>
                          <option value="<?= $proj['id'] ?>"><?= $proj['project_name'] ?></option>
                    <?php 
                          }
                            endforeach; 
                          endif;
                    ?>
                  </select>
              </div>
            </div>
          </div>

          <div class="form-group">
              <label for="name">@lang('process_number'):</label>
              <input type="text" class="form-control" name="process_number"/>
          </div>

          <div class="form-group">
              <label for="name">@lang('process_name'):</label>
              <input type="text" class="form-control" name="process_name"/>
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Entity:</label>
                  <select class="form-control" name="organizations_id" id="organizations_id">
                    <option value="0">Choose entity</option>
                    <?php 
                          if (count($organizations) > 0):
                            foreach ($organizations as $org): 
                    ?>
                          <option value="<?= $org['id'] ?>"><?= $org['organization_name'] ?></option>
                    <?php 
                            endforeach; 
                          endif;
                    ?>
                  </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Unit:</label>
                  <select class="form-control" name="units_id" id="units_id">
                    <option value="0">Choose unit</option>
                  </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Official:</label>
                  <select class="form-control" name="officials_id" id="officials_id">
                    <option value="0">Choose Official</option>
                  </select>
              </div>
            </div>
            <!--<div class="col-md-6">
              <div class="form-group">
                  <label for="name">Unit:</label>
                  <select class="form-control" name="units_id" id="units_id">
                    <option value="0">Choose unit</option>
                  </select>
              </div>
            </div>-->
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Contract type:</label>
                  <select class="form-control" name="contract_types_id" id="contract_types_id">
                    <option value="0">Choose contract type</option>
                    <?php 
                          if (count($contracttypes) > 0):
                            foreach ($contracttypes as $type): 
                    ?>
                          <option value="<?= $type['id'] ?>"><?= $type['type_name'] ?></option>
                    <?php 
                            endforeach; 
                          endif;
                    ?>
                  </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Tender method:</label>
                  <select class="form-control" name="tender_methods_id" id="tender_methods_id">
                    <option value="0">Choose a tender method</option>
                    <?php 
                          if (count($methods) > 0):
                            foreach ($methods as $method): 
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
                  <label for="name">file 5:</label>
                  <input type="file" class="form-control" name="resettlement_description" id="resettlement_description">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">file 6:</label>
                  <input type="file" class="form-control" name="resettlement_description" id="resettlement_description">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">file 7:</label>
                  <input type="file" class="form-control" name="resettlement_description" id="resettlement_description">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">file 8:</label>
                  <input type="file" class="form-control" name="resettlement_description" id="resettlement_description">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="name">file 9:</label>
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