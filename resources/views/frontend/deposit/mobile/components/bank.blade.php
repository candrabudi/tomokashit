<form data-v-5cbf7a2e="" class="var-form relative mb-150px" method="POST"
    action="{{ route('user.my_account.deposit.store') }}">
    @csrf <!-- CSRF Token for protection -->
    <div data-v-5cbf7a2e="" class="var-space var--box" style="flex-flow: column wrap; justify-content: flex-start;">
        <div class="var-space--auto" style="margin: 0px 0px 10px;">
            <div data-v-5cbf7a2e="" class="ver-select">
                <div class="h-[48px] flex items-center justify-between font-size-[22px]">
                    <span class="ml-[var(--form-details-message-margin-right)] color-text" style="color: #FFFF">
                        <span class="color-[#FF0000]" style="color: #FFFF">*</span>Silakan pilih kartu bank
                    </span>
                </div>
                <div class="var-input var--box">
                    <div class="var-field-decorator var--box" style="color: #FFFF">
                        <fieldset class="var-field-decorator__line" style="border-radius: 8px;">
                            <div class="var-field-decorator__controller" style="overflow: hidden;">
                                <div class="var-field-decorator__middle var-field-decorator--middle-non-hint">
                                    <input class="var-input__input" autocomplete="new-password" readonly=""
                                        type="text" placeholder="Silakan pilih kartu bank" id="bankSelector" required
                                        style="color: #FFFF">
                                    <input type="hidden" id="paymentID" name="payment_id">
                                </div>
                                <div class="var-field-decorator__icon var-field-decorator--icon-non-hint">
                                    <i class="var-icon var-icon--set var-icon-menu-down"></i>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div id="selectedBankDetails" class="mt-[20px] text-[22px] font-[500] mb-10" style="margin-bottom: 20px;">

        </div>

        <div id="bankModal" class="var--box var-popup" style="z-index: 2004; display: none;">
            <div class="var-popup__overlay" style="z-index: 2005;"></div>
            <div class="var-popup__content var-popup--bottom ver-area-code" style="z-index: 2006;">
                <div class="rounded-t-[20px] bg-paper px-[40px] pb-[20px] pt-[36px]">
                    <div class="flex justify-between">
                        <div class="text-[36px] font-500 line-height-[54px]">Silakan pilih kartu bank</div>
                        <div class="font-size-[0]">
                            <img class="h-[54px] w-[54px]" src="https://m.7spb1772.com/assets/icon/icon_close.svg" id="closeModal">
                        </div>
                    </div>
                    <div class="ver-input py-[20px]">
                        <input class="var-input__input" type="text" placeholder="Mencari">
                    </div>
                    <div class="max-h-[calc(var(--dvh)-150px-200px)] overflow-y-auto">
                        @foreach ($banks as $bank)
                            <div class="var-cell var-cell--border var-cell--cursor px-[10px]"
                                data-bank-payment-id="{{ $bank->id }}" data-bank-image="-"
                                data-bank-name="{{ $bank->payment_name }}" data-bank-image="-"
                                data-account-name="{{ $bank->payment_account_name }}"
                                data-account-number="{{ $bank->payment_account_number }}">
                                <div class="var-cell__content">
                                    <img src="-" class="mr-[10px] w-[62px]">{{ $bank->payment_name }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="var-space--auto" style="margin: 0px 0px 10px;">
            <div data-v-5cbf7a2e="" class="ver-input-box">
                <div
                    class="absolute left-20px top-22px z-10 h-[48px] flex items-center justify-between font-size-[22px]">
                    <span class="ml-[var(--form-details-message-margin-right)] color-text"><span
                            class="color-[#FF0000]">*</span>Jumlah Deposit / IDRK</span>
                </div>
                <div class="var-input var--box placeholder:font-normal bg_paper">
                    <div class="var-field-decorator var--box var-field-decorator--outlined">
                        <div class="var-field-decorator__controller" style="cursor: text; overflow: hidden;">
                            <div class="var-field-decorator__icon var-field-decorator--icon-non-hint"></div>
                            <div class="var-field-decorator__middle var-field-decorator--middle-non-hint">
                                <input id="deposit-amount" class="var-input__input" autocomplete="new-password"
                                    type="text" placeholder="Silahkan masukin nominal yang disetor"
                                    inputmode="numeric" name="amount" required>
                            </div>
                            <div class="var-field-decorator__icon var-field-decorator--icon-non-hint"></div>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-20px left-30px w-[calc(100%-60px)]">
                    <div class="var-divider var--box" role="separator"></div>
                    <div class="overflow-hidden text-ellipsis whitespace-nowrap text-26px color-text font-medium">
                        <div data-v-5cbf7a2e="" class="overflow-hidden text-ellipsis whitespace-nowrap">Minimal
                            deposit:
                            <span data-v-5cbf7a2e="" class="text-[#FF0000]">IDR 50,000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="var-space--auto" style="margin: 0px;">
            <div data-v-5cbf7a2e=""
                class="flex items-center justify-between rounded-20px bg-[#e5f5ec] px-30px py-20px">
                <img data-v-5cbf7a2e="" src="https://m.7spb1772.com/assets/icon/safety2.png" class="h-50px w-50px">
                <div data-v-5cbf7a2e="" class="ml-36px text-24px color-[#0AD664]">Anda akan diarahkan ke situs pihak
                    ketiga yang terverifikasi oleh Spotbet, untuk mendapatkan pengalaman setoran yang aman dan
                    terpercaya.</div>
            </div>
        </div>
    </div>


    <button data-v-5cbf7a2e=""
        class="var-button var--box var-button--normal var--inline-flex var-button--primary mt-[20px] h-[90px] w-full rounded-[10px] text-[28px]"
        type="submit">
        <div class="var-button__content">Langkah selanjutnya</div>
        <div class="var-hover-overlay"></div>
    </button>
</form>


<style>
    #bankModal {
        position: fixed;
        bottom: -100%;
        left: 0;
        width: 100%;
        transition: bottom 0.4s ease-in-out;
    }

    #bankModal.show {
        bottom: 0;
    }

    .var-popup__overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 2005;
    }

    #selectedBankDetails {
        background-color: #191D26;
        border-radius: 8px;
        padding: 20px;
        margin-top: 20px;
    }

    #selectedBankDetails .flex {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    #selectedBankDetails .mr-[10px] {
        margin-right: 10px;
    }

    #selectedBankDetails img {
        width: 62px;
        border-radius: 4px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    #selectedBankDetails .mb-[10px] {
        margin-bottom: 10px;
    }

    #selectedBankDetails button {
        background-color: #4f5b66;
        color: #f0f0f0;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #selectedBankDetails button:hover {
        background-color: #6a7f8b;
    }
