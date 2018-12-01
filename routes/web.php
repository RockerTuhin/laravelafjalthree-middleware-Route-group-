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

Route::get('/', function () {
    return Redirect()->route('login');
});

// Auth::routes();
Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'],function(){

	Route::get('/inbox', function () {
    echo "inbox";
	})->name('inbox')->middleware('verified');

	Route::get('/calendar', function () {
	    echo "calendar";
	})->name('calendar')->middleware('verified');

	Route::get('/typography', function () {
	    echo "typography";
	})->name('typography');
	
});


Route::get('/home', 'HomeController@index')->name('home');
