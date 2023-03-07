<?php

use App\Http\Controllers\SitemapController;
use App\Http\Controllers\UserController;
use Carbon\Carbon;
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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/{slug}', [UserController::class, 'show'])->name('products.show');
});

Route::get('vc', [SitemapController::class, 'index'])->name('sitemap');
Route::get('asd', [SitemapController::class, 'test']);
Route::get('a', function () {
    dd(Carbon::parse('2019-07-23 14:51'));
});
