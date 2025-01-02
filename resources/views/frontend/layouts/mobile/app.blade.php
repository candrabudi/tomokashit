<!DOCTYPE html>
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

    <title>{{ $settings->site_title ?? 'SpotBet APP' }}</title>
    
    <meta name="description"
        content="{{ $settings->site_description ?? 'Spotbet adalah platform taruhan olahraga online terdepan di Indonesia...' }}">
    
    <meta name="keywords"
        content="{{ $settings->meta_keywords ?? 'Taruhan olahraga Indonesia, taruhan online Indonesia, taruhan sepak bola Indonesia, Spotbet...' }}">
    
    @if($settings && $settings->site_favicon)
        <link rel="icon" href="{{ asset('storage/' . $settings->site_favicon) }}" type="image/x-icon">
    @endif

    @if($settings && $settings->site_logo)
        <link rel="icon" href="{{ asset('storage/' . $settings->site_favicon) }}" type="image/x-icon">
    @endif

    <script src="{{ asset('frontend/mobile/index-kWXyNMgS.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/mobile/style-CngN0DEW.css') }}">
    <link rel="sitemap" type="application/xml" title="Sitemap" href="file:///sitemap.xml">
    <link rel="manifest" href="file:///manifest.webmanifest">
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-0L2EZ0SMFE"></script>
    <style id="varlet-style-vars">
        :root:root {
            --color-body: #F4F6FA;
            --paper-background: #fff;
            --color-primary: #0AD664;
            --color-text: #1F2734;
            --color-text-sub: #8F99A5;
        }
    </style>
    <link href="{{ asset('frontend/mobile/index-D1W99IC1.js') }}">
    <link href="{{ asset('frontend/mobile/TabBar.vue_vue_type_style_index_0_lang-Bgankzif.js') }}">
    <link href="{{ asset('frontend/mobile/BottomNavigationItemSfc-tKSHRZgZ.js') }}">
    <link href="{{ asset('frontend/mobile/TabSfc-C_ALwfcV.js') }}">
    <link href="{{ asset('frontend/mobile/halftime-HCmj6E4O.js') }}">
    <link href="{{ asset('frontend/mobile/useRequest-SxO9Z2jS.js') }}">
    <link href="{{ asset('frontend/mobile/index.vue_vue_type_script_setup_true_lang-BsAk-9xl.js') }}">
    <link href="{{ asset('frontend/mobile/ImageSfc-BKbCF4Sw.js') }}">
    <link href="{{ asset('frontend/mobile/index-B_IYqYKr.js') }}">
    <link href="{{ asset('frontend/mobile/neutral_ground-DPFQEIEq.js') }}">
    <link href="{{ asset('frontend/mobile/swipeItem-Dkb3cSs0.js') }}">
    <link href="{{ asset('frontend/mobile/SwipeItemSfc-l0sNRNKZ.js') }}">
    <link href="{{ asset('frontend/mobile/favors-BuQDtGtB.js') }}">
    <link href="{{ asset('frontend/mobile/home-D-6MU3db.js') }}">
    <link href="{{ asset('frontend/mobile/activity.vue_vue_type_script_setup_true_lang-D3pmP-Wb.js') }}">
    <link href="{{ asset('frontend/mobile/gameItem.vue_vue_type_script_setup_true_lang-CK5aYONp.js') }}">
    <link href="{{ asset('frontend/mobile/MenuOptionSfc-ZeEtUAmW.js') }}">
    <link href="{{ asset('frontend/mobile/usePopover-yE41gQhO.js') }}">
    <link href="{{ asset('frontend/mobile/category.vue_vue_type_script_setup_true_lang-BbeLBXat.js') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    @yield('mobile-style')
    <style>
        .be-vietnam-pro-thin {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 100;
            font-style: normal;
        }

        .be-vietnam-pro-extralight {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 200;
            font-style: normal;
        }

        .be-vietnam-pro-light {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 300;
            font-style: normal;
        }

        .be-vietnam-pro-regular {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 400;
            font-style: normal;
        }

        .be-vietnam-pro-medium {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 500;
            font-style: normal;
        }

        .be-vietnam-pro-semibold {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 600;
            font-style: normal;
        }

        .be-vietnam-pro-bold {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 700;
            font-style: normal;
        }

        .be-vietnam-pro-extrabold {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 800;
            font-style: normal;
        }

        .be-vietnam-pro-black {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 900;
            font-style: normal;
        }

        .be-vietnam-pro-thin-italic {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 100;
            font-style: italic;
        }

        .be-vietnam-pro-extralight-italic {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 200;
            font-style: italic;
        }

        .be-vietnam-pro-light-italic {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 300;
            font-style: italic;
        }

        .be-vietnam-pro-regular-italic {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 400;
            font-style: italic;
        }

        .be-vietnam-pro-medium-italic {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 500;
            font-style: italic;
        }

        .be-vietnam-pro-semibold-italic {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 600;
            font-style: italic;
        }

        .be-vietnam-pro-bold-italic {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 700;
            font-style: italic;
        }

        .be-vietnam-pro-extrabold-italic {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 800;
            font-style: italic;
        }

        .be-vietnam-pro-black-italic {
            font-family: "Be Vietnam Pro", serif;
            font-weight: 900;
            font-style: italic;
        }



        .var-popup {
            position: fixed;
            bottom: -100%;
            left: 0;
            right: 0;
            transition: bottom 0.5s ease-in-out;
            z-index: 2020;
            visibility: hidden;
        }

        .var-popup.show {
            visibility: visible;
            bottom: 0;
        }

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
</head>

