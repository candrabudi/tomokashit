<div class="var--box var-popup" style="z-index: 2020;">
    <div class="var-popup__overlay" style="z-index: 2021;"></div>
    <div class="var-popup__content var-popup--bottom ver-login" role="dialog" aria-modal="true" style="z-index: 2022;">
        <div class="h-[calc(var(--dvh)-150px)] overflow-y-auto rounded-t-[20px] bg-paper p-[40px] pt-[32px]">
            <div id="login-section">
                <div class="flex justify-between">
                    <div class="pb-[38px] pt-[76px] text-[50px] color-text font-600">
                        Login dengan akun
                    </div>
                    <div class="absolute left-4% top-0 z-8 h-100px w-92% bg-paper"></div>
                    <div class="absolute right-[40px] top-[32px] z-9 text-[0px]">
                        <img class="h-[54px] w-[54px]" src="https://m.7spb1772.com/assets/icon/icon_close.svg"
                            id="close-login">
                    </div>
                </div>
                <form class="var-form" method="POST" action="{{ route('user.login.process') }}">
                    @csrf
                    <div class="ver-input">
                        <div class="h-[48px] flex items-center justify-between font-size-[22px]">
                            <span class="color-text">Silakan masukan akun anda</span>
                        </div>
                        <div class="var-input var--box bg_body">
                            <label for="" class="mt-5"
                                style="font-size: 14px; margin-bottom: 15px;">username</label>
                            <div class="var-field-decorator var--box var-field-decorator--outlined mt-5">
                                <div class="var-field-decorator__controller">
                                    <div class="var-field-decorator__middle">
                                        <input class="var-input__input" name="username" autocomplete="username"
                                            type="text" placeholder="Username" value="{{ old('username') }}"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="var-input var--box bg_body mt-10">
                            <label for="" class="mt-5"
                                style="font-size: 14px; margin-bottom: 15px;">password</label>
                            <div class="var-field-decorator var--box var-field-decorator--outlined mt-5">
                                <div class="var-field-decorator__controller">
                                    <div class="var-field-decorator__middle">
                                        <input class="var-input__input" name="password" autocomplete="current-password"
                                            type="password" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button
                        class="var-button var--box var-button--normal var--inline-flex var-button--primary mt-[48px] h-[90px] w-full rounded-[10px] text-[28px]"
                        type="submit">
                        <div class="var-button__content">Langkah Selanjutnya</div>
                    </button>
                    <div class="mt-[20px] flex justify-center text-[24px]">
                        <div>Belum memiliki akun？<span class="text-primary" id="register-link">Daftar
                                sekarang</span></div>
                    </div>
                </form>

            </div>

            <div id="register-section" style="display: none;">
                <div class="flex justify-between">
                    <div class="pb-[38px] pt-[76px] text-[50px] color-text font-600">
                        Buat Akun Baru
                    </div>
                    <div class="absolute left-4% top-0 z-8 h-100px w-92% bg-paper"></div>
                    <div class="absolute right-[40px] top-[32px] z-9 text-[0px]">
                        <img class="h-[54px] w-[54px]" src="https://m.7spb1772.com/assets/icon/icon_close.svg"
                            id="close-register">
                    </div>
                </div>
                <form class="var-form" method="POST" action="{{ route('auth.user.register.process') }}">
                    @csrf
                    <!-- Username Input -->
                    <div class="ver-input">
                        <div class="h-[48px] flex items-center justify-between font-size-[22px]">
                            <span class="color-text">Silakan masukan akun anda</span>
                        </div>
                        <div class="var-input var--box bg_body">
                            <div class="var-field-decorator var--box var-field-decorator--outlined">
                                <div class="var-field-decorator__controller">
                                    <div class="var-field-decorator__middle">
                                        <input class="var-input__input" name="username" autocomplete="new-password"
                                            type="text" placeholder="Akun harus terdiri dari 6-16 karakter"
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ver-input">
                        <div class="h-[48px] flex items-center justify-between font-size-[22px]">
                            <span class="color-text">Kata sandi</span>
                        </div>
                        <div class="var-input var--box bg_body">
                            <div class="var-field-decorator var--box var-field-decorator--outlined">
                                <div class="var-field-decorator__controller">
                                    <div class="var-field-decorator__middle">
                                        <input class="var-input__input" name="password" autocomplete="new-password"
                                            type="password" placeholder="Kata sandi terdiri dari 8-20 karakter">
                                        @error('password')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ver-input">
                        <div class="h-[48px] flex items-center justify-between font-size-[22px]">
                            <span class="color-text">Email</span>
                        </div>
                        <div class="var-input var--box bg_body">
                            <div class="var-field-decorator var--box var-field-decorator--outlined">
                                <div class="var-field-decorator__controller">
                                    <div class="var-field-decorator__middle">
                                        <input class="var-input__input" name="email" autocomplete="new-password"
                                            type="email" placeholder="Masukkan email Anda"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ver-input">
                        <div class="h-[48px] flex items-center justify-between font-size-[22px]">
                            <span class="color-text">Silakan masukkan nomor ponsel Anda</span>
                        </div>
                        <div class="var-input var--box bg_body">
                            <div class="var-field-decorator var--box var-field-decorator--outlined">
                                <div class="var-field-decorator__controller">
                                    <div class="var-field-decorator__middle">
                                        <input class="var-input__input" name="phone_number"
                                            autocomplete="new-password" type="tel" placeholder="Nomor ponsel"
                                            value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button
                        class="var-button var--box var-button--normal var--inline-flex var-button--primary mt-[48px] h-[90px] w-full rounded-[10px] text-[28px]"
                        type="submit">
                        <div class="var-button__content">Konfirmasi dan daftar</div>
                    </button>
                    <div class="mt-[20px] flex justify-center text-[24px]">
                        <div>Sudah punya akun？<span class="text-primary" id="back-to-login">Login sekarang</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
