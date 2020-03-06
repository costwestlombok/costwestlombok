<!-- project managment  -->
@extends('layout_front')

@push('styles')
	
  <link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">
	<style>
	td.details-control {
	    background: url('../../../../images/resources/datatables/details_open.png') no-repeat center center;
	    cursor: pointer;
	}
	tr.shown td.details-control {
	    background: url('../../../../images/resources/datatables/details_close.png') no-repeat center center;
	}


	.container {
	  /*margin-top : 15px;*/
	  
	  .details-row {
	    td {
	      padding : 0;
	      margin  : 0;
	    }
	  }
	}

	/*.details-container {
	  width            : 100%;
	  height           : 100%;
	  background-color : #FFF;
	  padding-top      : 5px;
	}

	.details-table {
	  width            : 100%;
	  background-color : #FFF;
	  margin           : 5px;
	}
	  
	.title {
	  font-weight : bold;
	}

	.iconSettings {
	  margin-top    : 5px;
	  margin-bottom : 10px;
	  font-size     : 12px;
	  position      : relative;
	  top           : 1px;
	  display       : inline-block;
	  font-family   : 'Glyphicons Halflings';
	  font-style    : normal;
	  font-weight   : 400;
	  line-height   : 1;
	  -webkit-font-smoothing : antialiased;
	}

	td.details-control {
	  cursor     : pointer;
	  text-align : center;
	  
	  &:before {
	    @extend .iconSettings;
	    content : '\2b';
	  }
	}

	tr.shown td.details-control {
	  &:before {
	    @extend .iconSettings;
	    content : '\2212';
	  }
	}*/

	</style>
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
											<div class="col-md-6"><?= $engage[0]->id ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Número de Contratación</div>
											<div class="col-md-6"><?= $engage[0]->contract_number ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Duración del contrato</div>
											<div class="col-md-6"><?= $engage[0]->duration ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Nombre</div>
											<div class="col-md-6"><?= $engage[0]->contract_title ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Entidad</div>
											<div class="col-md-6"><?= $engage[0]->organization_name ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Oferente</div>
											<div class="col-md-6"><?= $engage[0]->offerer_name ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Alcance</div>
											<div class="col-md-6"><?= $engage[0]->contract_scope ?></div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-6">Costo del contrato</div>
											<div class="col-md-6"><?= $engage[0]->price_local_currency ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Fecha de Inicio</div>
											<div class="col-md-6"><?= $engage[0]->start_date ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Fecha final</div>
											<div class="col-md-6"><?= $engage[0]->end_date ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Costo en L.</div>
											<div class="col-md-6"><?= $engage[0]->price_local_currency ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Costo en USD.</div>
											<div class="col-md-6"><?= $engage[0]->price_usd_currency ?></div>
										</div>
										<div class="row">
											<div class="col-md-6">Fecha de Publicación</div>
											<div class="col-md-6"><?= $engage[0]->published_at ?></div>
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
									<table class="table datatables-contracts">
										<thead>
											<tr>
												<th></th>
												<th>ID de Contrato</th>
												<th>alcane</th>
												<th>Fecha terminación del contrato</th>
												<th>Precio del contrato</th>
												<th>Tipo de Modificación</th>
												<!--<th>Adendas</th>
												<th>Fecha de modificación</th>
												<th>Número de modificación</th>
												<th>Tipo de modificación</th>
												<th>Precio actualizado en Lps</th>
												<th>Documentos</th>-->
											</tr>
										</thead>
										<tbody>
											<?php 
											/*if ( count($contracts) > 0 ):
												foreach ($contracts as $contract):
											?>
											<tr>
												<td><?= $contract->justification ?></td>
												<td><?= $contract->track_contract ?></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<?php
												endforeach;
											endif;*/
											?>
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
													<?php 
													if ( count($disbursements) ):
														foreach ( $disbursements as $dis ):
													?>
													<tr>
														<td><?= $dis->order ?></td>
														<td><?= $dis->description ?></td>
														<td><?= $dis->amount ?></td>
														<td><?= $dis->date ?></td>
													</tr>
													<?php 
														endforeach;
													endif;
													?>
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
											<table class="table datatables-advances">
												<thead>
													<th></th>
													<th>%<br>Fisico<br>Progr.</th>
													<th>%<br>Fisico<br>Real</th>
													<th>Finan.<br>Progr.</th>
													<th>Finan.<br>Real</th>
													<!--<th>Fecha<br>Avance</th>
													<th>Fecha<br>Public</th>
													<th>Descr.<br>Problemas</th>
													<th>Descr.<br>Temas</th>
													<th>Doc</th>
													<th>Img</th>-->
												</thead>
												<tbody>
													<?php
													/*if ( count($advances) ):
														foreach( $advances as $adv ):
													?>
													<tr>
														<td></td>
														<td><?= $adv->percent_programed ?></td>
														<td><?= $adv->percent_real ?></td>
														<td><?= $adv->finance_programed ?></td>
														<td><?= $adv->finance_real ?></td>
														<!--<td><?= $adv->date_advance ?></td>
														<td><?= $adv->published_at ?></td>
														<td><?= $adv->description_problems ?></td>
														<td><?= $adv->description_issues ?></td>-->
														<td></td>
														<td></td>
													</tr>
													<?php
														endforeach;
													endif;*/
													?>
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
											<table class="table datatable-button-init-basic">
												<thead>
													<th>Tipo</th>
													<th>Fecha Vencimiento</th>
													<th>Monto</th>
													<th>Estado</th>
													<th>Fecha de Publicación</th>
												</thead>
												<tbody>
													<?php 
													if ( count($warranties) ):
														foreach ( $warranties as $warranty ):
													?>
													<tr>
														<td><?= $warranty->type_name ?></td>
														<td><?= $warranty->expiration_date ?></td>
														<td><?= $warranty->amount ?></td>
														<td><?= $warranty->published_at ?></td>
														<td></td>
													</tr>
													<?php 
														endforeach;
													endif;
													?>
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
												<div class="chart" id="c3-line-chart1"></div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="panel panel-flat">
											<div class="panel-body">
												<div class="chart" id="c3-line-chart2"></div>
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
									<!-- MAAP -->
									<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1978612.3200608562!2d-86.80722364708166!3d14.399633515167299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2shn!4v1555934865722!5m2!1ses-419!2shn" width="700" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
									<!-- END MAPA -->
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

