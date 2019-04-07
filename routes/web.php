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

// app/Http/routes.php

Route::group([

    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]

], function(){

    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    
	Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();
    
});

/*

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    
	Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();
    
});

*/

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/





Route::get('/home', 'HomeController@index')->name('home');
