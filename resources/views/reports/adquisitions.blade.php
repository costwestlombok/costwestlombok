<!-- adquisiciones -->
@extends('layout_front')

@section('content')

@component('elements.welcome_search')
@endcomponent

	<!--================================PAGE TITLE==========================================-->
	<div class="page-title-wrap bgamarillo padding-top-150 padding-bottom-30" id="section-title"><!-- section title -->
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
				<li><a href="">/ Informe de Adquisiciones</a></li>
				<li><a href="">/ Entidad</a></li>
			</ul>					
		</div>
	</div>		
	<!--/Page Header-->

	<section class="aside-layout-section padding-top-70 padding-bottom-40">
			<div class="container"><!-- section container -->
				<!-- Chart -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Tipo de Contrato Vs. Metódo de Adquisición</h5>						
							</div>
							<div class="panel-body">
								<!--<div class="chart" id="google-column"></div>-->
								<div class="chart" id="c3-bar"></div>
							</div>
						</div>
					</div>
				</div>

				<!-- table data -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-flat">
							<table class="table">
								<thead>
									<tr>
										<th></th>
										<th>Tipo de servicio contratado</th>
										<th>Metódo de adquisición</th>
										<th>Cantidad de contratos</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if ( count($rows) > 0 ):
										foreach($rows as $row):
									?>
									<tr>
										<td></td>
										<td><?= $row->type_name ?></td>
										<td><?= $row->method_name ?></td>
										<td><?= $row->contratos ?></td>
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
		</section>

@endsection

@push('scripts')
<!-- Page scripts -->
<script src="{{ asset('js/charts/d3/d3.min.js') }}"></script>
<script src="{{ asset('js/charts/c3/c3.min.js') }}"></script>
<script src="{{ asset('js/charts/c3/c3_bars_pies.js') }}"></script>
<script type="text/javascript">
	// Generate chart
    var bar_chart = c3.generate({
        bindto: '#c3-bar',
        size: { height: 300 },
        data: {
            columns: [
                ['adquisiciones', 30, 200, 100, 400, 150, 250],
            ],
            type: 'bar'
        },
        color: {
            pattern: ['#2196F3', '#FF9800', '#4CAF50']
        },
        bar: {
            width: {
                ratio: 0.5
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
