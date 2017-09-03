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
    return view('welcome');
});
Route::get('/home', 'HomeController@dashboard')->name('home');

/*
|--------------------------------------------------------------------------
| Logging In/Out Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| Patient
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'patient', 'as' => 'patient.'], function ()
{
    Route::get('', 'PatientController@index')->name('index');
    Route::get('create', 'PatientController@create')->name('create');
    Route::post('', 'PatientController@store')->name('store');
    Route::get('{patient}', 'PatientController@show')->name('show');
    Route::get('{patient}/edit', 'PatientController@edit')->name('edit');
    Route::put('{patient}', 'PatientController@update')->name('update');
    Route::delete('{patient}', 'PatientController@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Doctor
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'doctor', 'as' => 'doctor.'], function ()
{
    Route::get('', 'DoctorController@index')->name('index');
    Route::get('create', 'DoctorController@create')->name('create');
    Route::post('', 'DoctorController@store')->name('store');
    Route::get('{doctor}', 'DoctorController@show')->name('show');
    Route::get('{doctor}/edit', 'DoctorController@edit')->name('edit');
    Route::put('{doctor}', 'DoctorController@update')->name('update');
    Route::delete('{doctor}', 'DoctorController@destroy')->name('destroy');
});