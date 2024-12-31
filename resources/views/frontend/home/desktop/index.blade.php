@extends('frontend.layouts.app')
@section('desktop_styles')
    <style>
        .carousel-wrapper {
            display: flex;
            flex-direction: column;
            width: 100%;
            position: relative;
            overflow: hidden;
            margin-top: 50px;
        }

        .carousel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .slots-title {
            font-weight: bold;
            font-size: 22px;
            color: #fff;
        }

        .view-all a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .view-all a:hover {
            color: #0056b3;
        }

        .carousel-container {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            width: 100%;
            scroll-behavior: smooth;
            padding-bottom: 15px;
            padding-left: 10px;
            overflow: hidden;
        }

        .carousel-slide {
            display: flex;
            gap: 20px;
        }

        .game-card {
            position: relative;
            width: 200px;
            height: 200px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .game-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .game-link {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .game-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.3s ease;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .game-link:hover .overlay {
            opacity: 1;
        }

        /* Adjust hover effect to make the play icon appear in the middle */
        .play-icon-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .game-link:hover .play-icon-wrapper {
            opacity: 1;
        }

        .play-icon {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 50%;
            padding: 12px;
        }

        .game-title {
            text-align: center;
            padding: 10px;
            font-size: 16px;
            color: #333;
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            bottom: 0;
            width: 100%;
            box-sizing: border-box;
        }

        .game-title a {
            text-decoration: none;
            color: #fff;
        }

        .carousel-buttons {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            width: 100%;
            transform: translateY(-50%);
            z-index: 1;
        }

        .carousel-buttons button {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            font-size: 24px;
            cursor: pointer;
            border-radius: 50%;
            height: 40px;
            width: 40px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .carousel-buttons button:hover {
            background-color: rgba(0, 0, 0, 0.8);
            transform: scale(1.1);
        }

        .next-btn {
            right: 10px;
            border-radius: 50%;
        }

        .prev-btn {
            left: 10px;
            border-radius: 50%;
        }
    </style>
@endsection '
@section('content')
    @include('frontend.layouts.desktop.components.modal_deposit.deposit')
    <div style="background: #2C3A47; width: 100%;">
        @include('frontend.home.desktop.components.leftmenu')
        <main id="default-layout-main"
            class="relative ml-[var(--menu-width)] mr-[var(--right-width)] min-h-[100dvh] flex-1 px-20"
            style="padding: 20px; margin-top: -30px;">
            <div class="h-[var(--header-height)] w-full"></div>
            <div class="pb-20">
                @include('frontend.home.desktop.components.banner')
                @include('frontend.home.desktop.components.menucenter')
                @include('frontend.home.desktop.components.football')
                @include('frontend.home.desktop.components.slots')
            </div>
        </main>
        @include('frontend.home.desktop.components.rightmenu')
    </div>
@endsection

@section('desktop_scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.game-link').forEach(function(link) {
                link.addEventListener('click', function() {
                    var gameName = this.getAttribute('data-game-name');
                    var gameStatus = this.getAttribute('data-game-status');
                    var gameUrl = this.getAttribute('data-game-url');

                    @if (!Auth::check())
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'You need to be logged in to play!',
                        });
                    @else
                        if (gameStatus == 0) {
                            Swal.fire({
                                icon: 'info',
                                title: 'Game Coming Soon',
                                text: gameName + ' will be available shortly!',
                            });
                        } else {
                            window.location.href = gameUrl;
                        }
                    @endif
                });
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            // Menangani tombol prev dan next
            $('.prev-btn').click(function() {
                var carouselId = $(this).data('carousel-id');
                var slideWrapper = $('#carousel-slide-' + carouselId);
                var slideWidth = $('.game-card').outerWidth(true); // Mengambil lebar setiap slide
                var currentTransform = parseInt(slideWrapper.css('transform').split(',')[4]) ||
                    0; // Mengambil nilai transformasi saat ini

                // Menggeser ke kiri
                slideWrapper.css('transform', 'translateX(' + (currentTransform + slideWidth) + 'px)');
            });

            $('.next-btn').click(function() {
                var carouselId = $(this).data('carousel-id');
                var slideWrapper = $('#carousel-slide-' + carouselId);
                var slideWidth = $('.game-card').outerWidth(true); // Mengambil lebar setiap slide
                var currentTransform = parseInt(slideWrapper.css('transform').split(',')[4]) ||
                    0; // Mengambil nilai transformasi saat ini

                // Menggeser ke kanan
                slideWrapper.css('transform', 'translateX(' + (currentTransform - slideWidth) + 'px)');
            });

            // Cek jika ada cukup banyak item untuk menampilkan scroll
            $('.carousel-wrapper').each(function() {
                var gameCount = $(this).find('.game-card').length;
                if (gameCount < 10) {
                    $(this).find('.carousel-container').css('overflow-x',
                        'hidden'); // Disable horizontal scroll
                    $(this).find('.carousel-buttons').hide(); // Hide the buttons if less than 10 items
                }
            });
        });
    </script>
@endsection
