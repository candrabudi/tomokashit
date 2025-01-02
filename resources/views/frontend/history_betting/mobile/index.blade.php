@extends('frontend.layouts.app')
@section('mobile-style')
@endsection
@section('content_mobile')
<div id="app" class="scrollbar-hide" data-v-app="">
    <div>
        
        <div class="bet-slip h-dvh">
            <div class="var-app-bar var--box var-app-bar--safe-area-top var-app-bar--fixed nav-bar" style="background: var(--color-body); color: var(--color-text); z-index: 1000;">
                <div class="var-app-bar__toolbar">
                    <div class="var-app-bar__left">
                        <div class="h-50px max-w-260 flex items-center rd-25px bg-paper pl-4px pr-20px">
                            <img class="mr-12px h-42px w-42px flex-shrink-0" src="/assets/icon/avatar/avatar.png" alt="avatar">
                            <div class="flex-1 overflow-hidden">
                                <div class="var-avatar var--box var-avatar--normal font-semibold !h-50px !w-full !bg-transparent !color-text">
                                    <div class="var-avatar__text" style="transform: scale(1);">0.00</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="var-app-bar__title">
                        <div class="overflow-hidden text-ellipsis px-80">Slip taruhan</div>
                    </div>
                    <div class="var-app-bar__right">
                        
                        <button class="var-button var--box var-button--normal var--inline-flex var-button--default online-service" type="button">
                            
                            <div class="var-button__content">
                                <div class="h-50px w-50px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 50 50">
                                        <g id="sousuo_icon" transform="translate(423.407 -1495.378)">
                                            <g id="组_732" data-name="组 732" transform="translate(-416.09 1502.695)">
                                                <path id="路径_8630" data-name="路径 8630" d="M29.023,9.863a11.316,11.316,0,0,0-22.445,0A8.085,8.085,0,0,0,8.091,25.891a1.618,1.618,0,0,0,1.618-1.618V11.327a8.091,8.091,0,1,1,16.182,0V24.273A8.1,8.1,0,0,1,17.8,32.364a1.618,1.618,0,0,0,0,3.236,11.338,11.338,0,0,0,11.222-9.861,8.079,8.079,0,0,0,0-15.876M3.236,17.8a4.846,4.846,0,0,1,3.236-4.555v9.112A4.848,4.848,0,0,1,3.236,17.8m25.891,4.557V13.245a4.825,4.825,0,0,1,0,9.112" transform="translate(-0.317 -0.317)" fill="currentColor"></path>
                                                <path id="路径_8631" data-name="路径 8631" d="M17.084,14.081a1.578,1.578,0,0,1,1.068,2.75,7.92,7.92,0,0,1-5.115,1.7,7.932,7.932,0,0,1-4.843-1.578,1.588,1.588,0,0,1,.922-2.874H9.2a1.729,1.729,0,0,1,1.047.4,4.39,4.39,0,0,0,2.793.876,4.336,4.336,0,0,0,2.975-.95,1.461,1.461,0,0,1,.955-.323Z" transform="translate(4.446 8.299)" fill="currentColor"></path>
                                            </g>
                                            <g id="矩形_372" data-name="矩形 372" transform="translate(-423.407 1495.378)" fill="#fff" stroke="#707070" stroke-width="1" opacity="0">
                                                <rect width="50" height="50" stroke="none"></rect>
                                                <rect x="0.5" y="0.5" width="49" height="49" fill="none"></rect>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="var-hover-overlay"></div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="var-app-bar__placeholder" style="height: 46.7969px;"></div>
            <div class="h-[var(--bet-slip-menus-height)] flex overflow-x-auto pb-20px pr-20px scrollbar-hide">
                <button class="var-button var--box var-button--normal var--inline-flex var-button--default ml-20px h-60px min-w-164px flex-shrink-0 rd-30px px-40px text-28px font-bold bg-primary color-onPrimary" type="button">
                    
                    <div class="var-button__content">Olahraga</div>
                    <div class="var-hover-overlay"></div>
                </button>
                <button class="var-button var--box var-button--normal var--inline-flex var-button--default ml-20px h-60px min-w-164px flex-shrink-0 rd-30px px-40px text-28px bg-paper" type="button">
                    
                    <div class="var-button__content">SLOT</div>
                    <div class="var-hover-overlay"></div>
                </button>
                <button class="var-button var--box var-button--normal var--inline-flex var-button--default ml-20px h-60px min-w-164px flex-shrink-0 rd-30px px-40px text-28px bg-paper" type="button">
                    
                    <div class="var-button__content">Live Casino</div>
                    <div class="var-hover-overlay"></div>
                </button>
                <button class="var-button var--box var-button--normal var--inline-flex var-button--default ml-20px h-60px min-w-164px flex-shrink-0 rd-30px px-40px text-28px bg-paper" type="button">
                    
                    <div class="var-button__content">Tembak Ikan</div>
                    <div class="var-hover-overlay"></div>
                </button>
                <button class="var-button var--box var-button--normal var--inline-flex var-button--default ml-20px h-60px min-w-164px flex-shrink-0 rd-30px px-40px text-28px bg-paper" type="button">
                    
                    <div class="var-button__content">Permainan virtual</div>
                    <div class="var-hover-overlay"></div>
                </button>
                <button class="var-button var--box var-button--normal var--inline-flex var-button--default ml-20px h-60px min-w-164px flex-shrink-0 rd-30px px-40px text-28px bg-paper" type="button">
                    
                    <div class="var-button__content">Lotre</div>
                    <div class="var-hover-overlay"></div>
                </button>
                <button class="var-button var--box var-button--normal var--inline-flex var-button--default ml-20px h-60px min-w-164px flex-shrink-0 rd-30px px-40px text-28px bg-paper" type="button">
                    
                    <div class="var-button__content">E-Sport</div>
                    <div class="var-hover-overlay"></div>
                </button>
                <button class="var-button var--box var-button--normal var--inline-flex var-button--default ml-20px h-60px min-w-164px flex-shrink-0 rd-30px px-40px text-28px bg-paper" type="button">
                    
                    <div class="var-button__content">Lainnya</div>
                    <div class="var-hover-overlay"></div>
                </button>
            </div>
            <div class="bet-slip-page-sports">
                <div class="h-70px flex items-center whitespace-nowrap px-20px py-20px text-28px color-text-sub">
                    <div class="flex items-center overflow-x-auto scrollbar-hide">
                        <div class="px-28px text-34px color-text font-bold">Belum dihitung</div>
                        <div class="px-28px b-l-1px b-l-solid b-l-border">Telah dihitung</div>
                        <div class="px-28px b-l-1px b-l-solid b-l-border">Persiapan ditaruh</div>
                    </div>
                    
                </div>
                <div>
                    <div class="h-50px w-full flex items-center overflow-x-auto whitespace-nowrap px-40px text-20px color-text-sub scrollbar-hide">
                        <span class="mr-5">Total: </span><span class="mr-40px text-24px color-text">0</span><span class="mr-5">Jumlah taruhan: </span><span class="mr-40px text-24px color-text">0.00</span>
                    </div>
                    <div class="h-[var(--container-height)] overflow-y-auto scrollbar-hide">
                        <div>
                            <div class="relative overflow-hidden bg-body" style="height: 0px;">
                                <div class="absolute bottom-0 w-full">
                                    <div class="h-[230px] flex flex-col items-center justify-center">
                                        <img class="h-100 w-200" src="/assets/image/loading_pull.png" style="display: none;"><img class="h-100 w-200" src="/assets/image/loading_pull_before.png">
                                        <div class="text-24 color-text font-500 opacity-30">Tarik ke bawah untuk menyegarkan</div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-90px">
                                <div class="text-center">
                                    <div class="mb-[28px] ml-[50%] w-[fit-content] translate-x-[-50%]">
                                        <div class="var-image var--box h-120px w-120px" style="border-radius: 0px;">
                                            <img role="img" class="var-image__image" src="https://www.7spb1772.com/assets/icon/emoty_bet_slip.svg" style="object-fit: fill; object-position: 50% 50%;">
                                        </div>
                                    </div>
                                    <h3 class="my-10px text-30px color-text font-bold">Slip taruhan anda kosong</h3>
                                    <h5 class="mx-100 my-10px text-24px color-text-sub font-normal">Tambahkan pertandingan favorit yang anda minati ke dalam slip taruhan</h5>
                                </div>
                            </div>
                            <div class="h-[env(safe-area-inset-bottom)] w-full"></div>
                        </div>
                    </div>
                    <div></div>
                </div>
            </div>
            @include('frontend.layouts.mobile.components.menu_custom')
        </div>
        <div>
            <div class="multiple-bets-popup">
                
            </div>
            <div></div>
        </div>
        <div></div>
        <div></div>
    </div>
</div>
@endsection