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
      <form method="post" action="{{ route('project.store') }}">


          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
          <div class="form-group">
              <label for="name">Code:</label>
              <input type="text" class="form-control" name="project_code"/>
          </div>

          <div class="form-group">
              <label for="name">Purpose:</label>
              <select class="form-control" name="purposes_id" id="purposes_id">
                <option value="0">Choose purposes</option>
                <?php 
                      if (count($purposes) > 0):
                        foreach ($purposes as $purpose): 
                ?>
                      <option value="<?= $purpose['id'] ?>"><?= $purpose['purpose_name'] ?></option>
                <?php 
                        endforeach; 
                      endif;
                ?>
              </select>
          </div>

          <div class="form-group">
              <label for="name">Project Name:</label>
              <input type="text" class="form-control" name="project_name"/>
          </div>

          <div class="form-group">
              <label for="name">Project Description:</label>
              <input type="text" class="form-control" name="project_description"/>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Sector:</label>
                  <select class="form-control" name="sectors_id" id="sectors_id">
                    <option value="0">Choose sector</option>
                    <?php 
                          if (count($sectors) > 0):
                            foreach ($sectors as $sector): 
                    ?>
                          <option value="<?= $sector['id'] ?>"><?= $sector['sector_name'] ?></option>
                    <?php 
                            endforeach; 
                          endif;
                    ?>
                  </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Sub sector:</label>
                  <select class="form-control" name="subsectors_id" id="subsectors_id">
                    <option value="0">Choose sub sector</option>
                  </select>
              </div>
            </div>
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
                  <label for="name">Budget:</label>
                  <input type="text" class="form-control" name="budget" id="budget">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Unit:</label>
                  <input type="text" class="form-control" name="budget" id="budget">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">SEFIN code:</label>
                  <input type="text" class="form-control" name="project_code_sefin" id="project_code_sefin">
              </div>
            </div>
          </div>

          <div class="form-group">
              <label for="name">Environment impact description:</label>
              <input type="text" class="form-control" name="environment_description" id="environment_description">
          </div>

          <div class="form-group">
              <label for="name">Resettlement description:</label>
              <input type="text" class="form-control" name="resettlement_description" id="resettlement_description">
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Initial Lat:</label>
                  <input type="text" class="form-control" name="initial_lat" id="initial_lat">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Inital Lon:</label>
                  <input type="text" class="form-control" name="initial_lon" id="initial_lon">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Final Lat:</label>
                  <input type="text" class="form-control" name="final_lat" id="final_lat">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="name">Final Lon:</label>
                  <input type="text" class="form-control" name="final_lon" id="final_lon">
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