<script src="{{ asset('js/forms/uniform.min.js') }}"></script>
<!-- Page scripts -->
<script src="{{ asset('js/tables/datatables/datatables.min.js') }}"></script>
<!--<script src="{{ asset('js/pages/datatable_basic.js') }}"></script>-->
<!-- /page scripts -->


<!-- Page scripts -->
<!--<script src="{{ asset('js/forms/select2.min.js') }}"></script>	
<script src="{{ asset('js/extensions/sweetalert.js') }}"></script>
<script src="{{ asset('js/tables/datatables/extensions/buttons.min.js') }}"></script>
<script src="{{ asset('js/pages/datatable_extension_export_options.js') }}"></script>-->

<!-- Page scripts -->
<script src="{{ asset('js/charts/d3/d3.min.js') }}"></script>
<script src="{{ asset('js/charts/c3/c3.min.js') }}"></script>
<script src="{{ asset('js/charts/c3/c3_lines_areas.js') }}"></script>
<script type="text/javascript">
	// Line chart with regions
    // ------------------------------

    // Generate chart
    var chart_line_regions = c3.generate({
        bindto: '#c3-line-chart1',
        size: { height: 300 },
        point: {
            r: 4
        },
        color: {
            pattern: ['#E53935', '#5E35B1']
        },
        data: {
            columns: [
                ['data1', 30, 55, 80, 45, 60, 70],
            ],
            regions: {
                'data1': [{'start':1, 'end':2, 'style':'dashed'},{'start':3}],
                'data2': [{'end':3}]
            }
        },
        grid: {
            y: {
                show: true
            }
        }
    });

     // Generate chart
    var chart_line_regions = c3.generate({
        bindto: '#c3-line-chart2',
        size: { height: 300 },
        point: {
            r: 4
        },
        color: {
            pattern: ['#E53935', '#5E35B1']
        },
        data: {
            columns: [
                ['data1', 30, 200, 100, 400, 150, 250],
            ],
            regions: {
                'data1': [{'start':1, 'end':2, 'style':'dashed'},{'start':3}],
                'data2': [{'end':3}]
            }
        },
        grid: {
            y: {
                show: true
            }
        }
    });
