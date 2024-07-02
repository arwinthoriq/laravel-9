<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransaksiController;
  
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
});
  
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['role:Admin']], function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
    });
    //Route::group(['middleware' => ['role:Customer']], function () {
        //Route::resource('products', ProductController::class); 
       // Route::get('/products/show/{id}', [ProductController::class, 'idpesan'])->name('products.show');
        Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::get('/products/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/products/edit', [ProductController::class, 'edit'])->name('products.edit');
    //});

    
    Route::get('/transaksi/create/{id}', [TransaksiController::class, 'create'])->name('transaksi.create');
   // Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.store');
    Route::post('/transaksi/create', [TransaksiController::class, 'store'])->name('transaksi.store');

});