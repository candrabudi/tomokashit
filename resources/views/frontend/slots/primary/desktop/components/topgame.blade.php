<div class="mt-20">
    <div class="flex items-center justify-end pb-10px text-24px">
        <div class="var-menu var--box var-menu-select relative" tabindex="-1">
            <button class="var-button var--box var-button--normal var--inline-flex var-button--default block h-36 rd-10 bg-dark-600 text-white hover:bg-dark-700 focus:ring-2 focus:ring-dark-500" type="button">
                <div class="var-button__content flex items-center justify-between w-full">
                    <span>Lihat Semua Provider</span>
                    <i class="var-icon var-icon--set var-icon-chevron-down text-16 transition-transform duration-300 transform rotate-0 group-hover:rotate-180"></i>
                </div>
            </button>
        </div>
    </div>

    <style>
        .bg-dark-600 { background-color: #2c3e50; }
        .bg-dark-700 { background-color: #34495e; }
        .text-white { color: #ffffff; }
        .hover\:bg-dark-700:hover { background-color: #34495e; }
        .focus\:ring-dark-500:focus { outline: none; box-shadow: 0 0 0 2px #1abc9c; }
        .transition-transform { transition: transform 0.3s ease; }
        .transform { transform: rotate(0deg); }
        .group:hover .transform { transform: rotate(180deg); }
    </style>

    <div id="content" class="mt-20">
        <div class="var-row var--box" style="justify-content: flex-start; align-items: flex-start; margin: -5px;" id="game-list">
            @foreach ($games as $gm)
                @php
                    $is_maintenance = ($gm->game_status == 0);
                    $is_authenticated = auth()->check();
                @endphp
                <div class="var-col var--box var-col--span-3" style="flex-direction: row; padding: 5px;">
                    <a href="javascript:void(0)" 
                        class="cursor-pointer mt-20"
                        onclick="checkGameStatus('{{ $gm->game_alias }}', '{{ $is_maintenance }}', '{{ $is_authenticated }}', '{{ route('casino.slots.play', $gm->game_alias ?? 1) }}')"
                        style="width: 7.39583vw;">
                        
                        <div class="relative w-full flex-shrink-0 overflow-hidden rd-10 bg-[position:center] bg-[size:53%_28%] bg-[url(/assets/image/logo_gray.png)] bg-no-repeat bg-paper" style="height: 9.89583vw;">
                            <img src="{{ (strpos($gm->game_image, 'https://') === 0) ? $gm->game_image : asset($gm->game_image) }}" class="absolute left-0 top-0 h-full object-cover object-center transition-all" alt="{{ $gm->game_name }}" loading="lazy">
                        </div>
                        <div class="relative mt-10 w-full overflow-hidden text-ellipsis whitespace-nowrap pl-14 text-14">
                            <span class="absolute left-0 top-1/2 h-8 w-8 rd-full -mt-4 bg-primary"></span>
                            <span style="color: #ffffff">{{ $gm->provider_name }}</span> <br>
                            <span class="color-text-sub" style="color: #ffffff">{{ $gm->game_name }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div id="progress-bar-container" class="flex justify-center py-30">
        <div>
            <div class="var-progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="12.307692307692308">
                <div class="var-progress__linear">
                    <div class="var-progress__linear-block var-progress__linear-background" style="height: 4px;">
                        <div id="progress-bar" class="var-progress__linear-certain var-progress__linear--primary" style="width: 12.3077%;"></div>
                    </div>
                </div>
            </div>
            <div id="loading-text" class="mt-8 text-center text-12">Memuat lebih banyak...</div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function checkGameStatus(gameAlias, isMaintenance, isAuthenticated, gameUrl) {
        if (!gameAlias) {
            Swal.fire({
                icon: 'error',
                title: 'Game Alias Kosong',
                text: 'Game ini tidak memiliki alias. Tidak dapat dimainkan.',
            });
            return;
        }

        if (isMaintenance === '1') {
            Swal.fire({
                icon: 'info',
                title: 'Maintenance',
                text: 'Game ini sedang dalam perbaikan. Silakan coba lagi nanti.',
            });
            return;
        }

        if (isAuthenticated !== '1') {
            Swal.fire({
                icon: 'warning',
                title: 'Login Diperlukan',
                text: 'Anda harus login terlebih dahulu untuk memainkan game ini.',
                showCancelButton: true,
                confirmButtonText: 'Login Sekarang',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/login'; // Ganti dengan URL login Anda
                }
            });
            return;
        }

        // Jika tidak dalam maintenance, alias tidak kosong, dan sudah login, redirect ke halaman game
        window.location.href = gameUrl;
    }
</script>

<script>
    let page = 1;
    let loading = false;
    const progressBar = document.getElementById('progress-bar');
    const loadingText = document.getElementById('loading-text');
    const gameList = document.getElementById('game-list');
    
    window.addEventListener('scroll', function () {
        if (loading) return;

        if (window.innerHeight + window.scrollY >= document.documentElement.scrollHeight - 100) {
            loading = true;
            loadingText.style.display = 'block';

            fetch(`/load-more-games?page=${page + 1}`)
                .then(response => response.json())
                .then(data => {
                    if (data.games.length > 0) {
                        data.games.forEach(game => {
                            const gameHtml = `
                                <div class="var-col var--box var-col--span-3" style="flex-direction: row; padding: 5px;">
                                    <a href="/casino/slots/play/${game.game_alias}" class="cursor-pointer mt-20" style="width: 7.39583vw;">
                                        <div class="relative w-full flex-shrink-0 overflow-hidden rd-10 bg-[position:center] bg-[size:53%_28%] bg-[url(/assets/image/logo_gray.png)] bg-no-repeat bg-paper" style="height: 9.89583vw;">
                                            <img src="${game.game_image}" class="absolute left-0 top-0 h-full object-cover object-center transition-all" alt="${game.game_name}" loading="lazy">
                                        </div>
                                        <div class="relative mt-10 w-full overflow-hidden text-ellipsis whitespace-nowrap pl-14 text-14">
                                            <span class="absolute left-0 top-1/2 h-8 w-8 rd-full -mt-4 bg-primary"></span>
                                            <span style="color: #ffffff">${game.provider_name}</span> <br>
                                            <span class="color-text-sub" style="color: #ffffff">${game.game_name}</span>
                                        </div>
                                    </a>
                                </div>
                            `;
                            gameList.innerHTML += gameHtml;
                        });

                        page++;
                        let progress = (page / data.total_pages) * 100;
                        progressBar.style.width = `${progress}%`;
                    } else {
                        loadingText.innerHTML = "Semua telah dimuat";
                    }
                    loading = false;
                    loadingText.style.display = 'none';
                })
                .catch(() => {
                    loading = false;
                    loadingText.style.display = 'none';
                    console.error('Failed to load more games');
                });
        }
    });
</script>
