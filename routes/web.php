<?php

use App\Http\Controllers\Backoffice\BAuthController;
use App\Http\Controllers\Backoffice\BBannerController;
use App\Http\Controllers\Backoffice\BDashboardController;
use App\Http\Controllers\Backoffice\BMemberController;
use App\Http\Controllers\Backoffice\BPaymentAccountController;
use App\Http\Controllers\Backoffice\BPaymentMethodController;
use App\Http\Controllers\Frontend\FAuthController;
use App\Http\Controllers\Frontend\FDepositController;
use App\Http\Controllers\Frontend\FHomeController;
use App\Http\Controllers\Frontend\FPaymentAccountController;
use App\Http\Controllers\Frontend\FProfileController;
use App\Http\Controllers\Frontend\FSlotController;
use App\Http\Controllers\Frontend\FWithdrawController;
use App\Http\Controllers\Frontend\MenuMobileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FHomeController::class, 'index'])->name('user.home');
Route::get('/casino/slots', [FSlotController::class, 'index'])->name('casino.slots');
Route::get('/casino/slots/providers', [FSlotController::class, 'providers'])->name('casino.slots.provider');
Route::get('/casino/slots/providers/{a}', [FSlotController::class, 'games'])->name('casino.slots.provider.games');
Route::get('/provider/create-or-update', [FSlotController::class, 'createOrUpdateProvider'])->name('casino.createOrUpdateProvider');
Route::get('/game/create-or-update', [FSlotController::class, 'createOrUpdateGame'])->name('casino.createOrUpdateGame');
Route::get('/load-more-games', [FSlotController::class, 'loadMoreGames']);

Route::post('/user/login/process', [FAuthController::class, 'processLogin'])->name('user.login.process');

Route::get('/user/register', [FAuthController::class, 'register'])->name('auth.user.register');
Route::post('/user/register/process', [FAuthController::class, 'processRegister'])->name('auth.user.register.process');
Route::get('/user/login', [FAuthController::class, 'login'])->name('auth.user.login');

Route::get('/my-account', [FProfileController::class, 'index'])->name('user.my_account');

Route::get('/my-account/deposit', [FDepositController::class, 'index'])->name('user.my_account.deposit');
Route::post('/my-account/deposit/store', [FDepositController::class, 'store'])->name('user.my_account.deposit.store');

Route::get('/my-account/withdraw', [FWithdrawController::class, 'index'])->name('user.my_account.withdraw');
Route::post('/my-account/withdraw/store', [FWithdrawController::class, 'store'])->name('user.my_account.withdraw.store');


Route::get('/casino/slots/play/{gameAlias}', [FSlotController::class, 'playGame'])->name('casino.slots.play');

Route::get('/my-account/payment', [FPaymentAccountController::class, 'index'])->name('user.my_account.payment_account');
Route::post('/my-account/payment/store', [FPaymentAccountController::class, 'store'])->name('user.my_account.payment_account.store');

Route::get('/menu', [MenuMobileController::class, 'index'])->name('menu.mobile.index');

Route::get('/system/login', [BAuthController::class, 'login'])->name('system.login');
Route::post('/system/login/process', [BAuthController::class, 'loginProcess'])->name('system.login.process');

Route::get('/games/fetch', [FSlotController::class, 'fetchGames'])->name('games.fetch');

Route::get('/games', [FSlotController::class, 'getGames']);
Route::get('/providers', [FSlotController::class, 'getProviders']);

Route::get('/check-auth', function() {
    return response()->json(['isAuthenticated' => auth()->check()]);
});



