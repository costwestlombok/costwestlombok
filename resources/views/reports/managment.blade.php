@extends('layout_front')

@section('content')

@component('elements.welcome_search')
@endcomponent

	<!--================================PAGE TITLE==========================================-->
		<div class="page-title-wrap bgamarillo padding-top-150 padding-bottom-30"><!-- section title -->
			<h4 class="white">
				<a href="#" id="btn-show-search">
					<i class="icon-circle-down2 position-left"></i>
				</a>Informes
			</h4>
		</div><!-- section title end -->
		<!--Page Header-->
		<div class="header">
			<div class="header-content">
				<!--<div class="page-title"><i class="icon-display4"></i> Dashboard</div>-->
				<ul class="breadcrumb">
					<li><a href="{{ route('welcome') }}"><i class="fa fa-home"></i> Inicio</a></li>
					<li><a href="">/ Informe Administrativo</a></li>
					<li><a href="">/ Entidad</a></li>
				</ul>					
			</div>
		</div>		
		<!--/Page Header-->
		
		<!--================================listing SECTION==========================================-->
		
		<section class="aside-layout-section padding-top-70 padding-bottom-40">
			<div class="container"><!-- section container -->
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Proyectos a nivel Nacional</h5>
						</div>
						<div class="panel-body">
							<div class="chart m-t-20" id="google-pie1"></div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Proyectos según su fuente de financiamiento</h5>
						</div>
						<div class="panel-body">
							<div class="chart m-t-20" id="google-pie1"></div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Obras por próposito</h5>
						</div>
						<div class="panel-body">
							<div class="chart m-t-20" id="google-pie1"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@push('scripts')
	<script src="https://www.google.com/jsapi"></script>

	<script src="{{ asset('js/charts/d3/d3.min.js') }}"></script>
	<script src="{{ asset('js/charts/c3/c3.min.js') }}"></script>
	<script src="{{ asset('js/charts/c3/c3_bars_pies.js') }}"></script>
	<!--<script src="{{ asset('js/pages/dashboard_analytics.js') }}"></script>-->
	<script>
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


		/*
		// Pie chart
		// ------------------------------
		// Initialize chart
		google.load("visualization", "1", {packages:["corechart"]});
		google.setOnLoadCallback(drawPie);

		// Chart settings    
		function drawPie() {

		    // Data
		    /*var data = google.visualization.arrayToDataTable([
		        ['Channel', 'Visitors'],
		        ['Organic search',     72],
		        ['Social',      23],
		        ['Dirrect',  97],
		        ['Refferal', 75]
		    ]);*/
		    var data = new google.visualization.DataTable(<?php echo json_encode($projects); ?>);

		    data.addColumn('string', 'status');
      		data.addColumn('number', 'value');

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
		    //var pie = new google.visualization.PieChart($('#google-pie1')[0]);
		    //pie.draw(data, options_pie);
		    var pie = new google.visualization.PieChart(document.getElementById('google-pie1'));
      		pie.draw(data, {width: 400, height: 240});
		}

		// chart 2
		google.load("visualization", "1", {packages:["corechart"]});
		google.setOnLoadCallback(drawPie2);

		// Chart settings    
		function drawPie2() {

		    // Data
		    /*var data = google.visualization.arrayToDataTable([
		        ['Channel', 'Visitors'],
		        ['Organic search',     72],
		        ['Social',      23],
		        ['Dirrect',  97],
		        ['Refferal', 75]
		    ]);*/
		    var data = new google.visualization.DataTable(<?php echo json_encode($projects); ?>);

		    data.addColumn('string', 'status');
      		data.addColumn('number', 'value');

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
		    //var pie = new google.visualization.PieChart($('#google-pie1')[0]);
		    //pie.draw(data, options_pie);
		    var pie = new google.visualization.PieChart(document.getElementById('google-pie2'));
      		pie.draw(data, {width: 400, height: 240});
		}

		// chart 3
		google.load("visualization", "1", {packages:["corechart"]});
		google.setOnLoadCallback(drawPie3);

		// Chart settings    
		function drawPie2() {

		    // Data
		    /*var data = google.visualization.arrayToDataTable([
		        ['Channel', 'Visitors'],
		        ['Organic search',     72],
		        ['Social',      23],
		        ['Dirrect',  97],
		        ['Refferal', 75]
		    ]);*/
		    var data = new google.visualization.DataTable(<?php echo json_encode($projects); ?>);

		    data.addColumn('string', 'status');
      		data.addColumn('number', 'value');

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
		    //var pie = new google.visualization.PieChart($('#google-pie1')[0]);
		    //pie.draw(data, options_pie);
		    var pie = new google.visualization.PieChart(document.getElementById('google-pie3'));
      		pie.draw(data, {width: 400, height: 240});
		}*/
	</script>
@endpush
