@extends('frontend.layouts.app')
@section('mobile-style')
@endsection
@section('content_mobile')
    <div id="app" class="scrollbar-hide" data-v-app="">
        <div>
            <div data-v-2195eeef="" class="bg-paper container" style="background: #232A34">
                <div class="var-app-bar var--box var-app-bar--safe-area-top var-app-bar--fixed nav-bar"
                    style="background: #191D26; color: var(--color-text); z-index: 1000;">
                    <div class="var-app-bar__toolbar">
                        <div class="var-app-bar__left">
                            <button
                                class="var-button var--box var-button--normal var--inline-flex var-button--text var-button--text-default"
                                type="button" style="color: var(--color-text); background: transparent;">
                                <div class="var-button__content"><i class="var-icon var-icon--set var-icon-chevron-left"
                                        style="transition-duration: 0ms; font-size: 6vw;"></i></div>
                                <div class="var-hover-overlay"></div>
                            </button>
                        </div>
                        <div class="var-app-bar__title">
                            <div class="overflow-hidden text-ellipsis px-80" style="color: #FFFFFF;">Penarikan</div>
                        </div>
                        <div class="var-app-bar__right">
                            <button data-v-722b6552=""
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
                            <img data-v-722b6552="" class="mr-[20px] h-[50px] w-[50px]" src="/assets/icon/jilu_icon.svg">
                        </div>
                    </div>
                </div>
                <div class="var-app-bar__placeholder" style="height: 46.7969px;"></div>
                <div data-v-722b6552="" class="page-content ml-20px">
                    <div data-v-722b6552="" class="deposit py-[30px]">
                        <div data-v-d1b2a473="" data-v-722b6552="" class="withdraw mr-20">
                            <form data-v-d1b2a473="" class="var-form" action="{{ route('user.my_account.withdraw.store') }}"
                                method="POST">
                                @csrf
                                <div data-v-d1b2a473="" class="var-space var--box pb-[240px]"
                                    style="flex-flow: column wrap; justify-content: flex-start;">


                                    @if (Auth::user()->memberPaymentAccount)
                                        <div class="var-space--auto" style="margin: 0px 0px 10px;">
                                            <div data-v-2195eeef="" class="ver-input">
                                                <div class="h-[48px] flex items-center justify-between font-size-[22px]">
                                                    <span class="color-text" style="color: #FFFFFF"><span
                                                            class="color-[#FF0000]">*</span>Nama
                                                        Rekening</span><span
                                                        class="mr-[var(--form-details-message-margin-right)] color-text-sub"></span>
                                                </div>
                                                <div class="var-input var--box bg_body">
                                                    <div class="var-field-decorator var--box var-field-decorator--outlined">
                                                        <div class="var-field-decorator__controller"
                                                            style="cursor: text; overflow: hidden; --field-decorator-middle-offset-left: 17px; --field-decorator-middle-offset-width: 315px; --field-decorator-middle-offset-height: 26px;">
                                                            <div
                                                                class="var-field-decorator__icon var-field-decorator--icon-non-hint">
                                                            </div>
                                                            <div
                                                                class="var-field-decorator__middle var-field-decorator--middle-non-hint">
                                                                <input class="var-input__input" autocomplete="new-password"
                                                                    type="text" placeholder="Nama Sesuai Rekening"
                                                                    value="{{ Auth::user()->memberPaymentAccount->account_name }}"
                                                                    id="var-input-694" name="account_name"
                                                                    style="--input-placeholder-color: var(--field-decorator-placeholder-color, var(--field-decorator-blur-color));"
                                                                    readonly>
                                                            </div>

                                                            <div
                                                                class="var-field-decorator__icon var-field-decorator--icon-non-hint">

                                                            </div>
                                                        </div>
                                                        <fieldset class="var-field-decorator__line">
                                                            <legend class="var-field-decorator__line-legend">

                                                            </legend>
                                                        </fieldset>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="var-space--auto" style="margin: 0px 0px 10px;">
                                            <div data-v-2195eeef="" class="ver-input">
                                                <div class="h-[48px] flex items-center justify-between font-size-[22px]">
                                                    <span class="color-text" style="color: #FFFFFF"><span
                                                            class="color-[#FF0000]">*</span>Nomor
                                                        Rekening</span><span
                                                        class="mr-[var(--form-details-message-margin-right)] color-text-sub"></span>
                                                </div>
                                                <div class="var-input var--box bg_body">
                                                    <div
                                                        class="var-field-decorator var--box var-field-decorator--outlined">
                                                        <div class="var-field-decorator__controller"
                                                            style="cursor: text; overflow: hidden; --field-decorator-middle-offset-left: 17px; --field-decorator-middle-offset-width: 315px; --field-decorator-middle-offset-height: 26px;">
                                                            <div
                                                                class="var-field-decorator__icon var-field-decorator--icon-non-hint">
                                                            </div>
                                                            <div
                                                                class="var-field-decorator__middle var-field-decorator--middle-non-hint">
                                                                <input class="var-input__input"
                                                                    autocomplete="new-password" type="text"
                                                                    placeholder="Nama Sesuai Rekening"
                                                                    value="{{ Auth::user()->memberPaymentAccount->account_number }}"
                                                                    id="var-input-694" name="account_name"
                                                                    style="--input-placeholder-color: var(--field-decorator-placeholder-color, var(--field-decorator-blur-color));"
                                                                    readonly>
                                                            </div>

                                                            <div
                                                                class="var-field-decorator__icon var-field-decorator--icon-non-hint">

                                                            </div>
                                                        </div>
                                                        <fieldset class="var-field-decorator__line">
                                                            <legend class="var-field-decorator__line-legend">

                                                            </legend>
                                                        </fieldset>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="var-space--auto" style="margin: 0px 0px 10px;">
                                            <div data-v-d1b2a473="" class="no-bank">
                                                <div data-v-d1b2a473=""
                                                    class="h-[48px] flex items-center justify-between font-size-[24px]">
                                                    <span data-v-d1b2a473=""
                                                        class="ml-[var(--form-details-message-margin-right)] color-text"><span
                                                            data-v-d1b2a473="" class="color-[#FF0000]">*</span>Rekening
                                                        Deposit</span>
                                                </div>
                                                <a href="{{ route('user.my_account.payment_account') }}"
                                                    data-v-d1b2a473=""
                                                    class="var-button var--box var-button--normal var--inline-flex var-button--default h-[90px] w-full rounded-[10px] bg-paper text-[28px]"
                                                    type="button">
                                                    <div class="var-button__content"><i data-v-d1b2a473=""
                                                            class="var-icon var-icon--set var-icon-plus mr-[10px]"
                                                            style="transition-duration: 0ms;"></i><span data-v-d1b2a473=""
                                                            class="leading-[1]">Tambah rekening</span></div>
                                                    <div class="var-hover-overlay"></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="var-space--auto" style="margin: 0px 0px 10px;">
                                        <div data-v-d1b2a473="" class="ver-input-box">
                                            <div
                                                class="absolute left-20px top-22px z-10 h-[48px] flex items-center justify-between font-size-[22px]">
                                                <span
                                                    class="ml-[var(--form-details-message-margin-right)] color-text"><span
                                                        class="color-[#FF0000]">*</span>Nominal penarikan</span>
                                            </div>
                                            <div class="var-input var--box placeholder:font-normal bg_paper">
                                                <div class="var-field-decorator var--box var-field-decorator--outlined">
                                                    <div class="var-field-decorator__controller"
                                                        style="cursor: text; overflow: hidden; --field-decorator-middle-offset-left: 17px; --field-decorator-middle-offset-width: 336px; --field-decorator-middle-offset-height: 98px;">
                                                        <div
                                                            class="var-field-decorator__icon var-field-decorator--icon-non-hint">
                                                        </div>
                                                        <div
                                                            class="var-field-decorator__middle var-field-decorator--middle-non-hint">
                                                            <input class="var-input__input" autocomplete="new-password"
                                                                type="text"
                                                                placeholder="Silahkan masukin nominal yang ditarik"
                                                                inputmode="numeric" value="" id="var-input-641"
                                                                style="--input-placeholder-color: var(--field-decorator-placeholder-color, var(--field-decorator-blur-color));"
                                                                name="nominal">
                                                        </div>
                                                        <div
                                                            class="var-field-decorator__icon var-field-decorator--icon-non-hint">
                                                        </div>
                                                    </div>
                                                    <fieldset class="var-field-decorator__line">
                                                        <legend class="var-field-decorator__line-legend">
                                                        </legend>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="absolute bottom-20px left-30px w-[calc(100%-60px)]">
                                                <div class="var-divider var--box" role="separator"></div>
                                                <div
                                                    class="overflow-hidden text-ellipsis whitespace-nowrap text-26px color-text font-medium">
                                                    <div data-v-d1b2a473=""
                                                        class="overflow-hidden text-ellipsis whitespace-nowrap">Jumlah
                                                        penarikan minimum: <span data-v-d1b2a473=""
                                                            class="text-[#FF0000]">IDR 10,000</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="var-space--auto" style="margin: 0px;" style="color: #FFFFFF">
                                        <div data-v-d1b2a473="" class="mx-[20px] text-24px color-text leading-[1.8]">
                                            <div data-v-d1b2a473="" class="" style="color: #FFFFFF"> 1.Sisa
                                                frekuensi penarikan
                                                perhari：<span data-v-d1b2a473="" class="text-[#FF0000]">49</span>
                                            </div>
                                            <div data-v-d1b2a473="" class="" style="color: #FFFFFF"> 2.Bila tidak
                                                dapat transfer pada waktu
                                                tertentu , silahkan menghubungi livechat；
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-v-d1b2a473=""
                                    class="fixed bottom-30px left-20px z-100 w-[calc(100%-40px)] pt-10px">
                                    <button data-v-d1b2a473=""
                                        class="var-button var--box var-button--normal var--inline-flex var-button--primary var-button--disabled mt-[0px] h-[90px] w-full rounded-[10px] text-[28px]"
                                        type="submit">
                                        <div class="var-button__content">Penarikan</div>
                                        <div class="var-hover-overlay"></div>
                                    </button>
                                    <a href="{{ route('users.profile') }}" data-v-d1b2a473=""
                                        class="var-button var--box var-button--normal var--inline-flex var-button--default mt-[20px] h-[90px] w-full rounded-[10px] bg-paper text-[28px]"
                                        type="button" style="text-decoration: none">
                                        <div class="var-button__content">Menuju Profil Akun</div>
                                        <div class="var-hover-overlay"></div>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
