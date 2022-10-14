<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/order', function () {
    return new App\Mail\OrderShipped();
})->name('order');

Route::get('/send-order', function () {
    Mail::to('test@my.com')->send(new App\Mail\OrderShipped());
    return "<h2>A message has been sent to MailTrap</h2>";
})->name('send.order');

Route::get('/upload/{id}', App\Http\Livewire\UploadPictures::class)->name('upload-pictures');
route::get('product-details/{id}',App\Http\Livewire\ShowProduct::class)->name('product.details');
route::get('shopping-cart', App\Http\Livewire\ShoppingCart::class)->name('shopping.cart');

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
