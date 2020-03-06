<!-- project managment  -->
@extends('layout_front')

@section('content')

@component('elements.welcome_search')
@endcomponent

	<!--================================PAGE TITLE==========================================-->
		<div class="page-title-wrap bgamarillo padding-top-150 padding-bottom-30"><!-- section title -->
			<h4 class="white">
				<a href="#" id="btn-show-search">
					<i class="icon-circle-down2 position-left"></i>
				</a>
				Ficha del Proyecto
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
					<li><a href="">/ Contrato</a></li>
				</ul>					
			</div>
		</div>		
		<!--/Page Header-->
		
		<!--================================listing SECTION==========================================-->
		
		<!--<section class="aside-layout-section padding-top-70 padding-bottom-40">-->
			<div class="container-fluid"><!-- section container -->
			<div class="row">
				<div class="col-md-9 col-sm-9">
					
					<h4 id="projects" class="p-b-10">
						<i class="icon-circle-right2 position-left"></i> Proyecto
					</h4>
					<div class="row">
						<div class="panel panel-flat">
							<div class="panel-body">
								<div class="col-md-6 col-sm-6">
									<div class="row">
										<div class="col-md-6">Id de Proyecto</div>
										<div class="col-md-6"><?= $project[0]->id ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Código</div>
										<div class="col-md-6"><?= $project[0]->project_code ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Nombre</div>
										<div class="col-md-6"><?= $project[0]->project_name ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Fecha de Publicación</div>
										<div class="col-md-6"></div>
									</div>
									<div class="row">
										<div class="col-md-6">Sector</div>
										<div class="col-md-6"><?= $project[0]->sector_name ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Subsector</div>
										<div class="col-md-6"><?= $project[0]->subsector_name ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Próposito</div>
										<div class="col-md-6"><?= $project[0]->purpose_name ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Latitud inicial</div>
										<div class="col-md-6"><?= $project[0]->initial_lat ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Longitud inicial</div>
										<div class="col-md-6"><?= $project[0]->initial_lon ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Latitud final</div>
										<div class="col-md-6"><?= $project[0]->final_lat ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Longitud final</div>
										<div class="col-md-6"><?= $project[0]->final_lon ?></div>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									
									<div class="row">
										<div class="col-md-6">Descripción de impacto ambiental</div>
										<div class="col-md-6"><?= $project[0]->environment_effect_description ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Descripción de reasentamiento</div>
										<div class="col-md-6"><?= $project[0]->resettlement_description ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Unidad</div>
										<div class="col-md-6"><?= $project[0]->unit_name ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">BIP</div>
										<div class="col-md-6"></div>
									</div>
									<div class="row">
										<div class="col-md-6">Presupuesto</div>
										<div class="col-md-6"><?= $project[0]->project_budget ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Descripción</div>
										<div class="col-md-6"><?= $project[0]->project_description ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">Fecha de aprobación</div>
										<div class="col-md-6"><?= $project[0]->project_budget_approved ?></div>
									</div>
										
								</div>
							</div>
						</div>
					</div>

					<h4 id="tenders" class="p-b-10">
						<i class="icon-circle-right2 position-left"></i> Licitación
					</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-3">Id de Calificación</div>
										<div class="col-md-9"><?= $tender[0]->id ?></div>
									</div>
									<div class="row">
										<div class="col-md-3">Número de calificación</div>
										<div class="col-md-9"><?= $tender[0]->process_number ?></div>
									</div>
									<div class="row">
										<div class="col-md-3">Nombre</div>
										<div class="col-md-9"><?= $tender[0]->process_name ?></div>
									</div>
									<div class="row">
										<div class="col-md-3">Unidad</div>
										<div class="col-md-9"><?= $tender[0]->unit_name ?></div>
									</div>
									<div class="row">
										<div class="col-md-3">Metódo de adquisición</div>
										<div class="col-md-9"><?= $tender[0]->method_name ?></div>
									</div>
									<div class="row">
										<div class="col-md-3">Número de empresas</div>
										<div class="col-md-9"></div>
									</div>
									<div class="row">
										<div class="col-md-3">Fecha de Publicación</div>
										<div class="col-md-9"><?= $tender[0]->created_at ?></div>
									</div>
									<div class="row">
										<div class="col-md-3">Tipo de Contrato</div>
										<div class="col-md-9"><?= $tender[0]->type_name ?></div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h5 class="panel-title">Datos del Funcioario</h5>
												</div>
												<div class="panel-body">
													<div class="row">
														<div class="col-md-6">Nombre</div>
														<div class="col-md-6"></div>
													</div>
													<div class="row">
														<div class="col-md-6">Posición</div>
														<div class="col-md-6"></div>
													</div>
													<div class="row">
														<div class="col-md-6">Correo</div>
														<div class="col-md-6"></div>
													</div>
													<div class="row">
														<div class="col-md-6">Telefono</div>
														<div class="col-md-6"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h5 class="panel-title">Oferentes</h5>
												</div>
												<div class="panel-body">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--<div class="col-md-6">
							<div class="panel panel-flat">
								<div class="panel-body">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-flat">
								<div class="panel-body">
								</div>
							</div>
						</div>-->
					</div>

					<h4 id="awards" class="p-b-10">
						<i class="icon-circle-right2 position-left"></i> Adjudicación
					</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-3">Id Adjudicación</div>
										<div class="col-md-3"><?= $award[0]->id ?></div>
									</div>
									<div class="row">
										<div class="col-md-3">Número de adjudicación</div>
										<div class="col-md-3"><?= $award[0]->process_number ?></div>
									</div>
									<div class="row">
										<div class="col-md-3">Costo estimado</div>
										<div class="col-md-3"><?= $award[0]->contract_estimate_cost ?></div>
									</div>
									<div class="row">
										<div class="col-md-3">Costo del Contrato</div>
										<div class="col-md-3"><?= $award[0]->contract_estimate_cost ?></div>
									</div>
									<div class="row">
										<div class="col-md-3">Metodo de la adjudicación</div>
										<div class="col-md-3"><?= $award[0]->method_name ?></div>
									</div>
									<div class="row">
										<div class="col-md-3">Fecha de Publicación</div>
										<div class="col-md-3"><?= $award[0]->created_at ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<h4 id="contracts" class="p-b-10">
						<i class="icon-circle-right2 position-left"></i> Contratación
					</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-body">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-6">Id de Contratación</div>
											<div class="col-md-6"><?= $contract[0]->id ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Número de Contratación</div>
											<div class="col-md-6"><?= $contract[0]->contract_number ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Duración del contrato</div>
											<div class="col-md-6"><?= $contract[0]->duration ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Nombre</div>
											<div class="col-md-6"><?= $contract[0]->contract_title ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Entidad</div>
											<div class="col-md-6"><?= $contract[0]->organization_name ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Oferente</div>
											<div class="col-md-6"><?= $contract[0]->offerer_name ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Alcance</div>
											<div class="col-md-6"><?= $contract[0]->contract_notes ?></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-6">Costo del contrato</div>
											<div class="col-md-6"><?= $contract[0]->price_local_currency ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Fecha de Inicio</div>
											<div class="col-md-6"><?= $contract[0]->start_date ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Fecha final</div>
											<div class="col-md-6"><?= $contract[0]->end_date ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Costo en L.</div>
											<div class="col-md-6"><?= $contract[0]->price_local_currency ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Costo en USD.</div>
											<div class="col-md-6"><?= $contract[0]->price_usd_currency ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Fecha de Publicación</div>
											<div class="col-md-6"><?= $contract[0]->created_at ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<h4 id="managment" class="p-b-10">
						<i class="icon-circle-right2 position-left"></i> Gestion de contratos
					</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>Justificación</th>
												<th>Id Contrato</th>
												<th>Fecha terminación del contrato</th>
												<th>Alcance del Contrato</th>
												<th>Adendas</th>
												<th>Fecha de modificación</th>
												<th>Número de modificación</th>
												<th>Tipo de modificación</th>
												<th>Precio actualizado en Lps</th>
												<th>Documentos</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					<h4 id="execution" class="p-b-10">
						<i class="icon-circle-right2 position-left"></i> Inicio de Ejecución
					</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h5 class="panel-title">Datos del contacto del proveedor</h5>
												</div>
												<div class="panel-body">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<table class="table">
												<thead>
													<th>Numero</th>
													<th>Descripción</th>
													<th>Monto</th>
													<th>Fecha de desembolso</th>
												</thead>
												<tbody>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<h4 id="advances" class="p-b-10">
						<i class="icon-circle-right2 position-left"></i> Avances
					</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<table class="table">
												<thead>
													<th>%<br>Fisico<br>Progr.</th>
													<th>%<br>Fisico<br>Real</th>
													<th>Finan.<br>Progr.</th>
													<th>Finan.<br>Real</th>
													<th>Fecha<br>Avance</th>
													<th>Fecha<br>Public</th>
													<th>Descr.<br>Problemas</th>
													<th>Descr.<br>Temas</th>
													<th>Doc</th>
													<th>Img</th>
												</thead>
												<tbody>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<h4 id="warranties" class="p-b-10">
						<i class="icon-circle-right2 position-left"></i> Garantías
					</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<table class="table">
												<thead>
													<th>Tipo</th>
													<th>Fecha Vencimiento</th>
													<th>Monto</th>
													<th>Estado</th>
													<th>Fecha de Publicación</th>
												</thead>
												<tbody>
													<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<h4 id="graphs" class="p-b-10">
						<i class="icon-circle-right2 position-left"></i> Graficos
					</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-body">
									<div class="col-md-12">
									</div>
									<div class="col-md-6">
										<div class="panel panel-flat">
											<div class="panel-body">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="panel panel-flat">
											<div class="panel-body">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<h4 id="maps" class="p-b-10">
						<i class="icon-circle-right2 position-left"></i> Mapa
					</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-body">
								</div>
							</div>
						</div>
					</div>

					<h4 id="ending" class="p-b-10">
						<i class="icon-circle-right2 position-left"></i> Finalizaición
					</h4>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-flat">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-3">Id Finalización</div>
										<div class="col-md-9"></div>
									</div>
									<div class="row">
										<div class="col-md-3">Costo Finalización</div>
										<div class="col-md-9"></div>
									</div>
									<div class="row">
										<div class="col-md-3">Alcance Finalización</div>
										<div class="col-md-9"></div>
									</div>
									<div class="row">
										<div class="col-md-3">Fecha Finalización</div>
										<div class="col-md-9"></div>
									</div>
									<div class="row">
										<div class="col-md-3">Razones de cambios en el proyecto</div>
										<div class="col-md-9"></div>
									</div>
									<div class="row">
										<div class="col-md-3">Razones de cambios en el presupuesto</div>
										<div class="col-md-9"></div>
									</div>
									<div class="row">
										<div class="col-md-3">Fecha publicado</div>
										<div class="col-md-9"></div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!-- submenu -->
				<div class="col-md-3 col-sm-3 hidden-xs">
					<div class="panel panel-flat affix-example affix" data-spy="affix" data-offset-top="60">																					
						<ul class="nav navigation no-padding-top">
							<li class="navigation-header">Gestión del Proyecto</li>
							<li><a href="#projects">Proyecto</a></li> 
							<li><a href="#tenders">Licitación</a></li> 
							<li><a href="#awards">Adjudicación</a></li> 
							<li><a href="#contracts">Contrato</a></li> 																
							<li><a href="#managment">Gestión de Contratos</a></li> 
							<li><a href="#execution">Inicio de Ejecución</a></li> 
							<li><a href="#advances">Avances</a></li> 								
							<li><a href="#warranties">Garanntías</a></li>
							<li><a href="#graphs">Graficos</a></li> 								
							<li><a href="#maps">Mapa</a></li>
							<li><a href="#ending">Finalización</a></li>								
							<!--<li><a href="ui_elements.htm#progress">Progress bars</a></li>	
							<li><a href="ui_elements.htm#thumbnails">Thumbnails</a></li>-->
						</ul>															
					</div>						
				</div>
				<!-- end of submenu -->
			</div>
		</div>
		<!--</section>	-->	

	
@stop

@push('scripts')
<script>
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