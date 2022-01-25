<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\DescubreEuskadiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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
    return redirect('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('home', PlanesController::class, ['names' => ['show' => 'busqueda', 'edit' => 'plan']]);
Route::resource('descubre-euskadi', DescubreEuskadiController::class)->only(['index']);
Route::resource('user', UserController::class)->only(['index', 'show']);
Route::get('/admin/gestion-usuarios', [AdminController::class, 'adminUsuario']);
Route::get('/admin/gestion-comentarios', [AdminController::class, 'adminComent']);
/* Route::resource('admin', AdminController::class, ['names' => ['show' => 'busqueda', 'edit' => 'plan']]); */
Route::resource('admin', AdminController::class);
//Route::get('/admin', [AdminController::class, 'index']);




require __DIR__.'/auth.php';