<body class="">
    @yield('content_mobile')

    @include('frontend.layouts.mobile.components.modal_auth')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const swipeTrack = document.querySelector('.var-swipe__track');
        const swipeItems = document.querySelectorAll('.var-swipe-item');

        let currentIndex = 0;
        const itemWidth = 360;
        const totalItems = swipeItems.length;
        const transitionDuration = 300;

        function updateSwipePosition() {
            const offset = -currentIndex * itemWidth;
            swipeTrack.style.transform = `translateX(${offset}px)`;
            swipeTrack.style.transitionDuration = `${transitionDuration}ms`;

            const dots = document.querySelectorAll('.pagination-dots div');
            dots.forEach((dot, index) => {
                dot.style.backgroundColor = index === currentIndex ? '#fff' : '#797979';
            });
        }

        function createPaginationDots() {
            const paginationContainer = document.querySelector('.absolute.flex');
            paginationContainer.innerHTML = '';
            for (let i = 0; i < totalItems; i++) {
                const dot = document.createElement('div');
                dot.classList.add('mx-5px', 'h-8px', 'w-8px', 'rd-full');
                dot.style.backgroundColor = i === currentIndex ? '#fff' : '#797979';
                paginationContainer.appendChild(dot);

                dot.addEventListener('click', () => {
                    currentIndex = i;
                    updateSwipePosition();
                });
            }
        }

        let slideInterval = setInterval(() => {
            currentIndex = (currentIndex + 1) % totalItems;
            updateSwipePosition();
        }, 3000);

        const banner = document.getElementById('home-banner');
        banner.addEventListener('mouseover', () => clearInterval(slideInterval));
        banner.addEventListener('mouseout', () => {
            slideInterval = setInterval(() => {
                currentIndex = (currentIndex + 1) % totalItems;
                updateSwipePosition();
            }, 3000);
        });

        createPaginationDots();
        updateSwipePosition();
    </script>
    <script>
        $(document).ready(function() {
            $('#login-button').click(function() {
                $('.var-popup').addClass('show');
            });

            $('#close-login').click(function() {
                $('.var-popup').removeClass('show');
            });

            $('#close-register').click(function() {
                $('.var-popup').removeClass('show');
            });

            $('#register-link').click(function() {
                $('#login-section').hide();
                $('#register-section').show();
            });

            $('#back-to-login').click(function() {
                $('#register-section').hide();
                $('#login-section').show();
            });
        });
    </script>

</body>

</html>
