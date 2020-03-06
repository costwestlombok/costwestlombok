@extends('layout_front')

@push('styles')
	<link type="text/css" rel="stylesheet" href="{{asset('css/fab.css')}}">
@endpush

@section('content')

@component('elements.welcome_search')
@endcomponent

<!--================================PAGE TITLE==========================================-->
	<div class="page-title-wrap bgamarillo padding-top-150 padding-bottom-30"><!-- section title -->
	    <h4 class="white">
				<a href="#" id="btn-show-search">
					<i class="icon-circle-down2 position-left"></i>
				</a>
				Módulo ciudadano
		</h4>
	</div><!-- section title end -->
	<!--Page Header-->
	<div class="header">
		<div class="header-content">
			<!--<div class="page-title"><i class="icon-display4"></i> Dashboard</div>-->
			<ul class="breadcrumb">
				<li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
				<li><a href="">/ Módulo Ciudadano</a></li>
				<li><a href="">/ Proyecto</a></li>
			</ul>					
		</div>
	</div>		
	<!--/Page Header-->


  <!--<section class="aside-layout-section padding-top-70 padding-bottom-40">-->
      <div class="container-fluid"><!-- section container -->
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-default no-margin-bottom no-border-bottom">
						<div class="panel-heading">
							<h3 class="panel-title">@lang('labels.project') : <?= $data[0]->project_code ?></h3>						
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 text-right">
									<!--<button class="btn btn-default">Assign</button>	-->									
									<!--<button class="btn btn-default">Submit ticket</button>
									<button class="btn btn-success">Start project</button>
									<button class="btn btn-danger">Cancel project</button>-->
								</div>
							</div>								
							
							<div class="row m-t-20">
								<div class="col-md-12">
									<h4><?= $data[0]->project_name ?></h4>
									<p>
										<?php echo $data[0]->project_description; ?>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-flat no-margin-top no-margin-bottom no-border-bottom">
						<div class="panel-heading">
							<h4 class="panel-title">Archivos</h4>						
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-1 col-xs-2">
									<i class="icon-file-pdf icon-2x m-t-5"></i>
								</div>									
								<div class="col-md-7 col-xs-5">
									<div class="no-padding no-margin"><?= $data[0]->project_code; ?>.pdf
										<!--<small class="display-block">14MB</small>-->
									</div>
								</div>									
								<div class="col-md-4 col-xs-5 text-right">
									<!--<button class="btn btn-default btn-xs"><i class="icon-eye2 position-left"></i>View</button>-->
									<a class="btn btn-default btn-xs" href="{{ asset('docs/test_file.pdf') }}" target="_blank">
										<i class="icon-download4 position-left"></i>Descargar
									</a>
								</div>
							</div>							
							<hr>
							<!--<form enctype="multipart/form-data" class="m-t-20">
								<div class="form-group no-margin-bottom">
									<input id="file-4" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#">
								</div>
							</form>-->
						</div>
					</div>
					<?php /* ?>
					<div class="panel panel-flat no-margin-top">
						<div class="panel-heading">
							<h4 class="panel-title"></h4>						
						</div>
						<div class="panel-body">
							<div class="media">
								<div class="media-left">
									<!--<a href="projects_details.htm#"><img src="{{ asset('assets/images/faces/face9.png') }}" class="img-circle" alt=""></a>-->
								</div>

								<div class="media-body">
									<h6 class="media-heading">Marilyn Romero<span class="media-annotation pull-right">2 hours ago</span></h6>
									Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.

									<!--<ul class="list-inline m-t-5">												
										<li><a href="projects_details.htm#"><i class="icon-reply text-success position-left"></i>Reply</a></li>
										<li><a href="projects_details.htm#"><i class="icon-pencil6 text-danger position-left"></i>Edit</a></li>
									</ul>-->
								</div>
							</div>

							<div class="media">
								<div class="media-left">
									<!--<a href="projects_details.htm#"><img src="{{ asset('assets/images/faces/face6.png') }}" class="img-circle" alt=""></a>-->
								</div>

								<div class="media-body">
									<h6 class="media-heading">Jonaly Smith<span class="media-annotation pull-right">1 day ago</span></h6>
									Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. 

									
								</div>
							</div>
							
							
						</div>
					</div>
					<?php */ ?>
				</div>
				
				<div class="col-md-4">
					<div class="panel panel-flat">							
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<h6 class="no-margin"></h6>
									<div class="row">
										<div class="chart m-t-20" id="google-pie1"></div>
									</div>
								</div>
							</div>
							<hr>

							<div class="row">
								<div class="col-md-12">
									<!--<h6 class="no-margin">Contrato #<?= $data[0]->id ?></h6>
									<div class="row">
									</div>-->
									<div class="panel panel-default">
										<div class="panel-heading">
											<h5 class="panel-title"></h5>
										</div>
										<div class="panel-body">
											<h6 class="no-margin text-center">Monto de cada contrato</h6>
											<table class="table table-borderd">
												<thead>
													<th>Num Contrato</th>
													<th>Monto en L.</th>
												</thead>
												<tbody>
													<tr>
														<td><?= $data[0]->project_code ?></td>
														<td><?= $data[0]->project_budget ?></td>
													</tr>
												</tbody>
											</table>
											<hr>
											<h6 class="no-margin text-center">Indicadores de Proceso</h6>
											<table class="table table-borderd">
												<thead>
													<th>Indicador</th>
													<th>Valor</th>
												</thead>
												<tbody>
													<tr>
														<td></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<hr>

							
							<div class="row">
								<div class="col-md-12">
									<!--<h6 class="no-margin">Contrato #<?= $data[0]->id ?></h6>
									<div class="row">
									</div>-->
									<?php 
									if (count($contracts) > 0):
										foreach( $contracts  as $cs ):
									?>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h5 class="panel-title">Contrato #<?= $cs->process_number ?></h5>
										</div>
										<div class="panel-body">
											<h6 class="no-margin">Nombre</h6>
											<p><?= $cs->process_name ?></p>

											<hr>
											<div class="text-center">
												<table class="table table-borderd">
													<tr>
														<td>Fecha de Inicio</td>
														<td>Fecha Final</td>
														<td>Duración</td>
													</tr>
													<tr>
														<td><?= $cs->start_date ?></td>
														<td><?= $cs->end_date ?></td>
														<td><?= $cs->duration ?></td>
													</tr>
												</table>
											</div>
											<hr>
											<h6 class="no-margin">Alcances</h6>
											<p><?= $cs->contract_scope ?></p>

											<hr>
											<div class="row">
												<div class="col-md-5">Metodo</div>
												<div class="col-md-7"><?= $cs->method_name ?></div>
												<div class="col-md-5">Oferente</div>
												<div class="col-md-7"><?= $cs->offerer_name ?></div>
											</div>
											
											<hr>
											<div class="text-center">
												<a href="{{ route('transparency.project_managment', ['project' => $project_code, 'track_engage' => $cs->track_engage] ) }}" class="btn btn-warning">Ver Ficha*</a>
											</div>
										</div>
									</div>
									<?php 
										endforeach;
									endif;
									?>
								</div>
							</div>
							

							<?php /* ?>
							<div class="row">
								<div class="col-md-12">
									<!--<h6 class="no-margin">Contrato #<?= $data[0]->id ?></h6>
									<div class="row">
									</div>-->
									<?php 
									if (count($contracts) > 0):
										foreach( $contracts  as $cs ):
									?>
									<div class="panel panel-default">
										<div class="panel-heading">
											<h5 class="panel-title">Contrato #<?= $cs['process_number'] ?></h5>
										</div>
										<div class="panel-body">
											<h6 class="no-margin">Nombre</h6>
											<p><?= $cs['process_name'] ?></p>

											<hr>
											<div class="text-center">
												<table class="table">
													<tr>
														<td>Fecha de Inicio</td>
														<td>Fecha Final</td>
														<td>Duración</td>
													</tr>
												</table>
											</div>
											
											<hr>
											<div class="text-center">
												<a href="{{ route('temporal.project_managment' ) }}" class="btn btn-warning">Ver Ficha</a>
											</div>
										</div>
									</div>
									<?php 
										endforeach;
									endif;
									?>
								</div>
							</div>
							<?php */ ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--</section>-->
