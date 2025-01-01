@php
    $settings = \App\Models\GeneralSetting::first();
@endphp
<div class="fixed left-0 right-0 top-0 z-10 bg-[var(--top-bg-color)]">
    <div class="h-[var(--top-nav-height)] w-full flex items-center justify-between px-[20px]" style="padding: 10px;">
        <img src="{{ asset('storage/' . $settings->site_logo) }}" width="80" alt="Logo">

        @if (Auth::user())
            <button
                class="var-button var--box var-button--normal var--inline-flex var-button--default ml-20px h-60px min-w-180px rounded-30px bg-[var(--nav-block-color)] px-[10px] text-26px color-white transition-all ease-in-out duration-300">
                <div class="var-button__content">
                    {{ number_format(Auth::user()->member->balance / 1000, 2, '.', ',') }}<i
                        class="var-icon var-icon--set var-icon-refresh ml-[5px] align-middle"
                        style="transition-duration: 0ms; font-size: 16px;"></i>
                </div>
                <div class="var-hover-overlay"></div>
            </button>
        @else
            <button id="login-button"
                class="var-button var--box var-button--normal var--inline-flex var-button--default relative h-60px w-180px overflow-hidden rounded-30px bg-[var(--nav-block-color)] text-24px color-white transition-all ease-in-out duration-300">
                <div class="var-button__content"><i class="flash-across"></i>Masuk/Daftar</div>
                <div class="var-hover-overlay"></div>
            </button>
        @endif
    </div>

    <div class="notification h-[var(--top-notice-height)] flex items-center pb-20 pl-30px">
        <img class="mr-20px w-20px flex-shrink-0" src="https://m.7spb1772.com/assets/icon/tongzhi_icon.svg"
            alt="inform">
        <div class="relative flex-1 overflow-hidden whitespace-nowrap text-20px color-white">
            <div class="relative w-[fit-content] flex animate-name-[notificationMove2Left] animate-ease-linear animate-delay-5s animate-iteration-count-infinite"
                style="animation-duration: 44.5723s;">
                <div class="mr-60">Untuk memastikan keamanan dana akun, harap klik DEPOSIT sebelum setiap
                    setoran untuk mendapatkan nomor rekening penerima yang terbaru, dan lakukan setoran
                    sesuai dengan 『Jumlah Pembayaran』. Menggunakan nomor rekening yang sudah kedaluwarsa
                    atau mentransfer jumlah yang salah dapat menyebabkan kehilangan dana.</div>
                <div class="absolute left-full top-0 h-full flex">
                    <div class="mr-60">Untuk memastikan keamanan dana akun, harap klik DEPOSIT sebelum
                        setiap setoran untuk mendapatkan nomor rekening penerima yang terbaru, dan lakukan
                        setoran sesuai dengan 『Jumlah Pembayaran』. Menggunakan nomor rekening yang sudah
                        kedaluwarsa atau mentransfer jumlah yang salah dapat menyebabkan kehilangan dana.
                    </div>
                </div>
            </div>
            <div class="absolute right-0 top-0 h-full w-60px from-#1E273400 to-#1E2734 bg-gradient-to-r">
            </div>
        </div>
    </div>
</div>
