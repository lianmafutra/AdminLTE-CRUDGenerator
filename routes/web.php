<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/', function () {
    if (Auth::user()) {
        return redirect('admin/crudku');
    } else {
        return redirect('/login');
    }
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin',], function () {

                Route::post('student/filepondUpload', 'StudentController@filepondUpload');
                Route::delete('student/filepondCancel', 'StudentController@filepondCancel');
Route::resource('student', 'StudentController');
//route_key_start 

    Route::group(['prefix' => 'crudku',], function () {
        Route::get('/', 'CrudGeneratorController@index');  
        Route::post('generate', 'CrudGeneratorController@generate')->name('crud.generate');     
    });

});