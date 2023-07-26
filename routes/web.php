<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/product/{id}',[ProductController::class,'show'])->name('product.show');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {  return view('dashboard'); })->name('dashboard');

Route::resource('/product',ProductController::class);

Route::delete('/cart/{id}',[HomeController::class,'delete_cart'])->name('cart.destroy');
Route::get('/cash_on_delivry',[HomeController::class,'cash_on_delivry'])->name('cash_on_delivry');
Route::post('/cash_on_delivry_pass',[HomeController::class,'cash_on_delivry_pass'])->name('cash_on_delivry_pass');
Route::get('/view_category',[AdminController::class,'view_category'])->name('view.category');
Route::post('/add_category',[AdminController::class,'add_category'])->name('add.category');
Route::delete('/delete_category/{id}',[AdminController::class,'delete_category'])->name('delete.category');
Route::get('/orders',[AdminController::class,'orders'])->name('orders');

Route::get('/admin/home',[HomeController::class,'admin'])->name('admin.home');
Route::get('/admin/create',[HomeController::class,'create'])->name('admin.create');
Route::get('/cart',[HomeController::class,'cart'])->name('cart');

Route::post('/cart/{id?}',[HomeController::class,'cart_add'])->name('cart.add');

Route::post('/contact',[HomeController::class,'contact_store'])->name('contact.store');

});


Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/blog_list',[HomeController::class,'blog_list'])->name('blog_list');

Route::get('/contact',[HomeController::class,'contact'])->name('contact');

Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/testimonial',[HomeController::class,'testimonial'])->name('testimonial');

Route::get('/product_all',[HomeController::class,'allProducts'])->name('product.all');
