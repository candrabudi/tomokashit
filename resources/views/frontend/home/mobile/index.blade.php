@extends('frontend.layouts.app')
@section('mobile-style')
@endsection
@section('mobile_banner')
    <div id="home-banner" class="mt-[calc(var(--top-nav-height)+var(--top-notice-height))] h-260px bg-[var(--top-bg-color)]"
        style="height: 140px;">
        <div class="var-swipe pb-20px">
            <!-- Swipe Track -->
            <div class="var-swipe__track"
                style="width: {{ count($images) * 360 }}px; transform: translateX(0px); transition-duration: 300ms;">
                @foreach ($images as $image)
                    <div class="var-swipe-item" tabindex="-1" aria-hidden="{{ $loop->first ? 'false' : 'true' }}"
                        style="width: 360px; transform: translateX(0px);">
                        <div class="px-20px">
                            <img class="block h-220px w-full" src="{{ $image }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('content_mobile')
    <div id="app" class="scrollbar-hide" data-v-app="">
        <div>

            <div id="HomePage" class="home relative overflow-y-auto bg-paper scrollbar-hide h-dvh">
                <div class="fixed left-0 right-0 top-0 z-10 bg-[var(--top-bg-color)]">
                    <div class="h-[var(--top-nav-height)] w-full flex items-center justify-between px-[20px]">
                        <img src="https://playdash8.com/content/uploads/icons/IGSGP/Vector.svg" width="120"
                            alt="Logo">

                        @if (Auth::user())
                            <button
                                class="var-button var--box var-button--normal var--inline-flex var-button--default ml-20px h-60px min-w-180px rounded-30px bg-[var(--nav-block-color)] px-[10px] text-26px color-white"
                                type="button" style="overflow: hidden; z-index: 1;">
                                <div class="var-button__content">
                                    {{ number_format(Auth::user()->member->balance / 1000, 2, '.', ',') }}<i
                                        class="var-icon var-icon--set var-icon-refresh ml-[5px] align-middle"
                                        style="transition-duration: 0ms; font-size: 16px;"></i></div>
                                <div class="var-hover-overlay"></div>
                            </button>
                        @else
                            <button id="login-button"
                                class="var-button var--box var-button--normal var--inline-flex var-button--default relative h-60px w-180px overflow-hidden rounded-30px bg-[var(--nav-block-color)] text-24px color-white"
                                type="button" style="overflow: hidden; z-index: 1;">
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
                                <div class="mr-60">Untuk memastikan keamanan dana akun, harap klik DEPOSIT sebelum
                                    setiap setoran untuk mendapatkan nomor rekening penerima yang terbaru, dan lakukan
                                    setoran sesuai dengan 『Jumlah Pembayaran』. Menggunakan nomor rekening yang sudah
                                    kedaluwarsa atau mentransfer jumlah yang salah dapat menyebabkan kehilangan dana.
                                </div>
                                <div class="absolute left-full top-0 h-full flex">
                                    <div class="mr-60">Untuk memastikan keamanan dana akun, harap klik DEPOSIT sebelum
                                        setiap setoran untuk mendapatkan nomor rekening penerima yang terbaru, dan
                                        lakukan setoran sesuai dengan 『Jumlah Pembayaran』. Menggunakan nomor rekening
                                        yang sudah kedaluwarsa atau mentransfer jumlah yang salah dapat menyebabkan
                                        kehilangan dana.</div>
                                </div>
                            </div>
                            <div class="absolute right-0 top-0 h-full w-60px from-#1E273400 to-#1E2734 bg-gradient-to-r">
                            </div>
                        </div>
                    </div>
                </div>

                @yield('mobile_banner')

                <div class="h-110 flex items-center justify-between px-20 bg-[var(--top-bg-color)] pt-5">
                    <div class="relative">
                        <img class="absolute bottom-35 left-1/2 ml--35 h-70 w-70"
                            src="{{ asset('frontend/mobile/icon/game_invite.png') }}" alt="Bagikan">
                        <div
                            class="h-63 w-100 rd-28 from-#687C9880 to-#272E3780 bg-gradient-to-b pt-30 text-center text-16 color-white">
                            Bagikan
                        </div>
                    </div>
                    <div class="relative">
                        <img class="absolute bottom-35 left-1/2 ml--35 h-70 w-70"
                            src="{{ asset('frontend/mobile/icon/game_activity.png') }}" alt="Promosi">
                        <div
                            class="h-63 w-100 rd-28 from-#687C9880 to-#272E3780 bg-gradient-to-b pt-30 text-center text-16 color-white">
                            Promosi
                        </div>
                    </div>
                    <div class="relative">
                        <img class="absolute bottom-35 left-1/2 ml--35 h-70 w-70"
                            src="{{ asset('frontend/mobile/icon/game_record.png') }}" alt="Turnover">
                        <div
                            class="h-63 w-100 rd-28 from-#687C9880 to-#272E3780 bg-gradient-to-b pt-30 text-center text-16 color-white">
                            Turnover
                        </div>
                    </div>
                    <div class="relative">
                        <img class="absolute bottom-35 left-1/2 ml--35 h-70 w-70"
                            src="{{ asset('frontend/mobile/icon/game_vip.png') }}" alt="VIP">
                        <div
                            class="h-63 w-100 rd-28 from-#687C9880 to-#272E3780 bg-gradient-to-b pt-30 text-center text-16 color-white">
                            VIP
                        </div>
                    </div>
                    <div class="relative">
                        <img class="absolute bottom-35 left-1/2 ml--35 h-70 w-70"
                            src="{{ asset('frontend/mobile/icon/game_checkin.png') }}" alt="Masuk">
                        <div
                            class="h-63 w-100 rd-28 from-#687C9880 to-#272E3780 bg-gradient-to-b pt-30 text-center text-16 color-white">
                            Masuk
                        </div>
                    </div>
                    <div class="relative">
                        <img class="absolute bottom-35 left-1/2 ml--35 h-70 w-70"
                            src="{{ asset('frontend/mobile/icon/game_mywalfare.png') }}" alt="Kupon">
                        <div
                            class="h-63 w-100 rd-28 from-#687C9880 to-#272E3780 bg-gradient-to-b pt-30 text-center text-16 color-white">
                            Kupon
                        </div>
                    </div>
                </div>
                <div
                    class="sticky top-[calc(var(--top-nav-height)+var(--top-notice-height))] z-20 overflow-hidden bg-[var(--top-bg-color)]">
                    <div class="overflow-hidden rounded-t-30px bg-paper">

                    </div>
                </div>
                <div>
                    <div class="home-game-container" style="background: #232A34">
                        <div>
                            @include('frontend.layouts.mobile.components.menu')
                            @include('frontend.home.mobile.components.content')

                        </div>
                    </div>
                </div>

                @include('frontend.layouts.mobile.components.menu_footer')
            </div>
        </div>
    </div>
@endsection
