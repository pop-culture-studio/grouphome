<?php

use App\Http\Controllers\Admin\OperatorHomeController;
use App\Http\Controllers\Admin\OperatorRequestController;
use App\Http\Controllers\AreaIndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Operator\DashboardController;
use App\Http\Controllers\Operator\RequestController;
use App\Http\Controllers\PrefAreaController;
use App\Http\Controllers\PrefController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'home')->name('index');

Route::resource('home', HomeController::class)
     ->only(['index', 'show']);

Route::get('pref/{pref}/area/{area}', PrefAreaController::class)->name('pref.area');
Route::get('pref/{pref}', PrefController::class)->name('pref');

Route::get('area', AreaIndexController::class)->name('area.index');

Route::view('history', 'history')->name('history');

Route::middleware(['auth:sanctum', 'verified'])
     ->get('/dashboard', DashboardController::class)
     ->name('dashboard');

Route::prefix('operator')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('request/{home}', RequestController::class)->name('operator.request');
});

Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'can:admin'])->group(function () {
    Route::view('/', 'admin.index')->name('admin');
    Route::resource('operator-requests', OperatorRequestController::class);

    Route::controller(OperatorHomeController::class)
         ->prefix('operator-home')
         ->as('operator-home.')
         ->group(function () {
             Route::get('/', 'index')->name('index');
             Route::delete('/{user}/{home}', 'destroy')->name('destroy');
         });
});

Route::view('contact', 'contact')->name('contact');
Route::view('license', 'license')->name('license');
Route::view('help/operator', 'help.operator')->name('help.operator');
