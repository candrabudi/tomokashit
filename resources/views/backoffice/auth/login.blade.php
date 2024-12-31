<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Sign In | Real Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Minimal Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('backoffice/images/favicon.ico') }}">
    <script src="{{ asset('backoffice/js/layout.js') }}"></script>
    <link href="{{ asset('backoffice/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backoffice/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backoffice/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backoffice/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <section
        class="auth-page-wrapper py-5 position-relative d-flex align-items-center justify-content-center min-vh-100 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-0">
                                <div class="col-lg-5">
                                    <div
                                        class="card auth-card bg-primary h-100 border-0 shadow-none p-sm-3 overflow-hidden mb-0">
                                        <div class="card-body p-4 d-flex justify-content-between flex-column">
                                            <div class="auth-image mb-3">
                                                <img src="https://cdn-icons-png.flaticon.com/512/10397/10397230.png"
                                                    alt="" style="width: 100%; margin: auto;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="card mb-0 border-0 shadow-none">
                                        <div class="card-body px-0 p-sm-5 m-lg-4">
                                            <div class="text-center mt-2">
                                                <h5 class="text-primary fs-20">Welcome Back !</h5>
                                                <p class="text-muted">Sign in to continue to Real Dashboard.</p>
                                            </div>
                                            <div class="p-2 mt-5">
                                                <form id="login-form" action="{{ route('system.login.process') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="username"
                                                            placeholder="Masukan username anda" name="username">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="password-input">Password</label>
                                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                                            <input type="password" name="password"
                                                                class="form-control pe-5 password-input"
                                                                placeholder="Masukan password anda" id="password-input">
                                                            <button
                                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                type="button" id="password-addon">
                                                                <i class="ri-eye-fill align-middle"></i>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="mt-4">
                                                        <button class="btn btn-primary w-100" type="submit">Sign
                                                            In</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="errorPopup" class="modal fade" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 12px; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style="background-color: #f44336; color: white; border-radius: 12px 12px 0 0; border-bottom: none;">
                    <h5 class="modal-title" id="errorModalLabel" style="font-weight: 600;">Oops, something went wrong!</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="text-align: center; padding: 24px; font-size: 16px; color: #333;">
                    <p id="errorMessage" style="margin-bottom: 0; font-size: 15px;">Pengaturan Anda tidak berhasil diterapkan.</p>
                </div>
                <div class="modal-footer" style="justify-content: center; border-top: none;">
                    <button type="button" class="btn btn-lg" data-bs-dismiss="modal" style="background-color: #009688; color: white; padding: 12px 24px; border-radius: 8px;">OK</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Validasi form dan menampilkan popup jika ada error
        document.getElementById('login-form').addEventListener('submit', function(event) {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password-input').value;
            let errorMessage = '';
    
            if (!username) {
                errorMessage = 'Nama pengguna diperlukan.';
            } else if (!password) {
                errorMessage = 'Kata sandi diperlukan.';
            }
    
            if (errorMessage) {
                event.preventDefault(); // Mencegah pengiriman form jika ada error
                document.getElementById('errorMessage').textContent = errorMessage;
                var errorModal = new bootstrap.Modal(document.getElementById('errorPopup')); // Inisialisasi modal
                errorModal.show(); // Menampilkan modal error
            }
        });
    
        // Menampilkan modal error jika ada error dari server
        @if (session('error'))
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('errorMessage').textContent = "{{ session('error') }}";
                var errorModal = new bootstrap.Modal(document.getElementById('errorPopup')); // Inisialisasi modal
                errorModal.show(); // Menampilkan modal error
            });
        @endif
    </script>
    
    <script src="{{ asset('backoffice/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backoffice/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backoffice/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('backoffice/js/plugins.js') }}"></script>

    <script src="{{ asset('backoffice/js/pages/password-addon.init.js') }}"></script>
</body>

</html>
