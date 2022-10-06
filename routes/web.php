<?php

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
    return view('components.welcome');
})->name('home');

Route::get('/contact', function () {
    return view('components.contact-page');
})->name('contact');

Route::get('/about', function () {
    return view('components.about-page');
})->name('about');

Route::get('/upload/{id}', App\Http\Livewire\UploadPictures::class)->name('upload-pictures');
route::get('product-details/{id}',App\Http\Livewire\ShowProduct::class)->name('product.details');
route::get('shopping-cart',App\Http\Livewire\ShoppingCart::class)->name('shopping.cart');

// Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact-us');

Route::name('admin.')->group(
    function() {
        Route::get('/admin', 'App\Http\Controllers\Admin\DashboardController')->name('dashboard');

        Route::resource('admin/brands', 'App\Http\Controllers\Admin\BrandController');
        Route::resource('admin/categories', 'App\Http\Controllers\Admin\CategoryController');
        Route::resource('admin/users', 'App\Http\Controllers\Admin\UserController');
        Route::resource('admin/products', 'App\Http\Controllers\Admin\ProductController');
    }
);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
