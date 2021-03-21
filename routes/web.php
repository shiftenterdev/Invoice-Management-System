<?php
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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('profile', \App\Http\Controllers\Admin\ProfileController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('clients', \App\Http\Controllers\Admin\ClientController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('payments', \App\Http\Controllers\Admin\PaymentController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('invoices', \App\Http\Controllers\Admin\InvoiceController::class);
    Route::get('invoices/{id}/generate-pdf', [\App\Http\Controllers\Admin\InvoiceController::class,'generatePDF'])->name('invoices.generate-pdf');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
});
Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/admin/invoice/preview', [\App\Http\Controllers\Admin\ProfileController::class,'previewInvoice']);
Route::get('/admin/invoice/mobile/preview/{id}',[ \App\Http\Controllers\Admin\InvoiceController::class,'mobilePreview']);
