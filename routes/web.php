<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\DescubreEuskadiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AdminController;
>>>>>>> Ekaitz

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
    return view('index');
});

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
=======
Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [LogoutController::class,'perform']);
 });
Route::resource('home', HomeController::class)->only('index');
Route::resource('busqueda', PlanesController::class, ['names' => ['index' => '', 'show' => 'plan']]);
Route::resource('descubre-euskadi', DescubreEuskadiController::class)->only('index');
Route::resource('user', UserController::class)->only(['index', 'show']);
Route::resource('admin', AdminController::class)->only('index');
>>>>>>> Ekaitz

require __DIR__.'/auth.php';
