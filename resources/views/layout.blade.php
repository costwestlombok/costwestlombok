<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SISOCS</title> 
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

  <link href="assets/images/favicon.ico" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="assets/images/favicon.ico" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="assets/images/favicon.ico" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="assets/images/favicon.ico" rel="apple-touch-icon" type="image/png">
	<link href="assets/images/favicon.ico" rel="icon" type="image/png">
	<link href="assets/images/favicon.ico" rel="shortcut icon">
	
	<!-- Global stylesheets -->	
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/icons/icomoon/icomoon.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">   
	<link type="text/css" rel="stylesheet" href="{{ asset('css/core.css') }}">	
	<link type="text/css" rel="stylesheet" href="{{ asset('css/layout.css') }}">	
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap-extended.css') }}">	    
	<link type="text/css" rel="stylesheet" href="{{ asset('css/components.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/loaders.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/responsive.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/color-system.css') }}">		
	<link type="text/css" rel="stylesheet" href="{{ asset('css/fancybox/jquery.fancybox.css') }}">

  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

  @stack('styles')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  
</head>
<body class="overlay-leftbar" id="top">

	<div id="preloader">
		<div id="status">
			<div class="loader">
				<div class="loader-inner ball-pulse">
				  <div class="bg-blue"></div>
				  <div class="bg-amber"></div>
				  <div class="bg-success"></div>
				</div>
			</div>
		</div>
	</div>

	@component('header')
	@endcomponent


	@component('sidebar')
	@endcomponent

	<!--<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	      <a class="navbar-brand" href="#myPage">SISOCS</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        
	        <li class="dropdown">
	        	<a class="dropdown-toggle" data-toggle="dropdown" href="#about">GESTIÓN<span class="caret"></span></a>
	        	<ul class="dropdown-menu">
	        		<li><a href="">Proyectos</a></li>
	        	</ul>
	        </li>

	        <li class="dropdown">
	        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">CATALOGO<span class="caret"></span></a>
	        	<ul class="dropdown-menu">
	        		<li><a href="">Entidades</a></li>
	        		<li><a href="">Unidades de entidad</a></li>
	        	</ul>
	        </li>
	        <li class="dropdown">
	        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">INFORMES<span class="caret"></span></a>
	        	<ul class="dropdown-menu">
	        		<li><a href="">Adquisiciones</a></li>
	        		<li><a href="">Ingresos al sistema</a></li>
	        		<li><a href="">Técnicos del proyecto</a></li>
	        		<li><a href="">Contratos y proveedores</a></li>
	        		<li><a href="">Gerenciales</a></li>
	        		<li><a href="">Descarga de información</a></li>
	        	</ul>
	        </li>
	        <li><a href="#">MAPA DEL PROYECTO</a></li>
	        <li><a href="#">MÓDULO CIUDADANO</a></li>
	        <li><a href="#">Manual</a></li>
	        <li><a href="#">SMQ</a></li>
		    

	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="#">Perfil</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>-->

	<!-- BEGIN CONTENT -->
	<section class="main-container">

		<!--Page Header-->
		<div class="header">
			<div class="header-content">
				<div class="page-title"><i class="icon-display4"></i> Dashboard</div>
				<ul class="breadcrumb">
					<li><a href="index.htm">Home</a></li>
					<li><a href="index.htm#">Dashboards</a></li>
					<li class="active"><a href="index.htm#">Default Dashboard</a></li>
				</ul>					
			</div>
		</div>		
		<!--/Page Header-->

		<div class="container-fluid page-content">
		@yield('content')



		@component('rightbar')
		@endcomponent
		</div>

		@component('footer')
		@endcomponent


	</section>
	<!-- END CONTENT -->



	<!--<script src="{{ asset('js/app.js') }}" type="text/js"></script>-->

  	<!-- Global scripts -->
	<script src="{{ asset('js/jquery.js') }}"></script>	
	<script src="{{ asset('js/bootstrap.js') }}"></script>
	<script src="{{ asset('js/jquery.ui.js') }}"></script>
	<script src="{{ asset('js/nav.accordion.js') }}"></script>	
	<script src="{{ asset('js/hammerjs.js') }}"></script>
	<script src="{{ asset('js/jquery.hammer.js') }}"></script>
	<script src="{{ asset('js/scrollup.js') }}"></script>	
	<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>	
	<script src="{{ asset('js/smart-resize.js') }}"></script>
	<script src="{{ asset('js/blockui.min.js') }}"></script>		
	<script src="{{ asset('js/wow.min.js') }}"></script>					
	<script src="{{ asset('js/fancybox.min.js') }}"></script>
	<script src="{{ asset('js/venobox.js') }}"></script>
	<script src="{{ asset('js/forms/uniform.min.js') }}"></script>
	<script src="{{ asset('js/forms/switchery.js') }}"></script>
	<script src="{{ asset('js/forms/select2.min.js') }}"></script>	
	<script src="{{ asset('js/core.js') }}"></script>
	<!-- /global scripts -->
	<!-- Page scripts -->
	<!--<script src="//www.google.com/jsapi"></script>-->	
	<script src="{{ asset('js/maps/jvectormap/jvectormap.min.js') }}"></script>
	<script src="{{ asset('js/maps/jvectormap/map_files/world.js') }}"></script>



	@stack('scripts')
	<!--<script src="{{ asset('js/pages/dashboard_default.js') }}"></script>-->
	<!-- /page scripts -->
</body>
</html>