</script>
<!-- /page scripts -->




<script>

	$(document).ready(function(){

		// EXPANDIEBLE DATATABLES
		var data = <?= $contracts ?>;

		function format_contracts (data) {
		      return '<div class="details-container">'+
		          '<table cellpadding="5" cellspacing="0" border="0" class="details-table">'+
		              '<tr>'+
		                  '<td class="title">ID:</td>'+
		                  '<td>'+'</td>'+
		              '</tr>'+
		              '<tr>'+
		                  '<td class="title">Justificación:</td>'+
		                  '<td>'+data.justification +'</td>'+
		              '</tr>'+
		              '<tr>'+
		              	'<td class="title">Fecha de Modificación</td>'+
		              	'<td>'+ data.date +'</td>'+
		              '</tr>'+
		          '</table>'+
		        '</div>';
		};
		  
		var table = $('.datatables-contracts').DataTable({
		    // Column definitions
		    columns : [
		      {
		        className      : 'details-control',
		        defaultContent : '',
		        data           : null,
		        orderable      : false
		      },
		      {data : 'track_contract'},
		      {data : 'current_contract_scope'},
		      {data : 'contract_date'},
		      {data : 'current_price'},
		      {data : 'modification_type'}
		    ],
		    
		    data : data,
		    
		    pagingType : 'full_numbers',
		    
		   
		});
		 
		 
		$('.datatables-contracts tbody').on('click', 'td.details-control', function () {
		        var tr = $(this).closest('tr');
		        var row = table.row( tr );
		 
		        if ( row.child.isShown() ) {
		            // This row is already open - close it
		            row.child.hide();
		            tr.removeClass('shown');
		        }
		        else {
		            // Open this row
		            row.child( format_contracts(row.data()) ).show();
		            tr.addClass('shown');
		        }
		} );

		// DATATABLES ADVANCES
		var data_advances = <?= $advances ?>;

		function format_advances (data) {
		      return '<div class="details-container">'+
		          '<table cellpadding="5" cellspacing="0" border="0" class="details-table">'+
		              '<tr>'+
		                  '<td class="title">Fecha del Avance:</td>'+
		                  '<td>'+data.date_advance+'</td>'+
		              '</tr>'+
		              '<tr>'+
		                  '<td class="title">Fecha de Publicación:</td>'+
		                  '<td>'+data.published_at +'</td>'+
		              '</tr>'+
		              '<tr>'+
		                  '<td class="title">Descripción del problema:</td>'+
		                  '<td>'+data.description_problemsi +'</td>'+
		              '</tr>'+
		              '<tr>'+
		              	'<td class="title">Fecha de Modificación</td>'+
		              	'<td>'+ data.description_issues +'</td>'+
		              '</tr>'+
		          '</table>'+
		        '</div>';
		};
		  
		var table = $('.datatables-advances').DataTable({
		    // Column definitions
		    columns : [
		      {
		        className      : 'details-control',
		        defaultContent : '',
		        data           : null,
		        orderable      : false
		      },
		      {data : 'percent_programed'},
		      {data : 'percent_real'},
		      {data : 'finance_programed'},
		      {data : 'finance_real'}
		    ],
		    
		    data : data_advances,
		    
		    pagingType : 'full_numbers',
		    
		   
		});
		 
		 
		$('.datatables-advances tbody').on('click', 'td.details-control', function () {
		        var tr = $(this).closest('tr');
		        var row = table.row( tr );
		 
		        if ( row.child.isShown() ) {
		            // This row is already open - close it
		            row.child.hide();
		            tr.removeClass('shown');
		        }
		        else {
		            // Open this row
		            row.child( format_advances(row.data()) ).show();
		            tr.addClass('shown');
		        }
		} );


		// SEARCH
		var showSearch = false;
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