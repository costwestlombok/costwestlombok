@extends('layout')

@section('content')

	<!--<div class="row">
		<div class="col-md-4">
			<div class="panel panel-flat">
				<div class="panel-body m-t-10 text-center">
					<div class="digit-huge">17</div>
					<h3 class="m-b-20">Proyectos activos</h3>
					
					<div class="progress m-b-10">
						<div class="progress-bar progress-bar-danger progress-bar-striped active" style="width: 45%">
							<span>45%</span>
						</div>

						<div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 30%">
							<span>30%</span>
						</div>

						<div class="progress-bar progress-bar-info progress-bar-striped active" style="width: 25%">
							<span>25%</span>
						</div>
					</div>
					
					<span class="label label-danger">Proceso</span>
					<span class="label label-success">Por comenzar</span>
					<span class="label label-info">Finalizando</span>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-flat bg-blue-darkest">
						<div class="panel-heading p-5">
							<h6 class="panel-title">Presupuestos</h6>						
						</div>
						<div>
							<div class="chart" id="google-area"></div>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="panel panel-flat bg-teal-darkest">
						<div class="panel-heading p-5">
							<h6 class="panel-title">Desembolsos</h6>						
						</div>
						<div>
							<div class="chart" id="google-column-bounce"></div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<div class="col-md-8">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Ejecución</h5>						
				</div>
				<div class="panel-body">
					<div class="chart" id="google-column"></div>
				</div>
			</div>												
		</div>
	</div>-->

	<!-- tables -->
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Planificación</h5>						
				</div>									
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Proyectos</th>
								<th>Presupuesto</th>														
							</tr>
						</thead>
						<tbody>
							<?php 
							if (count($projects) > 0):
								foreach ($projects as $row):
							?>
							<tr>
								<td><?= $row->id ?></td>
								<td><?= $row->project_code ?></td>
								<td><?= number_format($row->project_budget) ?></td>
							</tr>
							<?php 
								endforeach;
							endif;
							?>
							<!--<tr>
								<td>2</td>
								<td>admin dashboard</td>
								<td>646</td>											
							</tr>
							<tr>
								<td>3</td>
								<td>web app kit</td>
								<td>352</td>											
							</tr>
							<tr>
								<td>4</td>
								<td>responsive design</td>
								<td>764</td>												
							</tr>
							<tr>
								<td>5</td>
								<td>backend application</td>
								<td>342</td>													
							</tr>
							<tr>
								<td>6</td>
								<td>admin dashboard</td>
								<td>627</td>											
							</tr>
							<tr>
								<td>7</td>
								<td>html admin</td>
								<td>24</td>											
							</tr>
							<tr>
								<td>8</td>
								<td>jquery plugins</td>
								<td>534</td>												
							</tr>-->
						</tbody>
					</table>
				</div>								
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Calificación</h5>						
				</div>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="col-md-1">#</th>
								<th>Proyecto</th>
								<th class="col-md-2">Oferentes</th>
								<th class="col-md-1"></th>														
							</tr>
						</thead>
						<tbody>
							<!--<tr>
								<td>1</td>
								<td>index.html</td>
								<td>14%</td>
								<td>521</td>											
							</tr>
							<tr>
								<td>2</td>
								<td>user_profile.html</td>
								<td>9%</td>
								<td>646</td>											
							</tr>
							<tr>
								<td>3</td>
								<td>application_dashboard.html</td>
								<td>6%</td>
								<td>352</td>											
							</tr>
							<tr>
								<td>4</td>
								<td>content_search.html</td>
								<td>11%</td>
								<td>764</td>												
							</tr>
							<tr>
								<td>5</td>
								<td>submit_form.html</td>
								<td>6%</td>
								<td>342</td>													
							</tr>
							<tr>
								<td>6</td>
								<td>components.html</td>
								<td>19%</td>
								<td>627</td>											
							</tr>
							<tr>
								<td>7</td>
								<td>404.html</td>
								<td>2%</td>
								<td>24</td>											
							</tr>
							<tr>
								<td>8</td>
								<td>website_offline.html</td>
								<td>2%</td>
								<td>534</td>												
							</tr>-->
						</tbody>
					</table>
				</div>	
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Contratación</h5>						
				</div>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="col-md-1">#</th>
								<th>Proyecto</th>
								<th class="col-md-2">Avance</th>
								<th class="col-md-1">Desembolsos</th>														
							</tr>
						</thead>
						<tbody>
							<!--<tr>
								<td>1</td>
								<td>index.html</td>
								<td>14%</td>
								<td>521</td>											
							</tr>
							<tr>
								<td>2</td>
								<td>user_profile.html</td>
								<td>9%</td>
								<td>646</td>											
							</tr>
							<tr>
								<td>3</td>
								<td>application_dashboard.html</td>
								<td>6%</td>
								<td>352</td>											
							</tr>
							<tr>
								<td>4</td>
								<td>content_search.html</td>
								<td>11%</td>
								<td>764</td>												
							</tr>
							<tr>
								<td>5</td>
								<td>submit_form.html</td>
								<td>6%</td>
								<td>342</td>													
							</tr>
							<tr>
								<td>6</td>
								<td>components.html</td>
								<td>19%</td>
								<td>627</td>											
							</tr>
							<tr>
								<td>7</td>
								<td>404.html</td>
								<td>2%</td>
								<td>24</td>											
							</tr>
							<tr>
								<td>8</td>
								<td>website_offline.html</td>
								<td>2%</td>
								<td>534</td>												
							</tr>-->
						</tbody>
					</table>
				</div>	
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	@parent

	<script src="{{ asset('js/pages/dashboard_analytics.js') }}"></script>
@endsection
