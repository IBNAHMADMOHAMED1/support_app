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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


// Route::get('/dashboard','App\\Http\\Controllers\\user\ServiceController@index')->name('dashboard');
Route::resource('/dashboard','App\\Http\\Controllers\\user\\ServiceController')->only(['index','show'])->middleware(['auth']);
// Route::resource('/dashboard/{id}', 'App\\Http\\Controllers\\user\\TicketController')->middleware(['auth']);
Route::resource('/dashboard/ticket', 'App\\Http\\Controllers\\user\\TicketController')->middleware(['auth']);
Route::get('myticket', 'App\\Http\\Controllers\\user\\TicketController@index')->middleware(['auth']);

// User Routes





require __DIR__ . '/auth.php';



// Admin Routes

Route::namespace('App\Http\Controllers\admin')->prefix('admin')->name('admin.')->group(function () {


    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        // Authentication Routes (Admin)
        Route::get('/login', 'AuthenticatedSessionController@create')->name('login');
        Route::post('/login', 'AuthenticatedSessionController@store')->name('admin_login');
       

    });
    Route::middleware('admin')->group(function () {
        // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
      
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        Route::resource('/services', 'ServiceController');
        Route::resource('/Statuses', 'StatusController');
        
        
        
    });
    Route::post('/logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
});

