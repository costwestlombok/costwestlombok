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
					<h5 class="panel-title">Perencanaan</h5>						
				</div>									
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Kode Proyek</th>
								<th>Nama Proyek</th>
								<th>Anggaran</th>														
							</tr>
						</thead>
						<tbody>
							@if (count($projects) > 0)
								@foreach ($projects as $row)
							<tr>
								<td>{{$loop->index+1}}</td>
								<td><?= $row->project_code ?></td>
								<td>{{$row->project_title}}</td>
								<td><?= number_format($row->budget) ?></td>
							</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>								
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Kualifikasi</h5>						
				</div>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="col-md-1">#</th>
								<th>Proyek</th>
								<th class="col-md-2">Penawar</th>
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
							-->
						</tbody>
					</table>
				</div>	
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Kontrak</h5>						
				</div>
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="col-md-1">#</th>
								<th>Proyek</th>
								<th class="col-md-2">Proses</th>
								<th class="col-md-1">Pencairan</th>														
							</tr>
						</thead>
						<tbody>
							<!--<tr>
								<td>1</td>
								<td>index.html</td>
								<td>14%</td>
								<td>521</td>											
							</tr>
							-->
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
