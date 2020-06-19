<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>COST LOMBOK BARAT</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />

	<link href="{{ asset('favicon.svg') }}" rel="apple-touch-icon" type="image/svg+xml" sizes="144x144">
	<link href="{{ asset('favicon.svg') }}" rel="apple-touch-icon" type="image/svg+xml" sizes="114x114">
	<link href="{{ asset('favicon.svg') }}" rel="apple-touch-icon" type="image/svg+xml" sizes="72x72">
	<link href="{{ asset('favicon.svg') }}" rel="apple-touch-icon" type="image/svg+xml">
	<link href="{{ asset('favicon.svg') }}" rel="icon" type="image/svg+xml">
	<link href="{{ asset('favicon.svg') }}" rel="shortcut icon">

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

	<section class="main-container">

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

		<div class="container-fluid page-content">
			@yield('content')
		</div>

		@component('footer')
		@endcomponent

	</section>

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
	@yield('script')
	@include('sweetalert::alert')
	<!-- /page scripts -->
</body>

</html>