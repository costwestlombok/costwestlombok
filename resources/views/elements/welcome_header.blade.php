<!-- header -->
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="user-scalable = yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Información y Seguimiento de Obras y contratos en Honduras">
	<meta name="keywords" content="contratos, gobierno honduras, supervisión, gobierto abierto, datos abiertos">
	<meta name="author" content="SISOCS">
	
	<title>SISOCS - SISTEMA DE INFORMACIÓN Y SEGUIMIENTO DE OBRAS Y CONTRATOS DE SUPERVISIÓN</title>
	
    <!--================================FAVICON================================-->
	
	
	<link rel="shortcut icon" href="{{ asset('frontend/images/favicon/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon">
	

	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('frontend/images/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/images/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('frontend/images/manifest.json') }}">
	<link rel="mask-icon" href="{{ asset('frontend/images/safari-pinned-tab.svg') }}" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">
	
    <!--================================BOOTSTRAP STYLE SHEETS================================-->
        
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}">
	
    <!--================================ Main STYLE SHEETs====================================-->
	
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/menu.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/color/color.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/testimonial/css/style.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/testimonial/css/elastislide.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/responsive.css') }}">

	<!--================================FONTAWESOME==========================================-->
		
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/font-awesome.css') }}">


    <!--================================LAYOUT==========================================-->
	<!--<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap-extended.css') }}">-->
	<!--<link type="text/css" rel="stylesheet" href="{{ asset('css/components.css') }}">-->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/icons/icomoon/icomoon.css') }}">
        
	<!--================================GOOGLE FONTS=========================================-->
	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Lato:300,400,700,900'>  
		
	<!--================================SLIDER REVOLUTION =========================================-->
	
	@stack('styles')
		
</head>
<body>



	<div class="preloader"><span class="preloader-gif"></span></div>
	<div class="theme-wrap clearfix">
		<!--================================responsive log and menu==========================================-->
		<div class="wsmenucontent overlapblackbg"></div>
		<div class="wsmenuexpandermain slideRight">
			<a id="navToggle" class="animated-arrow slideLeft"><span></span></a>
			<a href="{{route('welcome')}}" class="smallogo"><img src="{{ asset('frontend/images/logo.png') }}" width="120" alt="" /></a>				

		</div>
		<!--================================HEADER==========================================-->
		<div class="header">
			



			<div class="nav-wrapper "><!--main navigation-->
				<div class="container ">
					<!--Main Menu HTML Code-->
					<nav class="wsmenu slideLeft clearfix ">
						<div class="logo pull-left">
							<a href="{{route('welcome')}}" title="Responsive Slide Menus">
								<img src="{{ asset('frontend/images/logo.png') }}" alt="" />
							</a>

									
						</div>
						<ul class="mobile-sub wsmenu-list pull-right">
							<li><a href="{{route('welcome')}}" class="">Inicio</a>
							</li>
							<li><a href="#" class="">Entidades</a>
								<ul class="wsmenu-submenu">
									<li>
										<a href="{{route('transparency.citizens', ['organization' => 'hondutel'])}}" target="_self">
											HONDUTEL
										</a>
									</li>
									<li>
										<a href="{{route('transparency.citizens', ['organization' => 'enp'])}}" target="_self">
											ENP
										</a>
									</li>
									<li>
										<a href="{{route('transparency.citizens', ['organization' => 'fondo vial'])}}" target="_self">
											FONDO VIAL
										</a>
									</li>
									<li>
										<a href="{{route('transparency.citizens', ['organization' => 'insep'])}}" target="_self">
											INSEP
										</a>
									</li>
									<li>
										<a href="{{route('transparency.citizens', ['organization' => 'invest'])}}" target="_self">
											InvestH
										</a>
									</li>
									<li>
										<a href="{{route('transparency.citizens', ['organization' => 'enee'])}}" target="_self">
											ENEE
										</a>
									</li>
									<li>
										<a href="{{route('transparency.citizens', ['organization' => 'idecoas'])}}" target="_self">
											IDECOAS
										</a>
									</li>
									<li>
										<a href="{{route('transparency.citizens', ['organization' => 'sesal'])}}" target="_self">
											SESAL
										</a>
									</li>
									<li>
										<a href="{{route('transparency.citizens', ['organization' => 'seduc'])}}" target="_self">
											SEDUC
										</a>
									</li>
								</ul>
							</li>

							<li><a href="#" class="">Documentos</a>
								<ul class="wsmenu-submenu">
									<li><a href="/docs/manual_sisocs.pdf" target="blank">Manual de Usuario</a></li>
									<li><a href="/docs/decreto_sisocs.pdf" target="blank">Decreto Ejecutivo SISOCS</a></li>
									
								</ul>
							</li>

							<li><a href="#" class="">Informes</a>
								<ul class="wsmenu-submenu">
									<li><a href="{{ route('reports.adquisitions') }}">Adquisiciones</a></li>
									<li><a href="{{ route('reports.technicians') }}">Técnico</a></li>
									<li><a href="{{ route('reports.managment') }}">Gerencial</a></li>
									<li><a href="{{ route('reports.download') }}">Descargar</a></li>
								</ul>
							</li>


							<li><a href="{{ route('transparency.faq') }}">Preguntas Frecuentes <span class="arrow"></span></a></li>
							
							<!--
						  	<li><a href="contacto.php">Contáctenos <span class="arrow"></span></a></li>
						  	-->


						  	
						</ul>

					</nav>
				</div>
			</div><!--main navigation end-->
		</div><!-- header end -->

				

		<?php 
		/*if (isset($buscador)) {
			include 'buscador.php';
		}*/
		?>