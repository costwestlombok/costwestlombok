<!-- Layout login -->
<!doctype html>
<html style="height:100%">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>SISOCS - Login</title>	
	<link href="{{ asset('assets/images/favicon.ico') }}" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="{{ asset('assets/images/favicon.ico') }}" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="{{ asset('assets/images/favicon.ico') }}" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="{{ asset('assets/images/favicon.ico') }}" rel="apple-touch-icon" type="image/png">
	<link href="{{ asset('assets/images/favicon.ico') }}" rel="icon" type="image/png">
	<link href="{{ asset('assets/images/favicon.ico') }}" rel="shortcut icon">
	
	<!-- Global stylesheets -->	
	<link type="text/css" rel="stylesheet" href="{{ asset('assets/fonts/fonts.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/icons/icomoon/icomoon.css') }}">    
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">   
	<link type="text/css" rel="stylesheet" href="{{ asset('css/core.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap-extended.css') }}">	    		
	<link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">	    		
	<link type="text/css" rel="stylesheet" href="{{ asset('css/color-system.css') }}">
	<!-- /global stylesheets -->

</head>
<!--<body style="height:100%; background:url('assets/images/assets/login_bg.jpg') no-repeat 0 0; background-size:cover;">-->
<body style="height:100%;">

	@yield('content')

<!-- Global scripts -->
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>	
<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/forms/uniform.min.js') }}"></script>	
<!-- /global scripts -->

<script>
$(function() {
	$(".styled, .multiselect-container input").uniform({
		radioClass: 'choice'
	});
	$('input,textarea').focus(function(){
	   $(this).data('placeholder',$(this).attr('placeholder'))
			  .attr('placeholder','');
	}).blur(function(){
	   $(this).attr('placeholder',$(this).data('placeholder'));
	});
});
</script>
</body>
</html>