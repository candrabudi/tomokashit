@extends('frontend.layouts.app')
@section('mobile-style')
@endsection
@section('content_mobile')
    <div id="app" class="scrollbar-hide" data-v-app="">
        <div>

            <div data-v-24da9ae7="" class="record-container">
                <div class="var-app-bar var--box var-app-bar--safe-area-top var-app-bar--fixed nav-bar"
                    style="background: transparent; color: var(--color-text); z-index: 1000;">
                    <div class="var-app-bar__toolbar">
                        <div class="var-app-bar__left">
                            <a href="{{ route('users.profile') }}" style="text-decoration: none;"
                                class="var-button var--box var-button--normal var--inline-flex var-button--text var-button--text-default"
                                type="button" style="color: var(--color-text); background: transparent;">

                                <div class="var-button__content"><i class="var-icon var-icon--set var-icon-chevron-left"
                                        style="transition-duration: 0ms; font-size: 6vw;"></i></div>
                                <div class="var-hover-overlay"></div>
                            </a>

                        </div>
                        <div class="var-app-bar__title">
                            <div class="overflow-hidden text-ellipsis px-80">Rincian dana</div>
                        </div>
                        <div class="var-app-bar__right">

                            <button data-v-24da9ae7=""
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
                <div data-v-24da9ae7="" class="mx-20px my-20px flex justify-between">
                    <div data-v-24da9ae7="" class="var-space var--box w-full overflow-x-auto scrollbar-hide !flex-nowrap"
                        style="flex-flow: wrap; justify-content: flex-start; margin: calc(0px) 0px;">
                        <div class="" style="margin: calc(0px) 10px calc(0px) 0px;">
                            <a href="{{ route('user.my_account.history_balance', ['filter' => 'hari-ini']) }}">
                                <button
                                    class="var-button var--box var-button--normal var--inline-flex {{ request('filter') == 'hari-ini' ? 'var-button--primary' : 'var-button--default' }} h-[60px] shrink-0 rounded-[30px] px-[30px] text-24px"
                                    type="button">
                                    <div class="var-button__content">Hari ini</div>
                                </button>
                            </a>
                        </div>
                        <div class="" style="margin: calc(0px) 10px calc(0px) 0px;">
                            <a href="{{ route('user.my_account.history_balance', ['filter' => 'kemarin']) }}">
                                <button
                                    class="var-button var--box var-button--normal var--inline-flex {{ request('filter') == 'kemarin' ? 'var-button--primary' : 'var-button--default' }} h-[60px] shrink-0 rounded-[30px] px-[30px] text-24px"
                                    type="button">
                                    <div class="var-button__content">Kemarin</div>
                                </button>
                            </a>
                        </div>
                        <div class="" style="margin: calc(0px) 10px calc(0px) 0px;">
                            <a href="{{ route('user.my_account.history_balance', ['filter' => '7-hari-terakhir']) }}">
                                <button
                                    class="var-button var--box var-button--normal var--inline-flex {{ request('filter') == '7-hari-terakhir' ? 'var-button--primary' : 'var-button--default' }} h-[60px] shrink-0 rounded-[30px] px-[30px] text-24px"
                                    type="button">
                                    <div class="var-button__content">7 Hari Terakhir</div>
                                </button>
                            </a>
                        </div>
                        <div class="" style="margin: calc(0px) 0px;">
                            <a href="{{ route('user.my_account.history_balance', ['filter' => '30-hari-terakhir']) }}">
                                <button
                                    class="var-button var--box var-button--normal var--inline-flex {{ request('filter') == '30-hari-terakhir' ? 'var-button--primary' : 'var-button--default' }} h-[60px] shrink-0 rounded-[30px] px-[30px] text-24px"
                                    type="button">
                                    <div class="var-button__content">30 Hari Terakhir</div>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="h-[calc(var(--dvh)-var(--app-bar-height)-60px-40px)] overflow-y-auto px-4">
                    @if ($transactions->isEmpty())
                        <div class="py-24">
                            <div class="text-center">
                                <div class="mb-7 ml-auto mr-auto w-200">
                                    <div class="var-image var--box" style="border-radius: 0;" style="width: 280px">
                                        <img role="img" class="var-image__image"
                                            src="https://m.7spb1772.com/assets/icon/empty.svg"
                                            style="object-fit: fill; object-position: 50% 50%;" style="width: 280px;">
                                    </div>
                                </div>
                                <h5 class="mx-auto my-2 text-sm text-gray-600 font-normal">Belum ada transaksi</h5>
                            </div>
                        </div>
                    @else
                        <div class="grid gap-4" style="padding: 10px;">
                            @foreach ($transactions as $transaction)
                                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-md"
                                    style="padding: 15px;margin-bottom: 15px; border-radius: 8px;">
                                    <div class="flex justify-between items-center">
                                        <h5 class="text-sm font-semibold text-gray-700">
                                            {{ $transaction->created_at->format('d M Y H:i') }}</h5>
                                        <span class="text-sm font-medium text-gray-600">
                                            {{ ucfirst($transaction->type) }}
                                        </span>
                                    </div>
                                    <div class="mt-2">
                                        <p
                                            class="text-lg font-semibold 
                                            {{ $transaction->type == 'withdraw' ? 'text-red-600' : 'text-green-600' }}">
                                            {{ number_format($transaction->nominal, 0, ',', '.') }} IDR
                                        </p>
                                    </div>
                                    <div class="mt-2 flex justify-between items-center">
                                        <span
                                            class="px-2 py-1 rounded-full text-xs font-semibold 
                                            {{ $transaction->status == 'approved'
                                                ? 'bg-green-100 text-green-600'
                                                : ($transaction->status == 'rejected'
                                                    ? 'bg-red-100 text-red-600'
                                                    : 'bg-yellow-100 text-yellow-600') }}">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                        <p class="text-xs text-gray-500">{{ $transaction->notes }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Paginate -->
                        <div class="mt-4 text-center">
                            {{ $transactions->links() }}
                        </div>
                    @endif
                </div>


                <div data-v-24da9ae7=""></div>
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
