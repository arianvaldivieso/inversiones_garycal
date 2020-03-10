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


Route::get('/admin', function () {

    if (!Auth::user()) {
        return redirect('login');
    }else{
        return view('admin');
    }
});


Route::get('login',function(){
    return view('auth.login');
});

Route::post('autenthicate','AuthController@autenthicate');


Route::middleware(['authenticate'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', 'AdminController@index');

        Route::prefix('propiedades')->group(function () {
            Route::get('/', 'PropertiesController@index');
            Route::get('/crear', 'PropertiesController@create');
            Route::get('/{id}', 'PropertiesController@edit');
            Route::post('/{id}', 'PropertiesController@update');
        });

        Route::prefix('caracteristicas')->group(function() {
            Route::get('/','FeatureController@index');
        });


        Route::prefix('files')->group(function () {
            Route::post('upload', 'UploadsController@upload');
            Route::post('delete', 'UploadsController@delete');
        });

    });
});





Route::get('/','ClientController@index');
Route::get('/quienes-somos','ClientController@about');

Route::prefix('propiedades')->group(function(){
    Route::get('/','ClientController@properties');
    Route::get('/{id}','ClientController@showProperty');
});



