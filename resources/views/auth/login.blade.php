{{-- <!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8" />
	<title>{{ __('labels.title') }}</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->

	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="/metronic/assets/plugins/global/plugins.bundle.css?v=7.0.6" rel="stylesheet" type="text/css" />
	<link href="/metronic/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6" rel="stylesheet" type="text/css" />
	<link href="/metronic/assets/css/style.bundle.css?v=7.0.6" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->

	<!--begin::Layout Themes(used by all pages)-->
	<!--end::Layout Themes-->

	<!--begin::Page Custom Styles(used by this page)-->
	<link href="{{ asset('metronic/assets/css/pages/users/login-1.css') }}" rel="stylesheet" type="text/css" />
	<!--end::Page Custom Styles-->

	<link rel="shortcut icon" href="/metronic/assets/media/logos/favicon.ico" />
	@yield('style')
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
</head>
<!--begin::Body-->

<body id="kt_body"
	class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid bg-white" id="kt_login">
			<!--begin::Aside-->
			<div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10"
				style="background-image: url({{ asset('metronic/assets/media/bg/bg-4.jpg') }});">
				<!--begin: Aside Container-->
				<div class="d-flex flex-row-fluid flex-column justify-content-between">
					<!--begin: Aside header-->
					<a href="{{ url('/') }}" class="flex-column-auto mt-5">
						<img src="{{ asset('metronic/assets/media/logos/logo-letter-1.png') }}" class="mb-3 max-h-70px"
							alt="" />
					</a>
					<!--end: Aside header-->
					<!--begin: Aside content-->
					<div class="flex-column-fluid d-flex flex-column justify-content-center">
						<h3 class="font-size-h1 mb-5 text-white">{{ __('labels.welcome') }}!</h3>
						<p class="font-weight-lighter text-white opacity-80">{{ __('labels.welcome_sub') }}</p>
					</div>
					<!--end: Aside content-->
					<!--begin: Aside footer for desktop-->
					<div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
						<div class="opacity-70 font-weight-bold text-white">© 2020 {{ __('labels.title') }} </div>
						<div class="d-flex">
							<a href="#" class="text-white">{{ __('labels.privacy') }}</a>
						</div>
					</div>
					<!--end: Aside footer for desktop-->
				</div>
				<!--end: Aside Container-->
			</div>
			<!--begin::Aside-->
			<!--begin::Content-->
			<div class="flex-row-fluid d-flex flex-column position-relative p-7 overflow-hidden">
				<!--begin::Content header-->
				<div
					class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
					<span class="font-weight-bold text-dark-50">{{ __('labels.title') }}</span>
				</div>
				<!--end::Content header-->
				<!--begin::Content body-->
				<div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
					<!--begin::Signin-->
					<div class="login-form login-signin">
						<div class="text-center mb-10 mb-lg-20">
							<h3 class="font-size-h1">{{ __('labels.sign_in') }}</h3>
							<p class="text-muted font-weight-bold">{{ __('labels.sign_in_sub') }}</p>
						</div>
						<!--begin::Form-->
						<form class="form" novalidate="novalidate" method="POST" action="{{ route('login') }}">
							@csrf
							<div class="form-group">
								<input class="form-control form-control-solid h-auto py-5 px-6" type="text"
									placeholder="Username" name="username" value="{{ old('username') }}"
									autocomplete="off" />
							</div>
							<div class="form-group">
								<input class="form-control form-control-solid h-auto py-5 px-6" type="password"
									placeholder="Password" name="password" autocomplete="off" />
							</div>
							<!--begin::Action-->
							<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
								<span class="text-dark-50 text-hover-primary my-3 mr-2"></span>
								<button
									class="btn btn-primary font-weight-bold px-9 py-4 my-3">{{ __('labels.sign_in') }}</button>
							</div>
							<!--end::Action-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Signin-->
				</div>
				<!--end::Content body-->
				<!--begin::Content footer for mobile-->
				<div
					class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
					<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© {{ __('labels.title') }}</div>
					<div class="d-flex order-1 order-sm-2 my-2">
						<a href="#" class="text-dark-75 text-hover-primary">{{ __('labels.privacy') }}</a>
					</div>
				</div>
				<!--end::Content footer for mobile-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Login-->
	</div>
	<!--end::Main-->

	<script>
		var HOST_URL = "{{ url('/') }}";
	</script>
	<!--begin::Global Config(global config for global JS scripts)-->
	<script>
		var KTAppSettings = {
			breakpoints: {
				sm: 576,
				md: 768,
				lg: 992,
				xl: 1200,
				xxl: 1200,
			},
			colors: {
				theme: {
					base: {
						white: "#ffffff",
						primary: "#6993FF",
						secondary: "#E5EAEE",
						success: "#1BC5BD",
						info: "#8950FC",
						warning: "#FFA800",
						danger: "#F64E60",
						light: "#F3F6F9",
						dark: "#212121",
					},
					light: {
						white: "#ffffff",
						primary: "#E1E9FF",
						secondary: "#ECF0F3",
						success: "#C9F7F5",
						info: "#EEE5FF",
						warning: "#FFF4DE",
						danger: "#FFE2E5",
						light: "#F3F6F9",
						dark: "#D6D6E0",
					},
					inverse: {
						white: "#ffffff",
						primary: "#ffffff",
						secondary: "#212121",
						success: "#ffffff",
						info: "#ffffff",
						warning: "#ffffff",
						danger: "#ffffff",
						light: "#464E5F",
						dark: "#ffffff",
					},
				},
				gray: {
					"gray-100": "#F3F6F9",
					"gray-200": "#ECF0F3",
					"gray-300": "#E5EAEE",
					"gray-400": "#D6D6E0",
					"gray-500": "#B5B5C3",
					"gray-600": "#80808F",
					"gray-700": "#464E5F",
					"gray-800": "#1B283F",
					"gray-900": "#212121",
				},
			},
			"font-family": "Poppins",
		};
	</script>
	<!--end::Global Config-->

	<!--begin::Global Theme Bundle(used by all pages)-->
	<script src="/metronic/assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
	<script src="/metronic/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
	<script src="/metronic/assets/js/scripts.bundle.js?v=7.0.6"></script>
	<!--end::Global Theme Bundle-->
	<script src="{{ asset('metronic/assets/js/pages/features/miscellaneous/sweetalert2.js') }}"></script>
	<script src="{{ asset('metronic/assets/js/pages/features/miscellaneous/toastr.js') }}"></script>
	@if(Session::has('success'))
	<script type="text/javascript">
		toastr.success('{!! Session::pull("success") !!}');
	</script>
	@endif
	@if(Session::has('fail'))
	<script type="text/javascript">
		toastr.error('{!! Session::pull("fail") !!}');
	</script>
	@endif
	@yield('script')
</body>
<!--end::Body-->

</html> --}}