// Dashboard Routes Group
Route::middleware(['auth', 'role:admin,superadmin'])->prefix('system/dashboard')->group(function () {
    Route::get('/', [BDashboardController::class, 'index'])->name('system.dashboard');
    Route::get('/summary', [BDashboardController::class, 'dashboardSummary'])->name('system.dashboard.summary');
    
    Route::post('/logout', [BAuthController::class, 'logout'])->name('logout');
    Route::prefix('member')->group(function () {
        Route::get('/list', [BDashboardController::class, 'getMemberList'])->name('system.dashboard.member.list');
        Route::get('/detail/{id}', [BDashboardController::class, 'getMemberDetail']);
        Route::post('/lock/{id}', [BDashboardController::class, 'lockMember']);
    });

    Route::prefix('deposit')->group(function () {
        Route::get('/pending/list', [BDashboardController::class, 'getTransactionDepositPending'])->name('dashboard.deposit.pending');
        Route::get('/{transactionNumber}/detail', [BDashboardController::class, 'getTransactionDetail'])->name('dashboard.deposit.detail');
        Route::post('/update/{a}', [BDashboardController::class, 'updateStatusDeposit'])->name('dashboard.deposit.update');
    });

    Route::prefix('withdraw')->group(function () {
        Route::get('/pending/list', [BDashboardController::class, 'getTransactionWithdrawPending'])->name('dashboard.withdraw.pending');
        Route::get('/pending/sse', [BDashboardController::class, 'streamWithdrawUpdates'])->name('dashboard.withdraw.streamWithdrawUpdates');
        Route::get('/{transactionNumber}/detail', [BDashboardController::class, 'getTransactionWithdrawDetail'])->name('dashboard.withdraw.detail');
        Route::post('/update/{a}', [BDashboardController::class, 'updateStatusWithdraw'])->name('dashboard.withdraw.update');
    });

});

// Payment Routes Group
Route::middleware(['auth', 'role:admin,superadmin'])->prefix('system/payment')->group(function () {
    Route::prefix('method')->group(function () {
        Route::get('/', [BPaymentMethodController::class, 'index'])->name('system.payment.method');
        Route::post('/store', [BPaymentMethodController::class, 'store'])->name('system.payment.method.store');
        Route::put('/update/{a}', [BPaymentMethodController::class, 'update'])->name('system.payment.method.update');
        Route::delete('/delete/{a}', [BPaymentMethodController::class, 'destroy'])->name('system.payment.method.destroy');
    });

    Route::prefix('accounts')->group(function () {
        Route::get('/', [BPaymentAccountController::class, 'index'])->name('system.payment.accounts.index');
        Route::get('/create', [BPaymentAccountController::class, 'create'])->name('system.payment.accounts.create');
        Route::post('/', [BPaymentAccountController::class, 'store'])->name('system.payment.accounts.store');
        Route::get('/{paymentAccount}', [BPaymentAccountController::class, 'show'])->name('system.payment.accounts.show');
        Route::get('/{paymentAccount}/edit', [BPaymentAccountController::class, 'edit'])->name('system.payment.accounts.edit');
        Route::put('/{paymentAccount}', [BPaymentAccountController::class, 'update'])->name('system.payment.accounts.update');
        Route::delete('/{paymentAccount}', [BPaymentAccountController::class, 'destroy'])->name('system.payment.accounts.destroy');
    });
});

// // Routes for Superadmin Only
// Route::middleware(['auth', 'role:superadmin'])->prefix('system/superadmin')->group(function () {
//     // Only accessible to superadmin
//     Route::get('/manage-roles', [SuperAdminController::class, 'manageRoles'])->name('superadmin.manage.roles');
//     Route::post('/update-role/{user}', [SuperAdminController::class, 'updateUserRole'])->name('superadmin.update.role');
// });

// Members Routes Group (for both admin and superadmin)
Route::middleware(['auth', 'role:admin,superadmin'])->prefix('system/members')->group(function () {
    Route::get('/', [BMemberController::class, 'index'])->name('system.member');
    Route::get('/list-all', [BMemberController::class, 'getAllUsers'])->name('system.member.getAllUsers');
    Route::get('/list-all/sse', [BMemberController::class, 'streamUsers'])->name('system.member.getAllUsers.sse');


    Route::get('banners', [BBannerController::class, 'index'])->name('system.banners.index');
    Route::get('banners/create', [BBannerController::class, 'create'])->name('system.banners.create');
    Route::post('banners', [BBannerController::class, 'store'])->name('system.banners.store');
    Route::get('banners/{id}/edit', [BBannerController::class, 'edit'])->name('system.banners.edit');
    Route::put('banners/{id}', [BBannerController::class, 'update'])->name('system.banners.update');
    Route::delete('banners/{id}', [BBannerController::class, 'destroy'])->name('system.banners.destroy');
});
