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
                @include('frontend.layouts.mobile.components.top_navbar')

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