<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<!-- End Google Tag Manager -->
		<meta charset="utf-8" />
		<title>Login Page 4 | Keenthemes</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="/metronic/assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="/metronic/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/metronic/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/metronic/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="/metronic/assets/media/logos/favicon.ico" />
		@yield('style')
		<link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
		<!-- Hotjar Tracking Code for keenthemes.com -->
		<script>(function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:1070954,hjsv:6}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-static page-loading">
		<!-- Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!-- End Google Tag Manager (noscript) -->
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-color: white">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="{{ asset('images/CoST logo_ West Lombok, Indonesia.png') }}" class="max-h-65px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>Login Admin</h3>
								<div class="text-muted font-weight-bold">Silahkan masukkan username dan password Anda:</div>
							</div>
							<form class="form" id="kt_login_signin_form" novalidate="novalidate" method="POST" action="{{ route('login') }}">
								@csrf
								<div class="form-group">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text"
										placeholder="Username" name="username" value="{{ old('username') }}"
										autocomplete="off" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password"
										placeholder="Password" name="password" autocomplete="off" />
								</div>
								<button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
							</form>
						</div>
						<!--end::Login Sign in form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="/metronic/assets/plugins/global/plugins.bundle.js"></script>
		<script src="/metronic/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="/metronic/assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="/metronic/assets/js/pages/custom/login/login-general.js"></script>
		<!--end::Page Scripts-->
		@if(Session::has('success'))
		<script type="text/javascript">
			toastr.success('{!! Session::pull("success") !!}');
		</script>
		@endif
		@if(Session::has('fail'))
		<script type="text/javascript">
			toastr.error('{!! Session::pull("fail") !!}');
		</script>
		@endif
		@yield('script')
	</body>
	<!--end::Body-->
</html>