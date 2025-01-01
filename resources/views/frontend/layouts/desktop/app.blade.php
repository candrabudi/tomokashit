<html lang="en" class="dark" style="--zsiqf-custom-bg-color: #46dd6b;">

<head>
    <style id="react-native-stylesheet"></style>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#1e2734">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="format-detection" content="telephone=no">
    <meta name="nightmode" content="disable">
    <meta name="color-scheme" content="light">

    @php
        $settings = \App\Models\GeneralSetting::first();
    @endphp

    <title>{{ $settings->site_title ?? 'SpotBet' }}</title>

    <meta name="description"
        content="{{ $settings->site_description ?? 'Spotbet adalah platform taruhan olahraga online terdepan di Indonesia...' }}">

    <meta name="keywords"
        content="{{ $settings->meta_keywords ?? 'Taruhan olahraga Indonesia, taruhan online Indonesia, taruhan sepak bola Indonesia, Spotbet...' }}">

    @if ($settings && $settings->site_favicon)
        <link rel="icon" href="{{ asset('storage/' . $settings->site_favicon) }}" type="image/x-icon">
    @endif

    @if ($settings && $settings->site_logo)
        <link rel="icon" href="{{ asset('storage/' . $settings->site_logo) }}" type="image/x-icon">
    @endif
    <link rel="stylesheet" href="{{ asset('frontend/desktop/style-DU9jrg1b.css') }}">
    <style>
        .hidden {
            display: none;
        }
    </style>
    <style id="varlet-style-vars">
        :root:root {
            --color-body: #F4F6FA;
            --paper-background: #fff;
            --color-primary: #0AD664;
            --color-text: #1F2734;
            --color-text-sub: #8F99A5;
        }

        .menu-button {
            display: flex;
            align-items: center;
            background: none;
            border: none;
            outline: none;
            line-height: 40px;
        }

        .icon-container {
            display: flex;
            align-items: center;
            margin-right: 8px;
            /* Jarak antara ikon dan teks */
        }

        .menu-label {
            display: flex;
            align-items: center;
        }
    </style>
    <style>
        .poppins-thin {
            font-family: "Poppins", serif;
            font-weight: 100;
            font-style: normal;
        }

        .poppins-extralight {
            font-family: "Poppins", serif;
            font-weight: 200;
            font-style: normal;
        }

        .poppins-light {
            font-family: "Poppins", serif;
            font-weight: 300;
            font-style: normal;
        }

        .poppins-regular {
            font-family: "Poppins", serif;
            font-weight: 400;
            font-style: normal;
        }

        .poppins-medium {
            font-family: "Poppins", serif;
            font-weight: 500;
            font-style: normal;
        }

        .poppins-semibold {
            font-family: "Poppins", serif;
            font-weight: 600;
            font-style: normal;
        }

        .poppins-bold {
            font-family: "Poppins", serif;
            font-weight: 700;
            font-style: normal;
        }

        .poppins-extrabold {
            font-family: "Poppins", serif;
            font-weight: 800;
            font-style: normal;
        }

        .poppins-black {
            font-family: "Poppins", serif;
            font-weight: 900;
            font-style: normal;
        }

        .poppins-thin-italic {
            font-family: "Poppins", serif;
            font-weight: 100;
            font-style: italic;
        }

        .poppins-extralight-italic {
            font-family: "Poppins", serif;
            font-weight: 200;
            font-style: italic;
        }

        .poppins-light-italic {
            font-family: "Poppins", serif;
            font-weight: 300;
            font-style: italic;
        }

        .poppins-regular-italic {
            font-family: "Poppins", serif;
            font-weight: 400;
            font-style: italic;
        }

        .poppins-medium-italic {
            font-family: "Poppins", serif;
            font-weight: 500;
            font-style: italic;
        }

        .poppins-semibold-italic {
            font-family: "Poppins", serif;
            font-weight: 600;
            font-style: italic;
        }

        .poppins-bold-italic {
            font-family: "Poppins", serif;
            font-weight: 700;
            font-style: italic;
        }

        .poppins-extrabold-italic {
            font-family: "Poppins", serif;
            font-weight: 800;
            font-style: italic;
        }

        .poppins-black-italic {
            font-family: "Poppins", serif;
            font-weight: 900;
            font-style: italic;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style type="text/css">
        .marquee-text-wrap {
            overflow: hidden
        }

        .marquee-text-content {
            width: 100000px
        }

        .marquee-text-text {
            -webkit-animation-name: marquee-text-animation;
            animation-name: marquee-text-animation;
            -webkit-animation-timing-function: linear;
            animation-timing-function: linear;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            float: left
        }

        .marquee-text-paused .marquee-text-text {
            -webkit-animation-play-state: paused;
            animation-play-state: paused
        }

        @-webkit-keyframes marquee-text-animation {
            0% {
                -webkit-transform: translateX(0);
                transform: translateX(0)
            }

            to {
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%)
            }
        }

        @keyframes marquee-text-animation {
            0% {
                -webkit-transform: translateX(0);
                transform: translateX(0)
            }

            to {
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%)
            }
        }
    </style>
    <style>
        body {
            background: #232A34;
        }
    </style>

    @yield('desktop_styles')
