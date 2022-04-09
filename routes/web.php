<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mycontroller;
use App\Http\Controllers\ProductController;

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

Route::get('/giaodien', function () {
    return view('giaodien');
});
Route::get('/sanpham', function () {
    return view('sanpham');
});

Route::get('/admin/sanpham', function () {
    return view('admin/sanpham');
});

Route::get('/chitietsanpham', function () {
    return view('chitietsanpham');
});



Route::get('/products', function () {
    return view('admin/products'); 
});
Route::get('admin/products', function () {
    return view('admin/products');
});
Route::get('/theloai', function () {
    return view('admin/theloai');
});
Route::get('/capnhat','App\Http\Controllers\mycontroller@XemSanPhamCN');
Route::get('/xemsp','App\Http\Controllers\mycontroller@XemSanPham');
Route::get('/xemspuser','App\Http\Controllers\mycontroller@XemSanPhamUser');
Route::get('/ctsanpham','App\Http\Controllers\mycontroller@XemSanPhamCT');

Route::post('/products/submit','App\Http\Controllers\mycontroller@LuuHang');
Route::post('/theloai/submit','App\Http\Controllers\mycontroller@LuuTheLoai');
Route::get('admin/chitiet/{MaSP}', [App\Http\Controllers\mycontroller::class, 'chitiet']);
Route::post('/binhluan/submit','App\Http\Controllers\mycontroller@LuuBinhLuan');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', [App\Http\Controllers\AdminCotroller::class, 'home']);
Route::post('/admin/giaodiencapnhat/update/{MaSP}', [App\Http\Controllers\mycontroller::class, 'update']);
Route::get('/admin/giaodiencapnhat/submit/{MaSP}', 'App\Http\Controllers\mycontroller@edit');
Route::post('/admin/giaodiencapnhat/delete/{MaSP}', [App\Http\Controllers\mycontroller::class, 'delete']);
Route::get('/admin',function(){
    return view ('admin/trangchu');
})->middleware('checkadmin::class');
Route::get('cart', [App\Http\Controllers\ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{MaSP}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');

Route::post('remove-from-cart', [productController::class, 'remove'])->name('remove.from.cart');

Route::get('/phimhanhdong','App\Http\Controllers\mycontroller@XemPhimHD');
Route::get('/phimtinhcam','App\Http\Controllers\mycontroller@XemPhimTC');
Route::get('/phimma','App\Http\Controllers\mycontroller@XemPhimMa');
Route::get('search', [productController::class, 'getSearch']);