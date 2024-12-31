<div class="tab-content px-20px pt-[10px]" id="content-ebanking">
    <div class="px-20px pt-[10px]">
        <form data-v-33d8ccb5="" action="{{ route('user.my_account.deposit.store') }}" method="POST" class="var-form">
            @csrf
            <div data-v-33d8ccb5="">

                <div class="ver-select mb-16">
                    <div class="mb-4 min-h-[16px] flex items-center justify-between font-size-[12px]">
                        <span class="ml-[var(--form-details-message-margin-right)] color-text">
                            <span class="color-[#FF0000]">*</span>Silakan pilih kartu bank
                        </span>
                        <span class="mr-[var(--form-details-message-margin-right)] color-text-sub"></span>
                    </div>
                    <div class="var-input var--box pointer bg_paper" id="bank-selection">
                        <div class="var-field-decorator var--box var-field-decorator--outlined">
                            <div class="var-field-decorator__controller">
                                <input class="var-input__input" readonly type="text"
                                    placeholder="Silakan pilih kartu bank" id="selected-bank-name">
                            </div>
                            <input type="hidden" name="payment_id" id="selected-bank-id">
                        </div>
                    </div>
                </div>


                <div class="mb-16" style="background: #FFFFFF; padding: 15px;display: none; border-radius: 4px;"
                    id="bank-details">
                    <div class="var-input var--box pointer bg_paper">
                        <div class="var-field-decorator var--box var-field-decorator--outlined">
                            <div>
                                <p><strong>Nama Rekening:</strong> <span id="account-name"></span></p>
                                <p><strong>Nomor Rekening:</strong> <span id="account-number"></span>
                                    <button id="copy-account-number" type="button" class="btn-copy"
                                        style="background-color: #007BFF; color: white; border: none; border-radius: 4px; padding: 5px 10px; cursor: pointer;">Copy</button>
                                </p>
                                <p id="copy-success" style="color: green; display: none;">Nomor rekening berhasil
                                    disalin!</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div data-v-33d8ccb5="" class="mb-16">
                    <div data-v-33d8ccb5="" class="ver-input bank-order-amount">
                        <div
                            class="ver-input-tips mb-4 min-h-[16px] flex items-center justify-between font-size-[12px]">
                            <div class="color-text">
                                <span class="color-[#FF0000]">*</span>
                                <span class="opacity-80">Jumlah Deposit / IDRK</span>
                            </div>
                            <span class="mr-[var(--form-details-message-margin-right)] color-text-sub">
                                <div data-v-33d8ccb5="">Minimal deposit: <span data-v-33d8ccb5=""
                                        class="text-[#FF0000]">IDR 10,000</span></div>
                            </span>
                        </div>
                        <div class="var-input var--box bg_paper">
                            <div class="var-field-decorator var--box var-field-decorator--outlined">
                                <div class="var-field-decorator__controller" style="cursor: text; overflow: hidden;">
                                    <div class="var-field-decorator__icon var-field-decorator--icon-non-hint"></div>
                                    <div class="var-field-decorator__middle var-field-decorator--middle-non-hint">
                                        <input class="var-input__input" type="text"
                                            placeholder="Silahkan masukin nominal yang disetor"
                                            id="amount-input" name="amount">
                                    </div>
                                    <div class="var-field-decorator__icon var-field-decorator--icon-non-hint"></div>
                                </div>
                                <fieldset class="var-field-decorator__line">
                                    <legend class="var-field-decorator__line-legend"></legend>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex flex-wrap justify-between">
                        <button class="var-button var--box var-button--normal var--inline-flex var-button--default relative mb-[10px] h-[48px] w-[30%] flex items-center justify-center rounded-10px bg-paper text-[16px]" type="button" onclick="setAmount(50000)">
                            <div class="var-button__content"><span>+50,000</span></div>
                        </button>
                        <button class="var-button var--box var--inline-flex var-button--default relative mb-[10px] h-[48px] w-[30%] flex items-center justify-center rounded-10px bg-paper text-[16px]" type="button" onclick="setAmount(100000)">
                            <div class="var-button__content"><span>+100,000</span></div>
                        </button>
                        <button class="var-button var--box var--inline-flex var-button--default relative mb-[10px] h-[48px] w-[30%] flex items-center justify-center rounded-10px bg-paper text-[16px]" type="button" onclick="setAmount(150000)">
                            <div class="var-button__content"><span>+150,000</span></div>
                        </button>
                    </div>
                    
                    <div class="mt-8 flex flex-wrap justify-between">
                        <button class="var-button var--box var--inline-flex var-button--default relative mb-[10px] h-[48px] w-[30%] flex items-center justify-center rounded-10px bg-paper text-[16px]" type="button" onclick="setAmount(250000)">
                            <div class="var-button__content"><span>+250,000</span></div>
                        </button>
                        <button class="var-button var--box var--inline-flex var-button--default relative mb-[10px] h-[48px] w-[30%] flex items-center justify-center rounded-10px bg-paper text-[16px]" type="button" onclick="setAmount(500000)">
                            <div class="var-button__content"><span>+500,000</span></div>
                        </button>
                        <button class="var-button var--box var--inline-flex var-button--default relative mb-[10px] h-[48px] w-[30%] flex items-center justify-center rounded-10px bg-paper text-[16px]" type="button" onclick="setAmount(1000000)">
                            <div class="var-button__content"><span>+1,000,000</span></div>
                        </button>
                    </div>

                    <script>
                        function setAmount(amount) {
                            document.getElementById('amount-input').value = amount;
                        }
                    </script>

                    <div data-v-33d8ccb5="" class="absolute bottom-0 bg-body" style="width: 85%">
                        <button data-v-33d8ccb5=""
                            class="var-button var--box var-button--normal var--inline-flex var-button--primary mt-[20px] h-[54px] w-full rounded-[10px] text-[18px]"
                            type="submit">

                            <div class="var-button__content">Deposit</div>
                            <div class="var-hover-overlay"></div>
                        </button>
                        <div data-v-33d8ccb5=""
                            class="mb-26 mt-[12px] flex justify-center text-[12px] color-text-sub">
                            <div data-v-33d8ccb5="">Lanjut dan sejutu <span data-v-33d8ccb5=""
                                    class="text-[#2987F7] underline underline-[#2987F7] pointer">Syarat dan
                                    Ketentuan</span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </form>
    </div>
