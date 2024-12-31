@foreach ($slots as $index => $slgame)
    @if (count($slgame->gamesActive) >= 10)
        <div class="carousel-wrapper" style="margin-top: 50px;">
            <div class="carousel-header">
                <div class="slots-title" style="color: #FFF;">SLOTS {{ $slgame->provider_name }}</div>
                <div class="view-all">
                    <a href="#" style="color: #FFF;">View All</a>
                </div>
            </div>
            <div class="carousel-buttons">
                <button class="prev-btn" data-carousel-id="{{ $index }}" style="color: #FFF;">&#10094;</button>
                <button class="next-btn" data-carousel-id="{{ $index }}" style="color: #FFF;">&#10095;</button>
            </div>
            <div class="carousel-container">
                <div class="carousel-slide" id="carousel-slide-{{ $index }}">
                    @foreach ($slgame->gamesActive as $gma)
                        <div class="game-card">
                            <a href="javascript:void(0);" class="game-link" data-game-name="{{ $gma->game_name }}"
                                data-game-status="{{ $gma->game_status }}"
                                data-game-url="{{ route('casino.slots.play', $gma->game_alias) }}"
                                title="{{ $gma->game_name }}">
                                <div class="game-image-wrapper">
                                    <div class="game-image">
                                        <picture>
                                            <source srcset="{{ $gma->game_image }}">
                                            <img src="{{ $gma->game_image }}" alt="{{ $gma->game_name }}"
                                                loading="lazy">
                                        </picture>
                                        <div class="overlay"></div>
                                        <div class="play-icon-wrapper">
                                            <div class="play-icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M7.61 20.53C6.78 20.53 6 19.87 6 18.93V5.06997C6 4.12997 6.77 3.46997 7.6 3.46997C7.88 3.46997 8.17 3.53997 8.43 3.70997C11.24 5.43997 16.87 8.90997 19.68 10.64C20.19 10.95 20.49 11.48 20.49 12C20.49 12.52 20.19 13.05 19.68 13.36C16.87 15.09 11.24 18.55 8.43 20.29C8.16 20.45 7.88 20.53 7.6 20.53H7.61Z"
                                                        fill="#FEFEFE"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="game-title" style="color: #FFF">
                                    {{ $gma->game_name }}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endforeach
