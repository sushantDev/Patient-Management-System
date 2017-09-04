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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

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
    Route::post('/datatable', 'patientController@datatable')->name('datatable');
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
    Route::post('/datatable', 'DoctorController@datatable')->name('datatable');
    Route::get('{doctor}', 'DoctorController@show')->name('show');
    Route::get('{doctor}/edit', 'DoctorController@edit')->name('edit');
    Route::put('{doctor}', 'DoctorController@update')->name('update');
    Route::delete('{doctor}', 'DoctorController@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Staff
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'staff', 'as' => 'staff.'], function ()
{
    Route::get('', 'StaffController@index')->name('index');
    Route::get('create', 'StaffController@create')->name('create');
    Route::post('', 'StaffController@store')->name('store');
    Route::post('/datatable', 'StaffController@datatable')->name('datatable');
    Route::get('{staff}', 'StaffController@show')->name('show');
    Route::get('{staff}/edit', 'StaffController@edit')->name('edit');
    Route::put('{staff}', 'StaffController@update')->name('update');
    Route::delete('{staff}', 'StaffController@destroy')->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Appointment
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'appointment', 'as' => 'appointment.'], function ()
{
    Route::get('', 'AppointmentController@index')->name('index');
    Route::get('create', 'AppointmentController@create')->name('create');
    Route::post('', 'AppointmentController@store')->name('store');
    Route::post('/datatable', 'AppointmentController@datatable')->name('datatable');
    Route::get('{appointment}', 'AppointmentController@show')->name('show');
    Route::get('{appointment}/edit', 'AppointmentController@edit')->name('edit');
    Route::put('{appointment}', 'AppointmentController@update')->name('update');
    Route::delete('{appointment}', 'AppointmentController@destroy')->name('destroy');
});