<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\admin\Auth\AuthenticatedSessionController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__ . '/auth.php';



// Admin Routes

Route::namespace('App\Http\Controllers\admin')->prefix('admin')->name('admin.')->group(function () {


    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        // Authentication Routes (Admin)
        Route::get('/login', 'AuthenticatedSessionController@create')->name('login');
        Route::post('/login', 'AuthenticatedSessionController@store')->name('admin_login');

        //Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    });
    Route::middleware('admin')->group(function () {
        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
      
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        
        
    });
    Route::post('/logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
});
// Route::get('/admin/login', 'App\Http\Controllers\admin\Auth\AuthenticatedSessionController@create')->name('login');
