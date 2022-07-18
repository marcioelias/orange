<?php

use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function() {
    Route::View('/dashboard', 'dashboard')->name('dashboard');
    Route::View('/profile', 'profile')->name('profile');


    /* test routes */
    Route::get('/teste', [TesteController::class, 'teste']);
});


require __DIR__.'/auth.php';
