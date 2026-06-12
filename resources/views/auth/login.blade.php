<!DOCTYPE html>
<html lang="id">
<!--begin::Head-->

<head>
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.setAttribute('data-theme', 'dark');
            } else {
                document.documentElement.setAttribute('data-theme', 'light');
            }
        })();
    </script>
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

<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-static page-loading">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!--begin::Main-->
    <!--begin::Main-->
    <style>
        .login-bg-container {
            background: radial-gradient(circle at 10% 20%, #fdfbfc 0%, #f4f2eb 100%) !important;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 1.5rem;
        }
        /* Gradient glows in background */
        .login-glow-1 {
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(249, 115, 22, 0.08) 0%, rgba(0,0,0,0) 70%);
            top: 5%;
            left: 5%;
            z-index: 1;
        }
        .login-glow-2 {
            position: absolute;
            width: 450px;
            height: 450px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(251, 191, 36, 0.08) 0%, rgba(0,0,0,0) 70%);
            bottom: 5%;
            right: 5%;
            z-index: 1;
        }
        .login-card {
            background: #ffffff !important;
            border: 1px solid #e2dfd8 !important;
            border-radius: 24px !important;
            box-shadow: 0 20px 50px rgba(120, 110, 90, 0.12) !important;
            max-width: 440px;
            width: 100%;
            padding: 3rem 2.5rem !important;
            position: relative;
            z-index: 10;
            transition: transform 0.3s ease;
        }
        .login-card:hover {
            transform: translateY(-2px);
            border-color: rgba(249, 115, 22, 0.3) !important;
            box-shadow: 0 25px 60px rgba(234, 88, 12, 0.08) !important;
        }
        .login-card h3 {
            font-size: 1.85rem !important;
            font-weight: 800 !important;
            letter-spacing: -0.03em;
            color: #1c1917 !important;
            margin-bottom: 0.5rem;
        }
        .login-card .text-muted {
            color: #78716c !important;
            font-weight: 500 !important;
            margin-bottom: 2.25rem;
        }
        .login-card .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }
        .login-card .form-control-solid {
            background-color: #ffffff !important;
            border: 1px solid #d6d3d1 !important;
            color: #292524 !important;
            border-radius: 12px !important;
            padding: 14px 20px !important;
            height: auto !important;
            font-size: 0.95rem !important;
            transition: all 0.25s ease !important;
        }
        .login-card .form-control-solid:focus {
            border-color: #f97316 !important;
            box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.15) !important;
            background-color: #ffffff !important;
        }
        .login-card button[type="submit"] {
            width: 100%;
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%) !important;
            border: none !important;
            color: #fff !important;
            font-weight: 700 !important;
            font-size: 0.95rem !important;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            padding: 14px !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 18px rgba(234, 88, 12, 0.3) !important;
            transition: all 0.25s ease !important;
            cursor: pointer;
            margin-top: 1rem;
        }
        .login-card button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 24px rgba(234, 88, 12, 0.45) !important;
        }
    </style>
    <button type="button" class="login-theme-toggle" id="kt_theme_toggle" title="Toggle dark/light mode" aria-label="Toggle dark/light mode">
        <svg id="theme-toggle-sun-icon" class="d-none" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"></circle>
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
        </svg>
        <svg id="theme-toggle-moon-icon" class="d-none" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
        </svg>
    </button>
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login-bg-container">
            <div class="login-glow-1"></div>
            <div class="login-glow-2"></div>
            
            <div class="login-card text-center">
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-10">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/cost_65.png') }}" class="max-h-60px" alt="CoST Logo" />
                    </a>
                </div>
                <!--end::Login Header-->
                <!--begin::Login Sign in form-->
                <div class="login-signin">
                    <div>
                        <h3>{{ __('labels.sign_in') }}</h3>
                        <div class="text-muted">{{ __('labels.sign_in_sub') }}</div>
                    </div>
                    <form class="form" id="kt_login_signin_form" novalidate="novalidate" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input class="form-control form-control-solid" type="text" placeholder="Username" name="username" value="{{ old('username') }}" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-solid" type="password" placeholder="Password" name="password" autocomplete="off" required />
                        </div>
                        <button type="submit" id="kt_login_signin_submit">{{ __('labels.sign_in') }}</button>
                    </form>
                </div>
                <!--end::Login Sign in form-->
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
    @if (Session::has('success'))
        <script type="text/javascript">
            toastr.success('{!! Session::pull('success') !!}');
        </script>
    @endif
    @if (Session::has('fail'))
        <script type="text/javascript">
            toastr.error('{!! Session::pull('fail') !!}');
        </script>
    @endif
    <script>
        (function() {
            const toggleBtn = document.getElementById('kt_theme_toggle');
            if (!toggleBtn) return;

            const sunIcon = document.getElementById('theme-toggle-sun-icon');
            const moonIcon = document.getElementById('theme-toggle-moon-icon');

            function updateIcons(theme) {
                if (theme === 'dark') {
                    sunIcon.classList.remove('d-none');
                    moonIcon.classList.add('d-none');
                } else {
                    sunIcon.classList.add('d-none');
                    moonIcon.classList.remove('d-none');
                }
            }

            updateIcons(document.documentElement.getAttribute('data-theme') || 'light');

            toggleBtn.addEventListener('click', function() {
                const activeTheme = document.documentElement.getAttribute('data-theme');
                const newTheme = activeTheme === 'dark' ? 'light' : 'dark';

                document.documentElement.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateIcons(newTheme);
            });
        })();
    </script>
    @yield('script')
    <!-- Histats.com  (div with counter) -->
    <div id="histats_counter"></div>
    <!-- Histats.com  START  (aync)-->
    <script type="text/javascript">
        var _Hasync = _Hasync || [];
        _Hasync.push(['Histats.start', '1,4924614,4,511,95,18,00000000']);
        _Hasync.push(['Histats.fasi', '1']);
        _Hasync.push(['Histats.track_hits', '']);
        (function() {
            var hs = document.createElement('script');
            hs.type = 'text/javascript';
            hs.async = true;
            hs.src = ('//s10.histats.com/js15_as.js');
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
        })();
    </script>
    <noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4924614&101" alt="" border="0"></a></noscript>
    <!-- Histats.com  END  -->
</body>
<!--end::Body-->

</html>
