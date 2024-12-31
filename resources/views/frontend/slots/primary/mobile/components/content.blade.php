<style>
    option {
        background: #232A34
    }
</style>
<div class="pb-60">
    <div>
        <div class="sticky top-[calc(var(--top-nav-height)+var(--top-notice-height)+109px)] z-8 items-center justify-between bg-[#1E232B] px-8 py-6 text-2xl"
            style="background: #232A34; color: #FFFFFF; border-bottom: 1px solid #3A3F47; padding: 10px;">
            <!-- Provider Filter Dropdown -->
            <div tabindex="-1">
                <select id="providerFilter"
                    class="text-xl bg-transparent text-white border border-gray-600 rounded-lg p-3 w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                    style="padding: 10px;" style="background: #232A34; color: #FFFFFF;">
                    <option value="">Semua Provider</option>
                </select>
            </div>

            <div tabindex="-1" style="margin-top: 15px;">
                <div class="flex items-center font-bold text-xl text-gray-300 mb-2">
                    <input type="text" id="gameSearch" placeholder="Search Games"
                        class="text-xl text-white bg-transparent w-full p-3 rounded-lg border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        style="padding: 10px;" />
                </div>
            </div>
        </div>



        <div style="margin-top: 35px;">
            <div class="relative overflow-hidden bg-body" style="height: 0px;">
                <div class="absolute bottom-0 w-full">
                    <div class="h-[230px] flex flex-col items-center justify-center">
                        <img class="h-100 w-200" src="/assets/image/loading_pull.png" style="display: none;">
                        <img class="h-100 w-200" src="/assets/image/loading_pull_before.png">
                        <div class="text-24 color-text font-500 opacity-30">Tarik ke bawah untuk menyegarkan</div>
                    </div>
                </div>
            </div>

            <!-- Game List -->
            <div class="var-list var--box" empty="false" pullrefreshenable="true" id="gameList">
                <div class="flex flex-wrap justify-between px-[20px]" id="gameContainer">

                </div>


                <div id="loadMoreButton" class="w-full text-center py-4" style="display: none;">
                    <button class="btn btn-primary load-more-btn" onclick="loadMoreGames()">Load More</button>
                </div>

                <style>
                    /* Container Style */
                    #loadMoreButton {
                        padding: 20px;
                        border-radius: 10px;
                    }

                    /* Button Style */
                    .load-more-btn {
                        padding: 12px 24px;
                        background-color: #191D26;
                        color: #fff;
                        border: none;
                        border-radius: 6px;
                        font-size: 12px;
                        font-weight: 500;
                        transition: background-color 0.3s ease, transform 0.2s ease;
                    }

                    /* Hover effect */
                    .load-more-btn:hover {
                        background-color: #191D26;
                        transform: scale(1.05);
                    }

                    /* Focus effect */
                    .load-more-btn:focus {
                        outline: none;
                    }

                    /* Responsive Adjustment */
                    @media (max-width: 768px) {
                        .load-more-btn {
                            width: 80%;
                        }
                    }
                </style>


                <div class="var-list__detector"></div>
            </div>

            <!-- Loading Spinner -->
            <div id="loadingSpinner" class="flex justify-center items-center w-full h-[100px]" style="display: none;">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div class="h-[env(safe-area-inset-bottom)] w-full"></div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Add SweetAlert -->

