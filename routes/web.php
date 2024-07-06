<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperController;
use App\Http\Middleware\Admin;

route::get('/', [HomeController::class, 'home']);

route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

route::get('/myorders', [HomeController::class, 'myorders'])->middleware(['auth', 'verified']);

route::get('/support', [HomeController::class, 'support'])->middleware(['auth', 'verified']);

route::get('allproducts', [HomeController::class, 'allproducts']);

route::get('allaccessories', [HomeController::class, 'allaccessories']);

route::get('allgcards', [HomeController::class, 'allgcards']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(HomeController::class)->group(function(){

    Route::get('stripe/{value}', 'stripe');

    Route::post('stripe/{value}', 'stripePost')->name('stripe.post');

});

require __DIR__.'/auth.php';

route::get('admin/dashboard', [HomeController::class, 'index'])->
    middleware(['auth', 'admin']);

route::get('super/dashboard', [HomeController::class, 'index_super'])->
    middleware(['auth', 'super']);;

route::get('view_category', [AdminController::class, 'view_category'])->
    middleware(['auth', 'admin']);

route::get('view_category_super', [SuperController::class, 'view_category'])->
    middleware(['auth', 'super']);

route::post('add_category', [AdminController::class, 'add_category'])->
    middleware(['auth', 'admin']);

route::post('add_category_super', [SuperController::class, 'add_category'])->
    middleware(['auth', 'super']);

route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->
    middleware(['auth', 'admin']);

route::get('delete_category_super/{id}', [SuperController::class, 'delete_category'])->
    middleware(['auth', 'super']);

route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->
    middleware(['auth', 'admin']);

route::get('edit_category_super/{id}', [SuperController::class, 'edit_category'])->
    middleware(['auth', 'super']);

route::post('update_category/{id}', [AdminController::class, 'update_category'])->
    middleware(['auth', 'admin']);

route::post('update_category_super/{id}', [SuperController::class, 'update_category'])->
    middleware(['auth', 'super']);

route::get('add_product', [AdminController::class, 'add_product'])->
    middleware(['auth', 'admin']);

route::get('add_product_super', [SuperController::class, 'add_product'])->
    middleware(['auth', 'super']);

route::get('add_product_commercial', [AdminController::class, 'add_product'])->
    middleware(['auth', 'commercial']);

route::post('upload_product', [AdminController::class, 'upload_product'])->
    middleware(['auth', 'admin']);

route::post('upload_product_super', [SuperController::class, 'upload_product'])->
    middleware(['auth', 'super']);

route::post('upload_product_commercial', [AdminController::class, 'upload_product'])->
    middleware(['auth', 'commercial']);

route::get('view_product', [AdminController::class, 'view_product'])->
    middleware(['auth', 'admin']);

route::get('view_product_super', [SuperController::class, 'view_product'])->
    middleware(['auth', 'super']);

route::get('view_product_commercial', [AdminController::class, 'view_product_commercial'])->
    middleware(['auth', 'commercial']);
    
route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->
    middleware(['auth', 'admin']);

route::get('delete_product_super/{id}', [SuperController::class, 'delete_product'])->
    middleware(['auth', 'super']);
    
route::get('update_product/{id}', [AdminController::class, 'update_product'])->
    middleware(['auth', 'admin']);

route::get('update_product_super/{id}', [SuperController::class, 'update_product'])->
    middleware(['auth', 'super']);

route::get('update_product_commercial/{id}', [AdminController::class, 'update_product_commercial'])->
    middleware(['auth', 'commercial']);

route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->
    middleware(['auth', 'admin']);

route::post('edit_product_super/{id}', [SuperController::class, 'edit_product'])->
    middleware(['auth', 'super']);

route::get('product_search', [AdminController::class, 'product_search'])->
    middleware(['auth', 'admin']);

route::get('product_search_super', [SuperController::class, 'product_search'])->
    middleware(['auth', 'super']);

route::get('add_accessory', [AdminController::class, 'add_accessory'])->
    middleware(['auth', 'admin']);

route::post('upload_accessory', [AdminController::class, 'upload_accessory'])->
    middleware(['auth', 'admin']);

route::get('view_accessory', [AdminController::class, 'view_accessory'])->
    middleware(['auth', 'admin']);

route::get('update_accessory/{id}', [AdminController::class, 'update_accessory'])->
    middleware(['auth', 'admin']);

route::post('edit_accessory/{id}', [AdminController::class, 'edit_accessory'])->
    middleware(['auth', 'admin']);

route::get('delete_accessory/{id}', [AdminController::class, 'delete_accessory'])->
    middleware(['auth', 'admin']);

route::get('add_gcard', [AdminController::class, 'add_gcard'])->
    middleware(['auth', 'admin']);

route::post('upload_gcard', [AdminController::class, 'upload_gcard'])->
    middleware(['auth', 'admin']);

route::get('view_gcard', [AdminController::class, 'view_gcard'])->
    middleware(['auth', 'admin']);

route::get('update_gcard/{id}', [AdminController::class, 'update_gcard'])->
    middleware(['auth', 'admin']);

route::post('edit_gcard/{id}', [AdminController::class, 'edit_gcard'])->
    middleware(['auth', 'admin']);

route::get('delete_gcard/{id}', [AdminController::class, 'delete_gcard'])->
    middleware(['auth', 'admin']);

route::get('product_details/{id}',[HomeController::class, 'product_details']);

route::post('add_cart/{id}',[HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);

route::get('add_accessory/{id}',[HomeController::class, 'add_accessory'])->middleware(['auth', 'verified']);

route::get('mycart',[HomeController::class, 'mycart'])->middleware(['auth', 'verified']);

route::get('remove_cart/{id}', [HomeController::class, 'remove_cart'])->middleware(['auth', 'verified']);

route::get('remove_accessory/{id}', [HomeController::class, 'remove_accessory'])->middleware(['auth', 'verified']);

route::post('add_gcard_cart', [HomeController::class, 'add_gcard_cart'])->middleware(['auth', 'verified']);

route::get('remove_gcard/{id}', [HomeController::class, 'remove_gcard'])->middleware(['auth', 'verified']);

route::get('view_orders', [AdminController::class, 'view_order'])
    ->middleware(['auth', 'admin']);

route::get('view_orders_super', [SuperController::class, 'view_order'])
    ->middleware(['auth', 'super']);

route::get('view_orders_commercial', [AdminController::class, 'view_order_commercial'])
    ->middleware(['auth', 'commercial']);

route::get('view_orders_delivery', [AdminController::class, 'view_order_delivery'])
    ->middleware(['auth', 'delivery']);

route::get('ready/{id}', [AdminController::class, 'ready'])
    ->middleware(['auth', 'admin']);

route::get('on_delivery/{id}', [AdminController::class, 'on_delivery'])
    ->middleware(['auth', 'admin']);

route::get('on_delivery_super/{id}', [SuperController::class, 'on_delivery'])
    ->middleware(['auth', 'super']);

route::get('on_delivery_commercial/{id}', [AdminController::class, 'on_delivery_commercial'])
    ->middleware(['auth', 'commercial']);

route::get('delivered/{id}', [AdminController::class, 'delivered'])
    ->middleware(['auth', 'admin']);

route::get('delivered_super/{id}', [SuperController::class, 'delivered'])
    ->middleware(['auth', 'super']);

route::get('delivered_delivery/{id}', [AdminController::class, 'delivered_delivery'])
    ->middleware(['auth', 'delivery']);

route::get('order_details/{id}', [AdminController::class, 'order_details'])
    ->middleware(['auth', 'admin']);

route::get('order_details_super/{id}', [SuperController::class, 'order_details'])
    ->middleware(['auth', 'super']);

route::get('order_details_commercial/{id}', [AdminController::class, 'order_details_commercial'])
    ->middleware(['auth', 'commercial']);

route::get('order_details_delivery/{id}', [AdminController::class, 'order_details_delivery'])
    ->middleware(['auth', 'delivery']);

route::get('view_employees', [AdminController::class, 'view_employees'])
    ->middleware(['auth', 'admin']);

route::get('view_employees_super', [SuperController::class, 'view_employees'])
    ->middleware(['auth', 'super']);

route::get('delete_employee/{id}', [AdminController::class, 'delete_employee'])->
    middleware(['auth', 'admin']);

route::get('delete_employee_super/{id}', [SuperController::class, 'delete_employee'])->
    middleware(['auth', 'super']);

route::get('admin_role_super/{id}', [SuperController::class, 'admin_role'])->
    middleware(['auth', 'super']);

route::get('commercial_role_super/{id}', [SuperController::class, 'commercial_role'])->
    middleware(['auth', 'super']);

route::get('delivery_role_super/{id}', [SuperController::class, 'delivery_role'])->
    middleware(['auth', 'super']);

route::get('commercial_role/{id}', [AdminController::class, 'commercial_role'])->
    middleware(['auth', 'admin']);

route::get('delivery_role/{id}', [AdminController::class, 'delivery_role'])->
    middleware(['auth', 'admin']);

route::get('commercial/dashboard', [HomeController::class, 'index_commercial'])->middleware(['auth', 'commercial']);

route::post('add_delivery/{id}', [AdminController::class, 'add_delivery'])->
    middleware(['auth', 'commercial']);

route::get('delivery/dashboard', [HomeController::class, 'index_delivery'])->
    middleware(['auth', 'delivery']);

route::post('confirm_order/{value}', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified']);

route::post('ticket',[HomeController::class, 'ticket'])->middleware(['auth', 'verified']);

route::get('bycategory/{category_name}',[HomeController::class, 'bycategory']);

route::get('byaccessory/{category_name}',[HomeController::class, 'byaccessory']);

route::get('bygcard/{category_name}',[HomeController::class, 'bygcard']);