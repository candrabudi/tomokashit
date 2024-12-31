<!doctype html>
<html lang="en" data-layout="horizontal" data-layout-style="" data-layout-position="fixed" data-topbar="dark">
<head>

    <meta charset="utf-8" />
    <title>@yield('title') | Real Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('backoffice/images/favicon.ico') }}">
    <link href="{{ asset('backoffice/libs/jsvectormap/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backoffice/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('backoffice/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('backoffice/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backoffice/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backoffice/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('backoffice/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <div class="top-tagbar">
            <div class="w-100">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-auto col-9">
                        <div class="text-white-50 fs-13">
                            <i class="bi bi-clock align-middle me-2"></i> <span id="current-time"></span>
                        </div>
                    </div>
                    <div class="col-md-auto col-6 d-none d-lg-block">
                        <div class="d-flex align-items-center justify-content-center gap-3 fs-13 text-white-50">
                            <div>
                                <i class="bi bi-envelope align-middle me-2"></i> maysit@gmail.com
                            </div>
                            <div>
                                <i class="bi bi-globe align-middle me-2"></i> www.maysit.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('backoffice.layouts.components.header')
        @include('backoffice.layouts.components.navbar')
        <div class="vertical-overlay"></div>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <div>
                <button type="button"
                    class="btn-success btn-rounded shadow-lg btn btn-icon layout-rightside-btn fs-22"><i
                        class="ri-chat-smile-2-line"></i></button>
            </div>

            @include('backoffice.layouts.components.footer')
        </div>
    </div>

    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('backoffice/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backoffice/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('backoffice/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('backoffice/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('backoffice/libs/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('backoffice/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('backoffice/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('backoffice/js/pages/dashboard-ecommerce.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('backoffice/js/app.js') }}"></script>
    <script>
        $('#logoutBtn').on('click', function(e) {
            e.preventDefault(); // Mencegah default action dari <a>
    
            $.ajax({
                url: '/system/dashboard/logout', // URL route logout Laravel
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' // Sertakan CSRF token
                },
                success: function(response) {
                    // Redirect ke halaman login setelah logout berhasil
                    window.location.href = '{{ route('user.home') }}';
                },
                error: function(error) {
                    console.error('Logout failed:', error);
                }
            });
        });
    </script>
</body>
</html>