<script>
    let page = 1; // Halaman pertama
    let providerFilter = '';
    let gameSearch = '';
    let isLoading = false; // Menandakan apakah kita sedang memuat data atau tidak
    let hasMoreGames = true; // Menandakan apakah masih ada data untuk dimuat

    // Fungsi untuk memuat penyedia (provider) ke dalam dropdown
    function loadProviders() {
        fetch('/providers')
            .then(response => response.json())
            .then(data => {
                const providerSelect = document.getElementById('providerFilter');
                data.forEach(provider => {
                    const option = document.createElement('option');
                    option.value = provider.id;
                    option.textContent = provider.provider_name;
                    providerSelect.appendChild(option);
                });
            });
    }

    // Fungsi untuk memuat games berdasarkan filter dan pencarian
    function loadGames() {
        // Pastikan kita tidak memuat data lebih dari sekali pada waktu yang sama
        if (isLoading || !hasMoreGames) return;

        isLoading = true; // Tandai bahwa data sedang dimuat
        document.getElementById('loadingSpinner').style.display = 'flex'; // Tampilkan spinner

        const url = `/games?page=${page}&provider=${providerFilter}&search=${gameSearch}`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                const games = data.games;
                const gameContainer = document.getElementById('gameContainer');

                if (games.length === 0) {
                    hasMoreGames = false; // Tidak ada game lagi yang bisa dimuat
                }

                // Tambahkan games ke dalam container
                games.forEach(game => {
                    const gameImage = game.game_image; // URL gambar dari data game

                    // Periksa apakah gambar menggunakan URL eksternal (https://)
                    const imageUrl = gameImage.startsWith('https://') ? gameImage : assetUrl(gameImage);

                    // Fungsi untuk mengembalikan URL asset dari Laravel
                    function assetUrl(path) {
                        return `{{ asset('${path}') }}`;
                    }

                    // Menambahkan elemen gambar ke dalam DOM
                    const gameElement = `
    <div class="mb-[20px]" style="width: 29.8667vw;" onclick="handleGameClick(${game.id}, ${game.game_status})">
        <div class="relative w-full flex-shrink-0 overflow-hidden rounded-[20px] bg-[position:center] bg-[size:130px_90px] bg-[url(/assets/image/logo_gray.png)] bg-body bg-no-repeat" style="height: 32vw;">
            <div class="var-image var--box absolute left-0 top-0 h-full w-full" style="border-radius: 0px;">
                <img role="img" class="var-image__image" src="${imageUrl}" style="object-fit: fill; object-position: 50% 50%;">
            </div>
        </div>
        <div class="relative mt-10px w-full overflow-hidden text-ellipsis whitespace-nowrap pl-20px text-24px">
            <span class="absolute left-0 top-1/2 h-10px w-10px rd-full -mt-5px bg-primary"></span>
            <span style="color: #FFFFFF">${game.provider.provider_name}</span><br>
            <span class="color-text-sub" style="color: #FFFFFF">${game.game_name}</span>
        </div>
    </div>
`;
                    gameContainer.innerHTML += gameElement;
                });

                // Jika masih ada data, tampilkan tombol Load More
                if (hasMoreGames) {
                    document.getElementById('loadMoreButton').style.display = 'block';
                } else {
                    document.getElementById('loadMoreButton').style.display = 'none';
                }

                isLoading = false; // Tandai bahwa data telah dimuat
                document.getElementById('loadingSpinner').style.display = 'none'; // Sembunyikan spinner
            })
            .catch(() => {
                isLoading = false; // Jika terjadi error, set isLoading menjadi false
                document.getElementById('loadingSpinner').style.display = 'none'; // Sembunyikan spinner
            });
    }

    // Fungsi untuk memuat lebih banyak game
    function loadMoreGames() {
        if (isLoading || !hasMoreGames) return;

        isLoading = true; // Tandai bahwa data sedang dimuat
        document.getElementById('loadingSpinner').style.display = 'flex'; // Tampilkan spinner
        page++; // Naikkan halaman untuk memuat lebih banyak

        const url = `/games?page=${page}&provider=${providerFilter}&search=${gameSearch}`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                const games = data.games;
                const gameContainer = document.getElementById('gameContainer');

                if (games.length === 0) {
                    hasMoreGames = false; // Tidak ada game lagi yang bisa dimuat
                }

                // Tambahkan games ke dalam container
                games.forEach(game => {
                    const gameImage = game.game_image; // URL gambar dari data game

                    // Periksa apakah gambar menggunakan URL eksternal (https://)
                    const imageUrl = gameImage.startsWith('https://') ? gameImage : assetUrl(gameImage);

                    // Fungsi untuk mengembalikan URL asset dari Laravel
                    function assetUrl(path) {
                        return `{{ asset('${path}') }}`;
                    }
                    const gameElement = `
    <div class="mb-[20px]" style="width: 29.8667vw;" onclick="handleGameClick(${game.id}, ${game.game_status})">
        <div class="relative w-full flex-shrink-0 overflow-hidden rounded-[20px] bg-[position:center] bg-[size:130px_90px] bg-[url(/assets/image/logo_gray.png)] bg-body bg-no-repeat" style="height: 32vw;">
            <div class="var-image var--box absolute left-0 top-0 h-full w-full" style="border-radius: 0px;">
                <img role="img" class="var-image__image" src="${imageUrl}" style="object-fit: fill; object-position: 50% 50%;">
            </div>
        </div>
        <div class="relative mt-10px w-full overflow-hidden text-ellipsis whitespace-nowrap pl-20px text-24px">
            <span class="absolute left-0 top-1/2 h-10px w-10px rd-full -mt-5px bg-primary"></span>
            <span style="color: #FFFFFF">${game.provider.provider_name}</span><br>
            <span class="color-text-sub" style="color: #FFFFFF">${game.game_name}</span>
        </div>
    </div>
`;
                    gameContainer.innerHTML += gameElement;
                });

                // Jika masih ada data, tampilkan tombol Load More
                if (hasMoreGames) {
                    document.getElementById('loadMoreButton').style.display = 'block';
                } else {
                    document.getElementById('loadMoreButton').style.display = 'none';
                }

                isLoading = false; // Tandai bahwa data telah dimuat
                document.getElementById('loadingSpinner').style.display = 'none'; // Sembunyikan spinner
            })
            .catch(() => {
                isLoading = false;
                document.getElementById('loadingSpinner').style.display = 'none';
            });
    }

    // Filter berdasarkan provider
    $('#providerFilter').change(function() {
        providerFilter = $(this).val();
        page = 1; // Reset halaman ketika filter diubah
        hasMoreGames = true; // Set agar bisa memuat game lagi
        $('#gameContainer').html(''); // Hapus daftar game yang ada
        loadGames();
    });

    // Fungsi pencarian
    $('#gameSearch').on('input', function() {
        gameSearch = $(this).val();
        page = 1; // Reset halaman ketika pencarian diubah
        hasMoreGames = true; // Set agar bisa memuat game lagi
        $('#gameContainer').html(''); // Hapus daftar game yang ada
        loadGames();
    });

    // Fungsi untuk menangani klik game
    function handleGameClick(gameId, gameStatus) {
        // Cek apakah pengguna sudah login
        fetch('/check-auth')
            .then(response => response.json())
            .then(data => {
                if (!data.isAuthenticated) {
                    // Jika tidak login, tampilkan alert
                    Swal.fire('You need to log in first!');
                } else if (gameStatus === 0) {
                    // Jika game_status == 0, tampilkan SweetAlert
                    Swal.fire({
                        title: 'Game is unavailable',
                        text: 'This game is currently unavailable.',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                } else {
                    // Arahkan ke halaman game jika game status bukan 0
                    window.location.href = `/game/${gameId}`;
                }
            });
    }

    // Muat data pertama kali
    loadProviders();
    loadGames();
</script>