</style>

<script>
    document.getElementById('bankSelector').addEventListener('click', function() {
        document.getElementById('bankModal').style.display = 'block';
        setTimeout(function() {
            document.getElementById('bankModal').classList.add('show');
        }, 10);
    });

    document.getElementById('closeModal').addEventListener('click', function() {
        closeModal();
    });

    document.querySelectorAll('.var-cell').forEach(function(cell) {
        cell.addEventListener('click', function() {
            const bankName = this.getAttribute('data-bank-name');
            const accountName = this.getAttribute('data-account-name');
            const accountNumber = this.getAttribute('data-account-number');
            const paymentID = this.getAttribute('data-bank-payment-id');

            document.getElementById('selectedBankDetails').innerHTML = `
            <div class="flex items-center mb-[10px]">
                <span style="color: #FFFFFF;"><strong>${bankName}</strong></span>
            </div>
            <div class="mb-[10px]" style="color: #FFFFFF;"><strong>Nama Pemilik:</strong> ${accountName}</div>
            <div class="mb-[10px]" style="color: #FFFFFF;">
                <strong style="color: #FFFFFF;">Nomor Akun:</strong> <span id="bankAccountNumber">${accountNumber}</span>
                <br>
                <button id="copyAccountNumber" type="button" class="rounded" style="width: 120px; height:25px; font-size: 12px; color: #FFFFFF; text-alight: center; margin-top: 10px;">Copy</button>
            </div>
        `;

            document.getElementById('bankSelector').value = bankName;
            document.getElementById('paymentID').value = paymentID;

            document.getElementById('copyAccountNumber').addEventListener('click', function() {
                copyToClipboard(accountNumber);
            });

            closeModal();
        });
    });

    function closeModal() {
        document.getElementById('bankModal').classList.remove('show');
        setTimeout(function() {
            document.getElementById('bankModal').style.display = 'none';
        }, 400);
    }

    function copyToClipboard(text) {
        const tempInput = document.createElement('input');
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        alert('Nomor akun berhasil disalin!');
    }
</script>