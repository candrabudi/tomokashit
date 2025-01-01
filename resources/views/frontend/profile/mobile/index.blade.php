@extends('frontend.layouts.app')
@section('mobile-style')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'DIN2014', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
@endsection
@section('content_mobile')
    <div id="app" class="scrollbar-hide" data-v-app="" style="background: #232A34">
        <div>
            <div class="mine relative overflow-y-auto bg-[var(--paper-background)] px-[20px] h-dvh mine-vip0"
                style="background: #232A34">
                <div class="absolute left-0 top-0 h-470 w-100% bg-cover bg-center bg-no-repeat"
                    style="background-image: url(&quot;https://s.spotbets.cc/pub/vip/top_v0.png&quot;);"></div>

                <div class="mine-content relative pt-[40px]">
                    <div class="mb-[30px] flex justify-end pr-[20px]">
                        <div class="h-[50px] w-[50px]">
                            <div class="var-badge var--box relative">
                                <img src="https://m.7spb1772.com/assets/icon/mine/notice.svg" class="h-[50px] w-[50px]">
                                <span
                                    class="var-badge__content var-badge--danger absolute top-0 right-0 text-white bg-red-600 rounded-full h-[20px] w-[20px] text-center">
                                    <span>3</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex items-center" style="color: var(--color-text);">
                        <div class="relative mx-[20px]">
                            <div class="var-image var--box h-[150px] w-[150px] rounded-full overflow-hidden bg-gray-800">
                                <img role="img" class="var-image__image"
                                    src="https://m.7spb1772.com/assets/icon/avatar/avatar.png" style="object-fit: cover;">
                            </div>
                            <span><img class="var-icon var-icon--set var-icon__image absolute bottom-0 right-0"
                                    src="https://m.7spb1772.com/assets/icon/edit_pen.svg"
                                    style="width: 18px; height: 18px;"></span>
                        </div>
                        <div class="mx-4 text-white">
                            <div class="text-2xl font-bold leading-tight">shenneal</div>
                            <div class="mt-2 text-lg opacity-70">ID 136535</div>
                        </div>
                    </div>
                    <div style="color: var(--color-text);" style="margin-bottom: 20px;">
                        <div class="mine-balance ml-[20px] mr-[40px] mt-[48px] text-white">
                            <div class="mb-2 flex items-center">
                                <span class="text-lg font-semibold">Dompet saya</span>
                                <i class="var-icon var-icon--set var-icon-refresh ml-[7px] text-gray-400"></i>
                            </div>
                            <div class="h-60 flex justify-between items-center">
                                <div class="text-4xl font-semibold">0.00</div>
                                <div class="flex space-x-4">
                                    <a href="{{ route('user.my_account.withdraw') }}"
                                        class="var-button var--box var-button--normal var--inline-flex bg-gray-700 hover:bg-gray-600 text-white px-6 py-3 rounded-full text-base font-semibold"
                                        type="button" style="background: #2980b9; text-decoration: none;">
                                        Penarikan
                                    </a>
                                    <a href="{{ route('user.my_account.deposit') }}"
                                        class="var-button var--box var-button--normal var--inline-flex bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-full text-base font-semibold"
                                        type="button"
                                        style="margin-left: 10px; background: #27ae60; text-decoration: none;">
                                        Deposit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between mt-[20px]" style="margin-top: 25px;">
                        <div class="mine-share relative h-[140px] w-[344px] rounded-30px text-0 px-[30px] py-[22px]">
                            <div class="text-[28px] color-[#2278BC] fw-bold leading-[42px] font-[font-title]">Undang Teman
                            </div>
                            <div class="color-text-sub text-[18px] w-[72%] mt-3px">Undang teman untuk menerima hadiah</div>
                            <img src="https://m.7spb1772.com/assets/icon/mine/share.png"
                                class="absolute bottom-0 right-0 h-[140px] w-[344px]">
                        </div>
                        <div class="mine-gift relative h-[140px] w-[344px] rounded-30px text-0 px-[30px] py-[22px]">
                            <div class="text-[28px] color-[#B42727] fw-bold leading-[42px] font-[font-title]">Promosi</div>
                            <div class="color-text-sub text-[18px] w-[72%] mt-3px">Selesaikan tugas terima hadiah</div>
                            <img src="https://m.7spb1772.com/assets/icon/mine/gift.png"
                                class="absolute bottom-0 right-0 h-[140px] w-[344px]">
                        </div>
                    </div>
                    <div class="mx-20px mb-40px mt-50" style="margin-bottom: 128px">
                        <div class="h-[40px] text-[28px] color-text fw-500 leading-[40px] font-[font-title]"
                            style="color: #FFFFFF;">Layanan
                            tambahan
                        </div>
                        <div class="mt-[30px] flex flex-wrap justify-between">
                            <div class="var-row var--box"
                                style="justify-content: flex-start; align-items: flex-start; margin: 0px;">
                                <div class="var-col var--box var-col--span-6"
                                    style="flex-direction: row; justify-content: center; padding: 0px;width: 120px; height: 100px;">
                                    <div
                                        class="var-paper var--box var-paper--cursor relative mb-[20px] w-[140px] items-center px-5px py-20px text-center">
                                        <img src="https://m.7spb1772.com/assets/icon/mine/mingxi_icon.svg?t=2"
                                            class="mx-auto mb-[15px] block h-[50px] w-[50px]">
                                        <div class="min-h-[34px] flex items-center justify-center leading-[34px] text-20px">
                                            Riwayat Saldo
                                        </div>

                                    </div>
                                </div>
                                <div class="var-col var--box var-col--span-6"
                                    style="flex-direction: row; justify-content: center; padding: 0px;width: 120px; height: 100px;">
                                    <div
                                        class="var-paper var--box var-paper--cursor relative mb-[20px] w-[140px] items-center px-5px py-20px text-center">
                                        <img src="https://m.7spb1772.com/assets/icon/mine/jilu_icon.svg?t=2"
                                            class="mx-auto mb-[15px] block h-[50px] w-[50px]">
                                        <div class="min-h-[34px] flex items-center justify-center leading-[34px] text-20px">
                                            Catatan Taruhan
                                        </div>

                                    </div>
                                </div>
                                <div class="var-col var--box var-col--span-6"
                                    style="flex-direction: row; justify-content: center; padding: 0px;width: 120px; height: 100px;">
                                    <div
                                        class="var-paper var--box var-paper--cursor relative mb-[20px] w-[140px] items-center px-5px py-20px text-center">
                                        <img src="https://m.7spb1772.com/assets/icon/mine/VIP_icon.svg?t=2"
                                            class="mx-auto mb-[15px] block h-[50px] w-[50px]">
                                        <div class="min-h-[34px] flex items-center justify-center leading-[34px] text-20px">
                                            VIP
                                        </div>

                                    </div>
                                </div>
                                <div class="var-col var--box var-col--span-6"
                                    style="flex-direction: row; justify-content: center; padding: 0px;width: 120px; height: 100px;">
                                    <div
                                        class="var-paper var--box var-paper--cursor relative mb-[20px] w-[140px] items-center px-5px py-20px text-center">
                                        <img src="https://m.7spb1772.com/assets/icon/mine/fuli_icon.svg?t=2"
                                            class="mx-auto mb-[15px] block h-[50px] w-[50px]">
                                        <div class="min-h-[34px] flex items-center justify-center leading-[34px] text-20px">
                                            Kupon
                                        </div>

                                    </div>
                                </div>

                                <div class="var-col var--box var-col--span-6"
                                    style="flex-direction: row; justify-content: center; padding: 0px;width: 120px; height: 100px;">
                                    <div
                                        class="var-paper var--box var-paper--cursor relative mb-[20px] w-[140px] items-center px-5px py-20px text-center">
                                        <img src="https://m.7spb1772.com/assets/icon/mine/anquan_icon.svg?t=2"
                                            class="mx-auto mb-[15px] block h-[50px] w-[50px]">
                                        <div class="min-h-[34px] flex items-center justify-center leading-[34px] text-20px">
                                            Keamanan
                                        </div>

                                    </div>
                                </div>

                                <div class="var-col var--box var-col--span-6"
                                    style="flex-direction: row; justify-content: center; padding: 0px;width: 120px; height: 100px;">
                                    <div
                                        class="var-paper var--box var-paper--cursor relative mb-[20px] w-[140px] items-center px-5px py-20px text-center">
                                        <img src="https://m.7spb1772.com/assets/icon/mine/yijian_icon.svg?t=2"
                                            class="mx-auto mb-[15px] block h-[50px] w-[50px]">
                                        <div
                                            class="min-h-[34px] flex items-center justify-center leading-[34px] text-20px">
                                            Saran
                                        </div>

                                    </div>
                                </div>
                                <div class="var-col var--box var-col--span-6"
                                    style="flex-direction: row; justify-content: center; padding: 0px;width: 120px; height: 100px;">
                                    <div
                                        class="var-paper var--box var-paper--cursor relative mb-[20px] w-[140px] items-center px-5px py-20px text-center">
                                        <img src="https://m.7spb1772.com/assets/icon/mine/saiguo_icon.svg?t=2"
                                            class="mx-auto mb-[15px] block h-[50px] w-[50px]">
                                        <div
                                            class="min-h-[34px] flex items-center justify-center leading-[34px] text-20px">
                                            Hasil pertandingan
                                        </div>

                                    </div>
                                </div>

                                <div class="var-col var--box var-col--span-6"
                                    style="flex-direction: row; justify-content: center; padding: 0px;width: 120px; height: 100px;">
                                    <div
                                        class="var-paper var--box var-paper--cursor relative mb-[20px] w-[140px] items-center px-5px py-20px text-center">
                                        <img src="https://m.7spb1772.com/assets/icon/mine/bangzhu_icon.svg?t=2"
                                            class="mx-auto mb-[15px] block h-[50px] w-[50px]">
                                        <div
                                            class="min-h-[34px] flex items-center justify-center leading-[34px] text-20px">
                                            Bantuan
                                        </div>

                                    </div>
                                </div>
                                <div class="var-col var--box var-col--span-6"
                                    style="flex-direction: row; justify-content: center; padding: 0px;width: 120px; height: 100px;">
                                    <div
                                        class="var-paper var--box var-paper--cursor relative mb-[20px] w-[140px] items-center px-5px py-20px text-center">
                                        <img src="https://m.7spb1772.com/assets/icon/mine/jiaocheng_icon.svg?t=2"
                                            class="mx-auto mb-[15px] block h-[50px] w-[50px]">
                                        <div
                                            class="min-h-[34px] flex items-center justify-center leading-[34px] text-20px">
                                            Panduan bermain
                                        </div>

                                    </div>
                                </div>
                                <div class="var-col var--box var-col--span-6"
                                    style="flex-direction: row; justify-content: center; padding: 0px;width: 120px; height: 100px;">
                                    <div
                                        class="var-paper var--box var-paper--cursor relative mb-[20px] w-[140px] items-center px-5px py-20px text-center">
                                        <img src="https://m.7spb1772.com/assets/icon/mine/guanyu_icon.svg?t=2"
                                            class="mx-auto mb-[15px] block h-[50px] w-[50px]">
                                        <div
                                            class="min-h-[34px] flex items-center justify-center leading-[34px] text-20px">
                                            Informasi
                                        </div>

                                    </div>
                                </div>
                                <div class="var-col var--box var-col--span-6"
                                    style="flex-direction: row; justify-content: center; padding: 0px;width: 120px; height: 100px;">
                                    <div
                                        class="var-paper var--box var-paper--cursor relative mb-[20px] w-[140px] items-center px-5px py-20px text-center">
                                        <img src="https://m.7spb1772.com/assets/icon/mine/v_icon.svg?t=2"
                                            class="mx-auto mb-[15px] block h-[50px] w-[50px]">
                                        <div
                                            class="min-h-[34px] flex items-center justify-center leading-[34px] text-20px">
                                            V1.2.125
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @include('frontend.layouts.mobile.components.menu_custom')
            </div>
        </div>
    </div>
@endsection
