<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/my_orders', [HomeController::class, 'my_orders'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin']);

Route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);

Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);

Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);

Route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);

Route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'admin']);

Route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth', 'admin']);

Route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth', 'admin']);

Route::get('view_messages', [AdminController::class, 'view_messages'])->middleware(['auth', 'admin']);

Route::get('view_message/{id}', [AdminController::class, 'view_message'])->middleware(['auth', 'admin']);

Route::get('delete_message/{id}', [AdminController::class, 'delete_message'])->middleware(['auth', 'admin']);

Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);

Route::get('update_product/{slug}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin']);

Route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin']);

Route::get('product_search', [AdminController::class, 'product_search'])->middleware(['auth', 'admin']);

Route::get('order_search', [AdminController::class, 'order_search'])->middleware(['auth', 'admin']);

Route::get('message_search', [AdminController::class, 'message_search'])->middleware(['auth', 'admin']);

Route::get('product_details/{id}', [HomeController::class, 'product_details']);

Route::get('add_cart/{id}', [HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);

Route::get('my_cart', [HomeController::class, 'my_cart'])->middleware(['auth', 'verified']);

Route::get('delete_cart/{id}', [HomeController::class, 'delete_cart'])->middleware(['auth', 'verified']);

Route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified']);

Route::get('shop', [HomeController::class, 'shop']);

Route::get('why', [HomeController::class, 'why']);

Route::get('testimonial', [HomeController::class, 'testimonial']);

Route::get('contact', [HomeController::class, 'contact']);

Route::post('send_message', [HomeController::class, 'send_message'])->middleware(['auth', 'verified']);

Route::controller(HomeController::class)->group(function(){
    Route::get('stripe/{value}', 'stripe');
    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');
});

Route::get('view_orders', [AdminController::class, 'view_orders'])->middleware(['auth', 'admin']);

Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->middleware(['auth', 'admin']);

Route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware(['auth', 'admin']);

Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->middleware(['auth', 'admin']);

Route::get('search_product', [HomeController::class, 'search_product'])->middleware(['auth', 'verified']);

