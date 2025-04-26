<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MoreDataController;
use App\Http\Controllers\SumController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/more-data', [MoreDataController::class, 'index'])->name('more-data');
Route::get('/another-data', [MoreDataController::class, 'another'])->name('another-data');

Route::post('/sum', [SumController::class, 'sum'])->name('store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin-login', [DashboardController::class, 'login'])->name('admin.login');

    Route::resource('blogs', BlogController::class);
    Route::get('/all-blogs', [BlogController::class, 'showAll'])->name('show.all');

});
