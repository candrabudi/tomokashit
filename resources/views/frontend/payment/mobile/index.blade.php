@extends('frontend.layouts.app')
@section('mobile-style')
    <style>
        /* Initial state for the popup, positioned below the screen */
        .var-popup_bank {
            position: fixed;
            bottom: -100%;
            /* Initially hidden off-screen */
            left: 0;
            width: 100%;
            transition: bottom 0.5s ease-in-out;
            z-index: 2011;
        }

        /* State for showing the popup */
        .var-popup_bank.show {
            bottom: 0;
            /* Popup slides up to the visible area */
        }

        /* Optional: Popup content styling */
        .var-popup_bank__content {
            overflow: hidden;
        }
    </style>
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
                            <div class="overflow-hidden text-ellipsis px-80" style="color: #FFFFFF">Tambah rekening</div>
                        </div>
                        <div class="var-app-bar__right">

                            <button data-v-2195eeef=""
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
                        </div>
                    </div>
                </div>
                <div class="var-app-bar__placeholder" style="height: 46.7969px;"></div>
                <div data-v-2195eeef="" class="min-h-[90px] flex items-center justify-start bg-[#F7F3E4] pl-10 pr-20">
                    <img data-v-2195eeef="" src="/assets/icon/warning_icon.svg" class="mt-12 h-[40px] w-[40px]"
                        style="align-self: self-start;">
                    <div data-v-2195eeef="" class="py-12 text-22 color-[#ACA381] leading-36">Masukkan nama lengkap Anda,nama
                        harus sesuai dengan Yang tartera di kartu debit,kartu kredit,atau rekening bank Anda.Nama Anda akan
                        digunakan nutuk venifikasi identitas saat penarikan
                    </div>
                </div>
                <div data-v-2195eeef="" class="page-content mx-40px mt-[20px]">
                    <form data-v-2195eeef="" class="var-form" method="POST" action="{{ route('user.my_account.payment_account.store') }}">
                        @csrf
                        <div data-v-2195eeef="" class="var-space var--box"
                            style="flex-flow: column wrap; justify-content: flex-start;">
                            <div class="var-space--auto" style="margin: 0px 0px 10px;">
                                <div data-v-2195eeef="" class="ver-input">
                                    <div class="h-[48px] flex items-center justify-between font-size-[22px]"><span
                                            class="color-text" style="color: #FFFFFF"><span class="color-[#FF0000]">*</span>Nama
                                            Rekening</span><span
                                            class="mr-[var(--form-details-message-margin-right)] color-text-sub"></span>
                                    </div>
                                    <div class="var-input var--box bg_body">
                                        <div class="var-field-decorator var--box var-field-decorator--outlined">
                                            <div class="var-field-decorator__controller"
                                                style="cursor: text; overflow: hidden; --field-decorator-middle-offset-left: 17px; --field-decorator-middle-offset-width: 315px; --field-decorator-middle-offset-height: 26px;">
                                                <div class="var-field-decorator__icon var-field-decorator--icon-non-hint">
                                                </div>
                                                <div
                                                    class="var-field-decorator__middle var-field-decorator--middle-non-hint">
                                                    <input class="var-input__input" autocomplete="new-password"
                                                        type="text" placeholder="Nama Sesuai Rekening" value=""
                                                        id="var-input-694"
                                                        name="account_name"
                                                        style="--input-placeholder-color: var(--field-decorator-placeholder-color, var(--field-decorator-blur-color));">
                                                </div>

                                                <div class="var-field-decorator__icon var-field-decorator--icon-non-hint">

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
                                <div data-v-2195eeef="" class="ver-select">
                                    <div class="h-[48px] flex items-center justify-between font-size-[22px]"><span
                                            class="ml-[var(--form-details-message-margin-right)] color-text"><span
                                                class="color-[#FF0000]">*</span>Bank</span><span
                                            class="mr-[var(--form-details-message-margin-right)] color-text-sub"></span>
                                    </div>
                                    <div class="var-input var--box bg_body">
                                        <div class="var-field-decorator var--box var-field-decorator--outlined">
                                            <div class="var-field-decorator__controller"
                                                style="overflow: hidden; --field-decorator-middle-offset-left: 17px; --field-decorator-middle-offset-width: 300px; --field-decorator-middle-offset-height: 26px;">
                                                <div class="var-field-decorator__icon var-field-decorator--icon-non-hint">
                                                </div>
                                                <div
                                                    class="var-field-decorator__middle var-field-decorator--middle-non-hint">
                                                    <input class="var-input__input" autocomplete="new-password"
                                                        readonly="" type="text" placeholder="Pilih Bank"
                                                        value="" id="var-input-700"
                                                        style="--input-placeholder-color: var(--field-decorator-placeholder-color, var(--field-decorator-blur-color));">

                                                    <input type="hidden" id="paymentMethodID" name="payment_method_id">
                                                </div>

                                                <div class="var-field-decorator__icon var-field-decorator--icon-non-hint">
                                                    <i class="var-icon var-icon--set var-icon-menu-down mr-[-10px] h-[40px] w-[40px] color-text opacity-80"
                                                        style="transition-duration: 0ms;"></i>
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
                            <div class="var-space--auto" style="margin: 0px;">
                                <div data-v-2195eeef="" class="ver-input">
                                    <div class="h-[48px] flex items-center justify-between font-size-[22px]"><span
                                            class="color-text" style="color: #FFFFFF"><span class="color-[#FF0000]">*</span>Nomor
                                            Rekening</span><span
                                            class="mr-[var(--form-details-message-margin-right)] color-text-sub"></span>
                                    </div>
                                    <div class="var-input var--box bg_body">
                                        <div class="var-field-decorator var--box var-field-decorator--outlined">
                                            <div class="var-field-decorator__controller"
                                                style="cursor: text; overflow: hidden; --field-decorator-middle-offset-left: 17px; --field-decorator-middle-offset-width: 315px; --field-decorator-middle-offset-height: 26px;">
                                                <div class="var-field-decorator__icon var-field-decorator--icon-non-hint">
                                                </div>
                                                <div
                                                    class="var-field-decorator__middle var-field-decorator--middle-non-hint">
                                                    <input class="var-input__input" autocomplete="new-password"
                                                        type="text" placeholder="Nomor Sesuai Rekening" value=""
                                                        id="var-input-713"
                                                        style="--input-placeholder-color: var(--field-decorator-placeholder-color, var(--field-decorator-blur-color));" name="account_number">
                                                </div>

                                                <div class="var-field-decorator__icon var-field-decorator--icon-non-hint">

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
                        </div>
                        <button data-v-2195eeef=""
                            class="var-button var--box var-button--normal var--inline-flex var-button--primary var-button--disabled mt-[90px] h-[90px] w-full rounded-[10px] text-[28px]"
                            type="submit">

                            <div class="var-button__content">Langkah Selanjutnya</div>
                            <div class="var-hover-overlay"></div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="var--box var-popup_bank" style="z-index: 2011;" >
        <div class="var-popup_bank__overlay" style="z-index: 2012;"></div>
        <div class="var-popup_bank__content var-popup_bank--bottom ver-area-code" role="dialog" aria-modal="true" style="z-index: 2013; background: #232A34">
            <div class="rounded-t-[20px] bg-paper px-[40px] pb-[20px] pt-[36px]" style="background: #F6F6F6">
                <div class="flex justify-between">
                    <div class="text-[36px] font-500 line-height-[54px]" style="color: rgb(25,29,38);">Bank</div>
                    <div class="font-size-[0]">
                        <img class="h-[54px] w-[54px] close-popup" src="https://m.7spb1772.com/assets/icon/icon_close.svg">
                    </div>
                </div>
                <div class="max-h-[calc(var(--dvh)-150px-200px)] min-h-[calc(var(--dvh)/2-200px)] overflow-y-auto" >
                    <div class="var-cell var-cell--border var-cell--cursor px-[10px]" style="--cell-border-left: 0px; --cell-border-right: 0px;">
                        <div class="var-cell__content">
                            @foreach ($paymentMethods as $pm)    
                                <div class="flex items-center bank-item" data-bank-name=" {{ $pm->payment_name }}" data-bank-id="{{ $pm->id }}" style="height: 40px; width: 100%; background: #232A34; padding: 10px; margin-bottom: 5px; color: #FFFFFF; border-radius: 8px;">
                                    <div>
                                        {{ $pm->payment_name }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            // Show popup when clicking the 'Pilih Bank' input field
            $('#var-input-700').click(function() {
                $('.var-popup_bank').addClass('show');
            });
    
            // Close popup when clicking the close button
            $('.close-popup').click(function() {
                $('.var-popup_bank').removeClass('show');
            });
    
            $('.var-popup_bank__overlay').click(function() {
                $('.var-popup_bank').removeClass('show');
            });
    
            // When a bank item is clicked, set the value of the input field and close the popup
            $('.bank-item').click(function() {
                var bankName = $(this).data('bank-name');  // Get the bank name from the data attribute
                var ID = $(this).data('bank-id');  // Get the bank name from the data attribute
                $('#var-input-700').val(bankName);  // Set the value of the input field
                $('#paymentMethodID').val(ID);  // Set the value of the input field
                $('.var-popup_bank').removeClass('show');  // Close the popup
            });
        });
    </script>
@endsection
