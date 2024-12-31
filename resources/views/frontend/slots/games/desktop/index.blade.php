@extends('frontend.layouts.app')

@section('desktop_styles')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .game-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .game-card {
            position: relative;
            background-color: #232A34;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .game-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            transition: opacity 0.3s ease;
            opacity: 0;
        }

        .game-card .game-title {
            text-align: center;
            color: white;
            font-size: 1rem;
            margin-top: 10px;
        }

        .game-card .provider-name {
            text-align: center;
            color: #bdc3c7;
            font-size: 0.85rem;
        }

        .game-card:hover {
            transform: scale(1.05);
        }

        .game-card .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s ease;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 10px;
            border-radius: 50%;
        }

        .game-card:hover .play-icon {
            opacity: 1;
        }

        .play-icon svg {
            width: 50px;
            height: 50px;
            fill: #fff;
        }

        .back-button {
            margin-bottom: 20px;
            background-color: #34495E;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #2C3E50;
        }

        .search-bar {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-input {
            padding: 10px;
            width: 100%;
            max-width: 400px;
            background-color: #2C3A47;
            color: #fff;
            border: 1px solid #34495E;
            border-radius: 5px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .search-bar {
            display: flex;
            justify-content: flex-end;
            color: #FFFFFF;
        }

        .search-input {
            padding: 8px 12px;
            font-size: 16px;
            width: 800px;
            color: #FFFFFF;
            font-weight: normal;
        }

        .spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
        }

        .spinner img {
            width: 50px;
            height: 50px;
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
                <div class="header">
                    <button class="back-button" onclick="window.history.back();">Back</button>
                    <div class="search-bar">
                        <input type="text" id="searchGames" class="search-input" placeholder="Search games..."
                            onkeyup="filterGames()">
                    </div>
                </div>

                <div class="game-grid" id="gameGrid">
                    <div class="spinner" id="spinner">
                        <img src="{{ asset('images/spinner.gif') }}" alt="Loading...">
                    </div>
                    @foreach ($games->games as $game)
                        <div class="game-card">
                            <img data-src="{{ asset($game->game_image) }}" alt="{{ $game->game_name }}"
                                onerror="this.onerror=null;this.src='{{ asset('images/default-game.png') }}';"
                                class="lazy">
                            <div class="play-icon" onclick="checkGameStatus({{ $game->game_status }})">
                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="M7.61 20.53C6.78 20.53 6 19.87 6 18.93V5.06997C6 4.12997 6.77 3.46997 7.6 3.46997C7.88 3.46997 8.17 3.53997 8.43 3.70997C11.24 5.43997 16.87 8.90997 19.68 10.64C20.19 10.95 20.49 11.48 20.49 12C20.49 12.52 20.19 13.05 19.68 13.36C16.87 15.09 11.24 18.55 8.43 20.29C8.16 20.45 7.88 20.53 7.6 20.53H7.61Z"
                                        fill="#FEFEFE"></path>
                                </svg>
                            </div>
                            <div class="game-title">{{ $game->game_name }}</div>
                            <div class="provider-name">{{ $game->provider_name }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>

        @include('frontend.home.desktop.components.rightmenu')
    </div>
@endsection

@section('desktop_scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

            if ("IntersectionObserver" in window) {
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.classList.remove("lazy");
                            lazyImage.onload = function() {
                                lazyImage.style.opacity = 1;
                            };
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            }
        });

        function showSpinner(show) {
            let spinner = document.getElementById('spinner');
            spinner.style.display = show ? 'block' : 'none';
        }

        function filterGames() {
            let input = document.getElementById("searchGames");
            let filter = input.value.toLowerCase();
            let gameGrid = document.getElementById("gameGrid");
            let cards = gameGrid.getElementsByClassName("game-card");

            showSpinner(true);

            setTimeout(function() {
                Array.from(cards).forEach(function(card) {
                    let title = card.querySelector(".game-title").innerText.toLowerCase();
                    if (title.indexOf(filter) > -1) {
                        card.style.display = "";
                    } else {
                        card.style.display = "none";
                    }
                });

                showSpinner(false);
            }, 500);
        }

        function checkGameStatus(gameStatus) {
            @auth
            var userLoggedIn = true;
            @else
            var userLoggedIn = false;
            @endauth

            if (gameStatus === 0 || !userLoggedIn) {
                Swal.fire({
                    title: 'Oops!',
                    text: 'You must be logged in to play or the game is unavailable.',
                    icon: 'warning',
                    confirmButtonText: 'Okay'
                });
            }
        }
    </script>
@endsection
