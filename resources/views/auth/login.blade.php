<!DOCTYPE html>
<html lang="id">
<!--begin::Head-->

<head>
	<meta charset="utf-8" />
	<title>{{ __('labels.title') }}</title>
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
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
	class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-static page-loading">
	<!-- Google Tag Manager (noscript) -->
	<noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
			style="display:none;visibility:hidden"></iframe>
	</noscript>
	<!-- End Google Tag Manager (noscript) -->
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
			<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
				style="background-image: url({{ asset('metronic/assets/media/bg/bg-3.jpg') }});">
				<div class="login-form text-center p-7 position-relative overflow-hidden">
					<!--begin::Login Header-->
					<div class="d-flex flex-center mb-15">
						<a href="{{ url('/') }}">
							<img src="{{ asset('images/cost_65.png') }}" class="max-h-65px" alt="" />
						</a>
					</div>
					<!--end::Login Header-->
					<!--begin::Login Sign in form-->
					<div class="login-signin">
						<div class="mb-20">
							<h3>{{ __('labels.sign_in') }}</h3>
							<div class="text-muted font-weight-bold">{{ __('labels.sign_in_sub') }}</div>
						</div>
						<form class="form" id="kt_login_signin_form" novalidate="novalidate" method="POST"
							action="{{ route('login') }}">
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
							<button type="submit" id="kt_login_signin_submit"
								class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">{{ __('labels.sign_in') }}</button>
						</form>
					</div>
					<!--end::Login Sign in form-->
				</div>
			</div>
		</div>
		<!--end::Login-->
	</div>

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

</html>