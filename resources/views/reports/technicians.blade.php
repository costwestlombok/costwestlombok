<!-- reporte tecnico -->
@extends('layout_front')

@push('styles')
	<link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">
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
				Informes
			</h4>
		</div><!-- section title end -->
		<!--Page Header-->
		<div class="header">
			<div class="header-content">
				<!--<div class="page-title"><i class="icon-display4"></i> Dashboard</div>-->
				<ul class="breadcrumb">
					<li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
					<li><a href="">/ Informe Técnico</a></li>
					<li><a href="">/ Entidad</a></li>
				</ul>					
			</div>
		</div>		
		<!--/Page Header-->
		
		<!--================================listing SECTION==========================================-->
		
		<section class="aside-layout-section padding-top-70 padding-bottom-40">
			<div class="container"><!-- section container -->
			<!-- table data -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-flat">
						<div class="panel-body">
							<?php
							$monto  = 0;
							if ( count($rows) > 0 ):
								foreach($rows as $row):
									$monto += $row->project_budget;
								endforeach;
							endif;
							?>
							<div class="row" style="margin-bottom: 10px;">
								<div class="col-md-2">Proyectos: </div>
								<div class="col-md-2">
									<span class="btn btn-primary"><?= number_format(count($rows)) ?></span>
								</div>
							</div>
							<div class="row" style="margin-bottom: 10px;">
								<div class="col-md-2">Montos Contratados: </div>
								<div class="col-md-2">
									<span class="btn btn-primary"><?= 'L. ' . number_format($monto) ?></span>
								</div>
							</div>
							<table class="table datatable-button-init-basic">
							<!--<table class="table datatable">-->
								<thead>
									<tr>
										<th>Código</th>
										<th>Proyecto</th>
										<th>Presupuesto</th>
										<th>Creación</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if ( count($rows) > 0 ):
										foreach($rows as $row):
									?>
									<tr>
										<td>
											<a href="{{ route('transparency.project', $row->id) }}" style="text-align: left;">
												<?= $row->project_code ?>
											</a>
										</td>
										<td>
											<a href="{{ route('transparency.project', $row->id) }}" style="text-align: left;">
												<?= $row->project_name ?>
											</a>
										</td>
										<td><?= number_format($row->project_budget) ?></td>
										<td><?= date("Y-m-d", strtotime($row->created_at)) ?></td>
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
	</section>
@endsection

@push('scripts')
<script src="{{ asset('js/forms/uniform.min.js') }}"></script>
<!-- Page scripts -->
<script src="{{ asset('js/tables/datatables/datatables.min.js') }}"></script>
<!--<script src="{{ asset('js/pages/datatable_basic.js') }}"></script>-->

<script src="{{ asset('js/forms/select2.min.js') }}"></script>	
<script src="{{ asset('js/extensions/sweetalert.js') }}"></script>
<!--<script src="js/tables/datatables/datatables.min.js"></script>-->
<script src="{{ asset('js/tables/datatables/extensions/buttons.min.js') }}"></script>
<script src="{{ asset('js/pages/datatable_extension_export_options.js') }}"></script>
<!-- /page scripts -->
<script>
	var showSearch = false;
	$(document).ready(function(){
		// data table
		/*$(".datatable").DataTable({
			language: {
				search: '<span>Buscar:</span> _INPUT_',
				lengthMenu: '<span>Mostrar:</span> _MENU_',
				paginate: { 'first': '<<', 'last': '>>', 'next': '&rarr;', 'previous': '&larr;' }
			},
			displayLength: 100,
		});*/

		// buttons
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
