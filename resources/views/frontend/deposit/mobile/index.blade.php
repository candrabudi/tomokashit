@extends('frontend.layouts.app')
@section('mobile-style')
    <script>
        function showTab(contentId, tabId) {
            var tabs = document.getElementsByClassName("tab-content");
            var tabButtons = document.getElementsByClassName("tab-button");

            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.display = "none";
            }

            for (var i = 0; i < tabButtons.length; i++) {
                tabButtons[i].classList.remove("active");
            }

            document.getElementById(contentId).style.display = "block";
            document.getElementById(tabId).classList.add("active");
        }
    </script>

    <style>
        .tab-button {
            cursor: pointer;
        }

        .tab-button.active {
            background-color: #82D81F;
            color: white;
        }

        .tab-button.active svg {
            fill: white;
            /* Change icon color to white when active */
        }

        .tab-button svg {
            fill: #82D81F;
            /* Default icon color */
            transition: fill 0.3s ease;
            /* Smooth transition */
        }

        .tab-content {
            display: none;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .note {
            font-size: 14px;
            color: #999;
        }

        .deposit-button {
            background-color: #82D81F;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .deposit-button:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
@section('content_mobile')
    <div id="app" class="scrollbar-hide" data-v-app="" style="background: #232A34">
        <div>
            <div data-v-dbbceab6="" class="deposit-container">
                <div class="var-app-bar var--box var-app-bar--safe-area-top var-app-bar--fixed nav-bar"
                    style="background: var(--color-body); color: var(--color-text); z-index: 1000;" style="background: #191D26">
                    <div class="var-app-bar__toolbar" style="background: #191D26">
                        <div class="var-app-bar__left">
                            <span data-v-dbbceab6=""></span>
                        </div>
                        <div class="var-app-bar__title">
                            <div class="overflow-hidden text-ellipsis px-80" style="color: #FFFFFF;">Deposit</div>
                        </div>
                        <div class="var-app-bar__right">
                            <button data-v-dbbceab6=""
                                class="var-button var--box var-button--normal var--inline-flex var-button--default online-service"
                                type="button">
                                <div class="var-button__content">
                                    <div class="h-50px w-50px">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                            viewBox="0 0 50 50">
                                            <g id="sousuo_icon" transform="translate(423.407 -1495.378)">
                                                <g id="组_732" data-name="组 732" transform="translate(-416.09 1502.695)">
                                                    <path id="路径_8630" data-name="路径 8630"
                                                        d="M29.023,9.863a11.316,11.316,0,0,0-22.445,0A8.085,8.085,0,0,0,8.091,25.891a1.618,1.618,0,0,0,1.618-1.618V11.327a8.091,8.091,0,1,1,16.182,0V24.273A8.1,8.1,0,0,1,17.8,32.364a1.618,1.618,0,0,0,0,3.236,11.338,11.338,0,0,0,11.222-9.861,8.079,8.079,0,0,0,0-15.876M3.236,17.8a4.846,4.846,0,0,1,3.236-4.555v9.112A4.848,4.848,0,0,1,3.236,17.8m25.891,4.557V13.245a4.825,4.825,0,0,1,0,9.112"
                                                        transform="translate(-0.317 -0.317)" fill="currentColor"></path>
                                                    <path id="路径_8631" data-name="路径 8631"
                                                        d="M17.084,14.081a1.578,1.578,0,0,1,1.068,2.75,7.92,7.92,0,0,1-5.115,1.7,7.932,7.932,0,0,1-4.843-1.578,1.588,1.588,0,0,1,.922-2.874H9.2a1.729,1.729,0,0,1,1.047.4,4.39,4.39,0,0,0,2.793.876,4.336,4.336,0,0,0,2.975-.95,1.461,1.461,0,0,1,.955-.323Z"
                                                        transform="translate(4.446 8.299)" fill="currentColor"></path>
                                                </g>
                                                <g id="矩形_372" data-name="矩形 372"
                                                    transform="translate(-423.407 1495.378)" fill="#fff" stroke="#707070"
                                                    stroke-width="1" opacity="0">
                                                    <rect width="50" height="50" stroke="none"></rect>
                                                    <rect x="0.5" y="0.5" width="49" height="49" fill="none">
                                                    </rect>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="var-hover-overlay"></div>
                            </button>
                            <img data-v-dbbceab6="" class="mr-[20px] h-[50px] w-[50px]"
                                src="https://m.7spb1772.com/assets/icon/jilu_icon.svg">
                        </div>
                    </div>
                </div>
                <div class="var-app-bar__placeholder" style="height: 43.1875px;"></div>
                <div data-v-dbbceab6="" class="page-content ml-20px">
                    <div data-v-dbbceab6="" class="deposit py-[30px]">
                        <!-- Tab Navigation -->
                        <div class="flex flex-nowrap overflow-auto scrollbar-hide">
                            <!-- Tab for Bank -->
                            <button id="bank-tab"
                                class="tab-button var-button var--box var-button--normal var--inline-flex var-button--default relative mb-20px ml-10 h-[80px] min-w-[144px] rounded-[20px] text-[24px] bg-paper active"
                                type="button" onclick="showTab('bank-content', 'bank-tab')">
                                <div class="var-button__content">
                                    <div class="flex flex-col items-center justify-center">
                                        Bank
                                    </div>
                                </div>
                                <div class="var-hover-overlay"></div>
                            </button>

                            <!-- Tab for E-wallet -->
                            <button id="ewallet-tab"
                                class="tab-button var-button var--box var-button--normal var--inline-flex var-button--default relative mb-20px ml-10 h-[80px] min-w-[144px] rounded-[20px] text-[24px] bg-paper"
                                type="button" onclick="showTab('ewallet-content', 'ewallet-tab')">
                                <div class="var-button__content">
                                    <div class="flex flex-col items-center justify-center">
                                        E-wallet
                                    </div>
                                </div>
                                <div class="var-hover-overlay"></div>
                            </button>

                            <!-- Tab for QRIS -->
                            <button id="qris-tab"
                                class="tab-button var-button var--box var-button--normal var--inline-flex var-button--default relative mb-20px ml-10 h-[80px] min-w-[144px] rounded-[20px] text-[24px] bg-paper"
                                type="button" onclick="showTab('qris-content', 'qris-tab')">
                                <div class="var-button__content">
                                    <div class="flex flex-col items-center justify-center">
                                        QRIS
                                    </div>
                                </div>
                                <div class="var-hover-overlay"></div>
                            </button>
                        </div>

                        <div data-v-5cbf7a2e="" data-v-dbbceab6="" class="deposit-content mr-20">

                            <div id="bank-content" class="tab-content" style="display:block;">
                                @include('frontend.deposit.mobile.components.bank')
                            </div>
                            <div id="ewallet-content" class="tab-content" style="display:none;">
                                @include('frontend.deposit.mobile.components.ewallet')
                            </div>

                            <div id="qris-content" class="tab-content" style="display:none;">

                            </div>

                        </div>
                    </div>
                </div>
                @include('frontend.layouts.mobile.components.menu_custom')
            </div>
        </div>
    </div>
@endsection
