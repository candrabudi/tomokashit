<div class="sticky top-[calc(var(--top-nav-height)+var(--top-notice-height))] z-9">
    <div class="absolute h-30 w-full bg-[var(--top-bg-color)]"></div>
    <div class="relative z-1 rd-t-30 bg-paper" style="background: #191D26; padding: 5px;">
        <div class="flex items-center pb-20 pt-30">
            <div class="w-120 flex flex-shrink-0 justify-center">
                <button
                    class="var-button var--box var-button--normal var--inline-flex var-button--icon-container-default h-60 w-80 rd-33"
                    type="button">
                    <div class="var-button__content"><img class="h-26 w-26"
                        src="https://m.7spb1772.com/assets/icon/search3.svg"></div>
                    <div class="var-hover-overlay"></div>
                </button>
            </div>
            <div class="flex items-center flex-1 overflow-x-auto">
                <div class="flex items-center overflow-x-auto whitespace-nowrap scrollbar-hide">
                    <button
                        class="var-button var--box var-button--normal var--inline-flex var-button--primary game-category-tab-item mr-20 h-60 flex flex-shrink-0 items-center rounded-30px px-25 text-28 leading-60"
                        type="button" style="background: {{ Route::currentRouteName() == 'home' ? '#1D6D3D' : '#A9DF8D' }}; color: white;">
                        <div class="var-button__content">
                            <div class="flex items-center">
                                <img class="h-38 w-38"
                                    src="https://m.7spb1772.com/assets/icon/game_home_active.svg" alt="Lobby">
                                <div class="ml-10">Lobby</div>
                            </div>
                        </div>
                        <div class="var-hover-overlay"></div>
                    </button>
                    <a href="{{ route('casino.slots') }}"
                        class="var-button var--box var-button--normal var--inline-flex var-button--default game-category-tab-item mr-20 h-60 flex flex-shrink-0 items-center rounded-30px px-25 text-28 leading-60"
                        type="button" style="background: {{ Route::currentRouteName() == 'casino.slots' ? '#1D6D3D' : '#A9DF8D' }}; color: white; text-decoration: none;">
                        <div class="var-button__content">
                            <div class="flex items-center">
                                <img class="h-38 w-38"
                                    src="https://s.spotbets.cc/pub/game/zc5scx01h35d659vlm3svnfo699txh2w.png"
                                    alt="SLOT">
                                <div class="ml-10">Slots</div>
                            </div>
                        </div>
                        <div class="var-hover-overlay"></div>
                    </a>
                    <button
                        class="var-button var--box var-button--normal var--inline-flex var-button--default game-category-tab-item mr-20 h-60 flex flex-shrink-0 items-center rounded-30px px-25 text-28 leading-60"
                        type="button" style="background: {{ Route::currentRouteName() == 'casino.live-casino' ? '#1D6D3D' : '#A9DF8D' }}; color: white;">
                        <div class="var-button__content">
                            <div class="flex items-center">
                                <img class="h-38 w-38"
                                    src="https://s.spotbets.cc/pub/game/zc5scx01h35d659vgv1ft6fo28ztqvmb.png"
                                    alt="Live Casino">
                                <div class="ml-10">Live Casino</div>
                            </div>
                        </div>
                        <div class="var-hover-overlay"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