@stop

@push('scripts')
	<script src="https://www.google.com/jsapi"></script>
	<!--<script src="{{ asset('js/pages/dashboard_analytics.js') }}"></script>-->
	<script>
		// Pie chart
		// ------------------------------
		// Initialize chart
		google.load("visualization", "1", {packages:["corechart"]});
		google.setOnLoadCallback(drawPie);

		// Chart settings    
		function drawPie() {

		    // Data
		    var data = google.visualization.arrayToDataTable([
		        ['Channel', 'Visitors'],
		        ['Pendiente',     0],
		        ['Inversion',      100]
		    ]);

		    //data.addColumn('string', 'status');
      		//data.addColumn('number', 'value');

		    // Options
		    var options_pie = {
		        fontName: 'open_sansregular',
		        height: 150,
		        chartArea: {
		            left: 0,
		            width: '100%',
		            height: '100%'
		        }
		    };
		    // Instantiate and draw our chart, passing in some options.
		    var pie = new google.visualization.PieChart($('#google-pie1')[0]);
		    pie.draw(data, options_pie);
		    //var pie = new google.visualization.PieChart(document.getElementById('google-pie1'));
      		//pie.draw(data, {width: 400, height: 240});
		}

		// Search
		var showSearch = false;
		$(document).ready(function(){
			$("#section-search").slideUp();

			$("#btn-show-search").on('click', function(){
				if ( !showSearch ){
					$("#btn-show-search > i").removeClass('icon-circle-down2').addClass('icon-circle-up2');
					$("#section-title").removeClass('padding-top-150').addClass('padding-top-30');
					$("#section-search").slideDown();
					showSearch = true;
				}else{
					$("#btn-show-search > i").removeClass('icon-circle-up2').addClass('icon-circle-down2');
					$("#section-title").removeClass('padding-top-30').addClass('padding-top-150');
					$("#section-search").slideUp();
					showSearch = false;
				}

			});
		});
	</script>
@endpush

