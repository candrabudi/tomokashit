@php 
    $settings = \App\Models\GeneralSetting::first();
    $isAuthenticated = auth()->check(); // Check if the user is authenticated
@endphp

<div class="tabbar h-[var(--bottom-navigation-height)]">
    <div class="var-bottom-navigation var--box var-bottom-navigation--fixed var-bottom-navigation--safe-area"
        style="z-index: 1000; background: #191D26">
        <div class="ml-12px h-full flex flex-1 items-center justify-start">
            <img class="ml-16px h-108px w-114px" 
                src="{{ asset('storage/' . $settings->site_logo) }}" alt="home">
        </div>
        <a href="{{ route('user.my_account.deposit') }}" class="var-bottom-navigation-item var--box" id="deposit-btn">
            <div class="var-bottom-navigation-item__icon-container">
                <img class="h-44px w-44px"
                    src="{{ asset('frontend/mobile/icon/tabbar/depositb73c.png') }}?t=1" alt="deposit">
            </div>
            <span class="var-bottom-navigation-item__label">Deposit</span>
        </a>
        <a href="/" class="var-bottom-navigation-item var--box" id="taruhan-btn">
            <div class="var-bottom-navigation-item__icon-container">
                <img class="h-44px w-44px"
                    src="{{ asset('frontend/mobile/icon/tabbar/orderb73c.png') }}?t=1" alt="betSlip">
            </div>
            <span class="var-bottom-navigation-item__label">Taruhan</span>
        </a>
        <a class="var-bottom-navigation-item var--box">
            <div class="var-bottom-navigation-item__icon-container">
                <img class="h-44px w-44px"
                    src="{{ asset('frontend/mobile/icon/tabbar/serviceb73c.png') }}?t=1" alt="service">
            </div>
            <span class="var-bottom-navigation-item__label">CS</span>
        </a>
        <a href="{{ route('users.profile') }}" class="var-bottom-navigation-item var--box" id="profil-btn">
            <div class="var-bottom-navigation-item__icon-container">
                <img class="h-44px w-44px"
                    src="{{ asset('frontend/mobile/icon/tabbar/mineb73c.png') }}?t=1" alt="mine">
            </div>
            <span class="var-bottom-navigation-item__label">Profil</span>
        </a>
    </div>
</div>

@if(!$isAuthenticated)
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('deposit-btn').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Peringatan',
                text: 'Anda harus login terlebih dahulu!',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        });

        document.getElementById('taruhan-btn').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Peringatan',
                text: 'Anda harus login terlebih dahulu!',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        });

        document.getElementById('profil-btn').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Peringatan',
                text: 'Anda harus login terlebih dahulu!',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif

@if($settings->live_chat_link)
    <script>
        document.querySelector('.var-bottom-navigation-item span:contains("CS")').parentElement.addEventListener('click', function() {
            window.location.href = '{{ $settings->live_chat_link }}';
        });
    </script>
@endif