</div>





<!-- Popup untuk memilih bank -->
<div class="var--box var-popup" id="bank-popup" style="display: none; z-index: 2013;">
    <div class="var-popup__overlay" id="popup-overlay" style="z-index: 2014; background: rgba(0, 0, 0, 0.2);"></div>
    <div class="var-popup__content var-popup--center select-options-popup" role="dialog" aria-modal="true"
        style="z-index: 2015;">
        <div class="w-510 rounded-[10px] bg-paper px-[20px] pb-[12px] pt-[12px]">
            <div class="flex items-center justify-between">
                <div class="text-[12px] font-500 line-height-[17px]">Silakan pilih kartu bank</div>
                <div class="font-size-[0]">
                    <img id="close-popup" class="h-[18px] w-[18px] pointer"
                        src="https://www.7spb1772.com/assets/icon/icon_close.svg">
                </div>
            </div>
            <div class="max-h-[300px] overflow-y-auto">
                <!-- Laravel Blade foreach untuk iterasi bank -->
                @foreach (banks() as $bank)
                    <div class="var-cell var-cell--border var-cell--cursor px-[10px] pointer bank-option"
                        data-bank-id="{{ $bank['payment_method_id'] }}" data-bank-name="{{ $bank['payment_name'] }}"
                        data-account-name="{{ $bank['payment_account_name'] }}"
                        data-account-number="{{ $bank['payment_account_number'] }}">
                        <div class="var-cell__content flex items-center">
                            <img src="{{ $bank['payment_image'] }}" class="mr-[10px] w-[32px]">{{ $bank['payment_name'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<style>
    .var-popup__overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Dark overlay */
    }

    .var-popup__content {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        border-radius: 10px;
        z-index: 2015;
    }
</style>


<script>
    document.getElementById('copy-account-number').addEventListener('click', function() {
        // Ambil teks dari nomor rekening
        var accountNumber = document.getElementById('account-number').textContent;

        // Buat elemen sementara untuk menyalin teks ke clipboard
        var tempInput = document.createElement('input');
        tempInput.style.position = 'absolute';
        tempInput.style.left = '-9999px';
        tempInput.value = accountNumber;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        // Tampilkan pesan sukses
        var copySuccessMessage = document.getElementById('copy-success');
        copySuccessMessage.style.display = 'block';

        // Sembunyikan pesan sukses setelah 3 detik
        setTimeout(function() {
            copySuccessMessage.style.display = 'none';
        }, 3000);
    });
</script>
<script>
    // Menampilkan popup modal saat klik pada input
    document.getElementById('bank-selection').addEventListener('click', function() {
        document.getElementById('bank-popup').style.display = 'block';
    });

    // Menutup popup modal
    document.getElementById('close-popup').addEventListener('click', function() {
        document.getElementById('bank-popup').style.display = 'none';
    });
    document.getElementById('popup-overlay').addEventListener('click', function() {
        document.getElementById('bank-popup').style.display = 'none';
    });

    // Memilih bank dan mengisi input dengan nama bank yang dipilih
    var bankOptions = document.querySelectorAll('.bank-option');
    bankOptions.forEach(function(option) {
        option.addEventListener('click', function() {
            var bankName = this.getAttribute('data-bank-name');
            var bankId = this.getAttribute('data-bank-id');
            var accountName = this.getAttribute('data-account-name');
            var accountNumber = this.getAttribute('data-account-number');

            // Mengisi input dengan nama bank
            document.getElementById('selected-bank-name').value = bankName;

            // Menyimpan ID bank yang dipilih di input hidden
            document.getElementById('selected-bank-id').value = bankId;

            // Menampilkan detail rekening berdasarkan bank yang dipilih
            document.getElementById('account-name').innerText = accountName;
            document.getElementById('account-number').innerText = accountNumber;
            document.getElementById('bank-details').style.display = 'block';

            // Menutup popup modal
            document.getElementById('bank-popup').style.display = 'none';
        });
    });
</script>
