<!doctype html>
<html style="height:100%">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Penguin - Responsive admin dashboard template by Followtechnique</title>
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
	<div class="login-container material">

		<!-- Page content -->
		<div class="page-content">

			<!-- Simple login form -->
			<form action="http://167.99.226.151/sisocs-laravel/sisocs/public/index.php/dashboard">
				<div class="login-form no-border no-border-radius">
					<div class="welcome bg-blue p-t-20">
						<div class="welcome-text text-size-huge text-light">Inicio de Sesión</div>
					</div>
					<div class="panel panel-flat no-border">
						<div class="panel-body no-padding-bottom">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Email" name="Email" required="required">
							</div>

							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password" name="password" required="required">
							</div>

							<div class="login-options">
								<div class="row">
									<div class="col-sm-6 col-xs-6">
										<!--<div class="checkbox">
											<label>
												<input type="checkbox" class="styled" checked="checked">
												Remember me
											</label>
										</div>-->
									</div>

									<div class="col-sm-6 col-xs-6 text-right">
										<!--<button type="button" class="btn bg-blue no-border-radius">Conectar</button>-->
										<a href="http://167.99.226.151/sisocs-laravel/sisocs/public/index.php/dashboard" class="btn bg-blue no-border-radius">CONECTAR</a>
									</div>
								</div>
							</div>

							<div class="form-group text-center">
								<a href="http://localhost/templates/penguin/offcanvas/login_password_recover.html">Olvido su contraseña?</a>
							</div>

						</div>
						<!--<div class="panel-footer text-center">
							<a href="login_material.htm#">Create an account</a>
						</div>-->
					</div>
				</div>

			</form>
			<!-- /simple login form -->


			<!-- Footer -->
			<div class="footer text-size-mini">
				&copy; 2020 CoST &nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp; West Lombok
			</div>
			<!-- /footer -->

		</div>
		<!-- /page content -->

	</div>

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

