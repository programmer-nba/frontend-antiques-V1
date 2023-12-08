<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Antiques\User\HomeController as AniquesHomeController;
use App\Http\Controllers\PrintController;
use App\Http\Middleware\CheckCashier;
use App\Http\Middleware\CheckUser;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return $exitCode;
    // return what you want
});

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('login', [LoginController::class, 'index'])->name('login.login');

Route::post('login', [LoginController::class, 'login'])->name('login.login');
Route::get('register', function(){
    return view('auth.register');
})->name('register.index');
Route::post('register', [LoginController::class, 'register'])->name('login.register');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('user', function(){
//     return view('antiques_user.index');
// })->name('user.index');
Route::middleware([CheckUser::class])->group(function () {

    Route::get('user', [AniquesHomeController::class, 'index'])->name('user.index');
    // Route::get('cashier/print/receiptorder', [PrintController::class, 'index'])->name('print.report.index');
    // Route::get('user/print-report/generate', [PrintController::class, 'generate'])->name('print.report.generate');
    Route::get('user/print/queue', [PrintController::class, 'queue'])->name('print.queue');

});
Route::get('cashier/print/receiptorder', [PrintController::class, 'index'])->name('print.report.index');

Route::get('user/print-report/generate', [PrintController::class, 'generate'])->name('print.report.generate');

Route::get('/', function () {
    return redirect(route('dashboard'));
})->name('home');

Route::get('/checkOnline', function (App\Repositories\AttendanceRepository $attendanceRepo) {
    if (Auth::check()) { }
    return $attendanceRepo->CountUserOnline();
})->name('checkOnline');



Route::middleware([CheckCashier::class])->group(function () {

    Route::get('cashier', [App\Http\Controllers\Antiques\Cashier\CashierController::class, 'index'])->name('cashier.index');

});




Route::get('cashier/print/receipt-cash-bill', [PrintController::class, 'receiptCashBill'])->name('cashier.print.receipt-cash-bill');
