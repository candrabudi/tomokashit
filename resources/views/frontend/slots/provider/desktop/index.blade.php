@extends('frontend.layouts.app')
@section('desktop_styles')
    <style>
        .banner-slider {
            width: 50%;
            /* Lebar slider */
            height: 220px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .slider-wrapper {
            display: flex;
            width: 100%;
            /* Total lebar semua slide */
            transition: transform 0.5s ease-in-out;
            /* Transisi saat slide bergeser */
        }

        .slider-slide {
            width: 100%;
            /* Lebar per slide */
            flex: 1 0 100%;
        }

        .slider-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Tombol navigasi */
        .slider-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 24px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 100;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        /* Pagination bullets */
        .slider-pagination {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
        }

        .slider-pagination span {
            width: 10px;
            height: 10px;
            margin: 0 5px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .slider-pagination .active {
            background: white;
        }
    </style>

    <style>
        .provider-section {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .provider-section h1 {
            text-align: left;
            color: #fff;
        }

        .provider-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            width: 100%;
        }

        .provider-card {
            background-color: #232A34;
            color: #fff;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .provider-card img {
            width: 70px;
            height: auto;
        }

        .provider-card h3 {
            font-size: 1.5rem;
            margin: 0;
        }

        .provider-card p {
            font-size: 0.9rem;
            color: #555;
        }

        .provider-card:hover {
            transform: scale(1.05);
        }
    </style>
@endsection

@section('content')
    <div style="background: #2C3A47; width: 100%;">
        @include('frontend.home.desktop.components.leftmenu')
        <main id="default-layout-main"
            class="relative ml-[var(--menu-width)] mr-[var(--right-width)] min-h-[100dvh] flex-1 px-20"
            style="padding: 20px; margin-top: -30px;">
            <div class="h-[var(--header-height)] w-full"></div>
            <div class="pb-20">

                <div class="banner-slider">
                    <div class="slider-wrapper">
                        <div class="slider-slide">
                            <img src="https://s.spotbets.cc/pub/ad/zc5scx0o39gd5sjn2mg2o023wb2udux6.png" alt="Banner 1">
                        </div>
                        <div class="slider-slide">
                            <img src="https://s.spotbets.cc/pub/ad/zc5scx0o39gd5sjniupt6qx4429eajs8.png" alt="Banner 2">
                        </div>
                        <div class="slider-slide">
                            <img src="https://s.spotbets.cc/pub/ad/zc5scx0o39gd5u96ak6tyqshw6fmudxv.png" alt="Banner 3">
                        </div>
                        <div class="slider-slide">
                            <img src="https://s.spotbets.cc/pub/ad/zc5scx0o39gd5u96ak6tyqshw6fmudxv.png" alt="Banner 3">
                        </div>
                        <div class="slider-slide">
                            <img src="https://s.spotbets.cc/pub/ad/zc5scx0o39gd5u96ak6tyqshw6fmudxv.png" alt="Banner 3">
                        </div>
                    </div>

                    <!-- Tombol Navigasi -->
                    <button class="slider-nav prev">‹</button>
                    <button class="slider-nav next">›</button>

                    <!-- Pagination -->
                    <div class="slider-pagination">
                        <span class="active"></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>




                <div class="provider-section">
                    <h1>Providers</h1>
                    <div class="provider-grid">
                        @foreach ($providers as $pv)
                            <a href="{{ route('casino.slots.provider.games', $pv->provider_alias) }}" class="provider-card">
                                <img src="{{ asset($pv->provider_image_desktop) }}" alt="{{ $pv->provider_name }}">
                                <div>
                                    <h3>{{ $pv->provider_name }}</h3>
                                    <p>{{ count($pv->games) }} Games</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>


            </div>
        </main>
        @include('frontend.home.desktop.components.rightmenu')
    </div>
@endsection

@section('desktop_scripts')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        const slides = document.querySelectorAll('.slider-slide');
        const paginationContainer = document.querySelector('.slider-pagination');
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');
        const sliderWrapper = document.querySelector('.slider-wrapper');

        let currentSlide = 0;

        // Function to update the slider position
        function updateSliderPosition() {
            sliderWrapper.style.transform = `translateX(-${currentSlide * 100}%)`;

            // Update pagination bullets
            const pagination = document.querySelectorAll('.slider-pagination span');
            pagination.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }

        // Create pagination dynamically based on the number of slides
        function createPagination() {
            paginationContainer.innerHTML = ''; // Clear existing pagination
            slides.forEach((_, index) => {
                const dot = document.createElement('span');
                if (index === currentSlide) {
                    dot.classList.add('active');
                }
                dot.addEventListener('click', () => {
                    currentSlide = index;
                    updateSliderPosition();
                });
                paginationContainer.appendChild(dot);
            });
        }

        // Navigasi tombol "next"
        nextButton.addEventListener('click', () => {
            currentSlide = (currentSlide + 1) % slides.length;
            updateSliderPosition();
        });

        // Navigasi tombol "prev"
        prevButton.addEventListener('click', () => {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            updateSliderPosition();
        });

        // Initial setup
        createPagination();
        updateSliderPosition();
    </script>
@endsection
