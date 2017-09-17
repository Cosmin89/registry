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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/worker', 'WorkerController@index')->name('worker');
    Route::post('/worker/logworkhours', 'WorkerController@logWorkHours')->name('logworkhours');
    Route::post('/worker/logfreedays', 'WorkerController@logFreeDays')->name('logfreedays');
});

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('profile/{user}', 'AdminController@profile')->name('profile');
    });
});



