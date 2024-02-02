<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SparepartController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/sewa-rental', [PageController::class, 'sewa'])->name('sewa');
Route::post('/sewa-rental', [PageController::class, 'sewaReq'])->name('sewa.send');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'send'])->name('contact.send');
Route::get('/search', [PageController::class, 'search'])->name('search');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms-of-service', [PageController::class, 'tos'])->name('tos');


Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/brand/{slug}', [ProductController::class, 'brand'])->name('product.brand');
Route::get('/product/category/{slug}', [ProductController::class, 'category'])->name('product.category');
Route::get('/product/model/{slug}', [ProductController::class, 'model'])->name('product.model');
Route::get('/product/type/{slug}', [ProductController::class, 'type'])->name('product.type');

Route::group(['prefix' => 'bengkel'], function () {
    Voyager::routes();
});