</head>

<body class="">
    <div id="app" class="scrollbar-hide" data-v-app="">
        <div>
            <div class="default-layout">
                <div class="mx-auto">
                    @include('frontend.layouts.desktop.components.menutop')
                    @yield('content')
                </div>
                <div class="w-full flex pl-[var(--menu-width)] pr-[var(--right-width)]"
                    style="background: #191D26; color: #FFF;">
                    <div class="w-full px-20">
                        <div class="flex items-end justify-between b-b-1 b-b-#EDEDED b-b-solid pb-20 pt-20">
                            <div>
                                @php
                                    $settings = \App\Models\GeneralSetting::first(); // Ambil pengaturan pertama
                                @endphp

                                <div class="flex items-center">
                                    @if ($settings && $settings->site_logo)
                                        <img class="h-70 w-70" src="{{ asset('storage/' . $settings->site_logo) }}"
                                            alt="logo">
                                    @else
                                        <img class="h-70 w-70" src="https://www.7spb1772.com/assets/image/logo.png"
                                            alt="spotbet">
                                    @endif
                                    <div class="ml-20 text-27 font-bold italic">{{ $settings->site_title ?? 'SpotBet' }}
                                    </div>
                                </div>

                                <div class="mt-10 text-14 color-text-sub">
                                    Kasino Kripto Berprestasi. SpotBet berfokus pada pemain dan memenuhi kebutuhan jutaan penjudi global. Kami memastikan pengalaman berjudi yang abadi dan penuh hiburan bagi para pemain.
                                </div>
                            </div>
                        </div>

                        <div class="h-80 flex flex-col items-center justify-center text-center text-14 color-text-sub">
                            <div>Hak Cipta ©2024 Maysit. Semua Hak Dilindungi.</div>
                        </div>
                    </div>

                    <div class="fixed bottom-[16px] right-[10px] z-100 pb-70">
                        <div class="btn-onservice h-[50px] w-[50px] flex cursor-pointer items-center justify-center rd-50"
                            style="box-shadow: rgba(170, 181, 199, 0.3) 0px 4px 10px;background: #FFF;">
                            <img src="https://www.7spb1772.com/assets/icon/service_icon2.svg" alt="">
                        </div>
                    </div>
                </div>

            </div>
            <div></div>
        </div>
    </div>

    <div class="var--box var-popup" style="z-index: 1998; display: none;">
        <div class="var-popup__overlay" style="z-index: 1999;"></div>
        <div class="var-popup__content var-popup--center var-popup--content-background-color var-elevation--3 h-640 w-800 rounded-8px"
            role="dialog" aria-modal="true" style="z-index: 2000; display: none;"></div>
    </div>
    <div class="var-menu__menu var--box"
        style="z-index: 2000; display: none; position: absolute; left: 0px; top: 0px; margin: 0px;">
        <div class="var-menu-select__menu var-elevation--3">
            <div class="var-menu-option var--box var-menu-option--normal var-menu-option--selected-color"
                tabindex="-1">
                <div class="var-menu-option__cover var-menu-option--selected-background"></div>
                <div class="var-menu-option__text"><span class="var--ellipsis">Indonesian</span></div>
                <div class="var-hover-overlay"></div>
            </div>
        </div>
    </div>
    <div class="var-menu__menu var--box"
        style="z-index: 2000; display: none; position: absolute; left: 0px; top: 0px; margin: 0px;">
        <div class="var-menu-select__menu var-elevation--3">
            <div class="var-menu-option var--box var-menu-option--normal var-menu-option--selected-color"
                tabindex="-1">
                <div class="var-menu-option__cover var-menu-option--selected-background"></div>
                <div class="var-menu-option__text"><span class="var--ellipsis">Odds indonesia</span></div>
                <div class="var-hover-overlay"></div>
            </div>
            <div class="var-menu-option var--box var-menu-option--normal" tabindex="-1">
                <div class="var-menu-option__cover"></div>
                <div class="var-menu-option__text"><span class="var--ellipsis">Odds eropa</span></div>
                <div class="var-hover-overlay"></div>
            </div>
            <div class="var-menu-option var--box var-menu-option--normal" tabindex="-1">
                <div class="var-menu-option__cover"></div>
                <div class="var-menu-option__text"><span class="var--ellipsis">Odds hongkong</span></div>
                <div class="var-hover-overlay"></div>
            </div>
            <div class="var-menu-option var--box var-menu-option--normal" tabindex="-1">
                <div class="var-menu-option__cover"></div>
                <div class="var-menu-option__text"><span class="var--ellipsis">Odds malaysia</span></div>
                <div class="var-hover-overlay"></div>
            </div>
            <div class="var-menu-option var--box var-menu-option--normal" tabindex="-1">
                <div class="var-menu-option__cover"></div>
                <div class="var-menu-option__text"><span class="var--ellipsis">Odds amerika</span></div>
                <div class="var-hover-overlay"></div>
            </div>
        </div>
    </div>
    <div class="var-back-top ver-back-top" style="right: 10px; bottom: 16px;">
        <div data-v-c0e6d3c3=""
            class="btn-backtop h-[50px] w-[50px] flex cursor-pointer items-center justify-center rd-50"
            style="box-shadow: rgba(170, 181, 199, 0.3) 0px 4px 10px;"></div>
    </div>


    <!-- Masuk Modal (Login Modal) -->
    <div id="masukModal" class="modal">

        <div class="var--box var-popup" style="z-index: 2001;">
            <div class="var-popup__overlay" style="z-index: 2002;"></div>
            <div class="var-popup__content var-popup--center var-popup--content-background-color var-elevation--3 h-640 w-800 rounded-8px"
                role="dialog" aria-modal="true" style="z-index: 2003;">
                <div class="login-popup-box h-100% flex justify-between">
                    <div class="h-100% w-50%">
                        <div class="var-image var--box h-full w-full" style="border-radius: 0px;">
                            <img role="img" class="var-image__image"
                                src="https://c.wallhere.com/images/f2/ae/7d19f4ec6a4f6609c624a0d8e9f9-2284554.png!d"
                                style="object-fit: fill; object-position: 50% 50%;">
                        </div>
                    </div>
                    <div class="relative h-100% w-50% bg-body">
                        <div class="absolute right-20 top-20 z-1 cursor-pointer" onclick="closeModal('masuk')"><img
                                class="h-[20px] w-[20px]" src="https://www.7spb1772.com/assets/icon/icon_close.svg">
                        </div>
                        <div class="px-30 pb-10 pt-52">
                            <div class="mb-27 text-20 color-text font-bold line-height-28">Login dengan akun</div>
                            <div>
                                <form class="var-form" method="POST" action="{{ route('user.login.process') }}">
                                    @csrf
                                    <div class="ver-input">
                                        <div
                                            class="ver-input-tips mb-4 min-h-[16px] flex items-center justify-between font-size-[12px]">
                                            <div class="color-text"><span class="opacity-80">Silakan masukan
                                                    akun anda</span></div><span
                                                class="mr-[var(--form-details-message-margin-right)] color-text-sub"></span>
                                        </div>
                                        <div class="var-input var--box bg_body">
                                            <div class="var-field-decorator var--box var-field-decorator--outlined">
                                                <div class="var-field-decorator__controller"
                                                    style="cursor: text; overflow: hidden; --field-decorator-middle-offset-left: 11px; --field-decorator-middle-offset-width: 336px; --field-decorator-middle-offset-height: 31px;">
                                                    <div
                                                        class="var-field-decorator__icon var-field-decorator--icon-non-hint">
                                                    </div>
                                                    <div
                                                        class="var-field-decorator__middle var-field-decorator--middle-non-hint">
                                                        <input class="var-input__input" autocomplete="new-password"
                                                            type="text" placeholder="Masukkan Nomor Akun Anda"
                                                            value="" id="var-input-407" name="username"
                                                            style="--input-placeholder-color: var(--field-decorator-placeholder-color, var(--field-decorator-blur-color));">
                                                    </div>
                                                    <div
                                                        class="var-field-decorator__icon var-field-decorator--icon-non-hint">

                                                    </div>
                                                </div>
                                                <fieldset class="var-field-decorator__line">
                                                    <legend class="var-field-decorator__line-legend">
                                                    </legend>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ver-input ver-input mt-10">
                                        <div
                                            class="ver-input-tips mb-4 min-h-[16px] flex items-center justify-between font-size-[12px]">
                                            <div class="color-text"><span class="opacity-80">Kata sandi</span>
                                            </div><span
                                                class="mr-[var(--form-details-message-margin-right)] color-text-sub"></span>
                                        </div>
                                        <div class="var-input var--box bg_body">
                                            <div class="var-field-decorator var--box var-field-decorator--outlined">
                                                <div class="var-field-decorator__controller"
                                                    style="cursor: text; overflow: hidden; --field-decorator-middle-offset-left: 11px; --field-decorator-middle-offset-width: 318px; --field-decorator-middle-offset-height: 31px;">
                                                    <div
                                                        class="var-field-decorator__icon var-field-decorator--icon-non-hint">
                                                    </div>
                                                    <div
                                                        class="var-field-decorator__middle var-field-decorator--middle-non-hint">
                                                        <input tabindex="-1" class="var-input__autocomplete"
                                                            placeholder="Masukkan Kata Sandi"
                                                            style="--input-placeholder-color: var(--field-decorator-placeholder-color, var(--field-decorator-blur-color));"><input
                                                            class="var-input__input" autocomplete="new-password"
                                                            type="password" placeholder="Masukkan Kata Sandi"
                                                            value="" id="var-input-414" name="password"
                                                            style="--input-placeholder-color: var(--field-decorator-placeholder-color, var(--field-decorator-blur-color));">
                                                    </div>
                                                    <div
                                                        class="var-field-decorator__icon var-field-decorator--icon-non-hint">
                                                        <img class="ml-[8px] h-[16px] w-[16px] cursor-pointer"
                                                            src="/assets/icon/eyes_closed.svg">
                                                    </div>
                                                </div>
                                                <fieldset class="var-field-decorator__line">
                                                    <legend class="var-field-decorator__line-legend">
                                                    </legend>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        class="var-button var--box var-button--normal var--inline-flex var-button--primary mt-[203px] h-[44px] w-full rounded-[10px] text-[14px] font-bold"
                                        type="submit">
                                        <div class="var-button__content">Masuk</div>
                                        <div class="var-hover-overlay"></div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="daftarModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('daftar')">&times;</span>
            <div class="modal-body">
                <div class="modal-image">
                    <img src="https://c.wallhere.com/images/f2/ae/7d19f4ec6a4f6609c624a0d8e9f9-2284554.png!d"
                        alt="Register Image">
                </div>
                <div class="modal-form">
                    <h2>Daftar</h2>
                    <form id="registerForm" action="{{ route('auth.user.register.process') }}" method="POST">
                        @csrf

                        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}"
                            required class="input-field">
                        @error('username')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                            required class="input-field">
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <input type="password" name="password" placeholder="Password" required class="input-field">
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <input type="text" name="full_name" placeholder="Full Name"
                            value="{{ old('full_name') }}" required class="input-field">
                        @error('full_name')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <input type="text" name="phone_number" placeholder="Phone Number"
                            value="{{ old('phone_number') }}" required class="input-field">
                        @error('phone_number')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn-submit">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            animation: slideUp 0.5s ease-in-out;
        }

        /* Modal content */
        .modal-content {
            background-color: #191D26;
            color: white;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            width: 90%;
            max-width: 800px;
        }

        /* Modal body: Flex layout */
        .modal-body {
            display: flex;
            width: 100%;
        }

        /* Left side image */
        .modal-image {
            flex: 1;
            padding-right: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-image img {
            width: 100%;
            max-width: 300px;
            height: auto;
            border-radius: 10px;
        }

        /* Form container */
        .modal-form {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .modal-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Close button */
        .close {
            color: #232A34;
            float: right;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 15px;
        }

        .close:hover,
        .close:focus {
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }

        /* Form inputs */
        .input-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #232A34;
            background-color: #232A34;
            color: white;
            font-size: 16px;
        }

        .input-field:focus {
            border-color: #82D81F;
            background-color: #232A34;
        }

        /* Button styles */
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #82D81F;
            color: #232A34;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #66c200;
        }

        /* Error messages */
        .error {
            color: red;
            font-size: 12px;
        }

        /* Animation for modal slide-up */
        @keyframes slideUp {
            from {
                transform: translateY(100%);
            }

            to {
                transform: translateY(0);
            }
        }
    </style>

    <script>
        // Open modal function
        function openModal(modalType) {
            var modal = document.getElementById(modalType + 'Modal');
            modal.style.display = 'block';
        }

        // Close modal function
        function closeModal(modalType) {
            var modal = document.getElementById(modalType + 'Modal');
            modal.style.display = 'none';
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                closeModal('masuk');
                closeModal('daftar');
            }
        }
    </script>
    <script>
        document.getElementById('depositButton').addEventListener('click', function() {
            document.getElementById('depositModal').classList.remove('hidden');
        });

        document.getElementById('closeModalButton').addEventListener('click', function() {
            document.getElementById('depositModal').classList.add('hidden');
        });
    </script>

    @yield('desktop_scripts')
</body>

</html>
