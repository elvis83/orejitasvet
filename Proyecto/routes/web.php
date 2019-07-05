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
/*Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('/', ['uses' => 'HomeController@index']);
    Route::get('/home', 'HomeController@index')->name('home');


    Route::get('/users', 'Security\UserController@index')->name('users.index');
    Route::get('/users/create', 'Security\UserController@create')->name('users.create');
    Route::get('/users/{id}', 'Security\UserController@show')->name('users.show');
    Route::delete('/users/{id}', 'Security\UserController@destroy')->name('users.destroy');
    Route::get('/users/{id}/edit', 'Security\UserController@edit')->name('users.edit');
    Route::post('/users', 'Security\UserController@store')->name('users.store');
    Route::put('/users/{id}', 'Security\UserController@update')->name('users.update');
});*/

Route::get('/', function(){
    return view('welcome');
});

Route::get('home', function(){
    return view('home');
})->middleware('auth');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Auth::routes(['verify' => true]);

//BACKOFFICE
Route::group(['middleware' => ['auth'], 'as' => 'backoffice.'], function(){
	
    Route::get('admin','AdminController@show')->name('admin.show');

    Route::resource('user', 'UserController');    
    Route::get('user_import','UserController@import')
        ->name('user.import');
    Route::post('user_make_import', 'UserController@make_import')
        ->name('user.make_import');

    Route::get('client/{user}/schedule', 'ClientController@back_schedule')
        ->name('client.schedule');
    Route::get('client/{user}/appointments', 'ClientController@back_appointments')
        ->name('client.appointments');
    Route::get('client/{user}/invoices', 'ClientController@back_invoices')
        ->name('client.invoices');
    
    Route::resource('role', 'RoleController');
    Route::get('user/{user}/assign_role', 'UserController@assign_role')
        ->name('user.assign_role');
    Route::post('user/{user}/role_assignment', 'UserController@role_assignment')
        ->name('user.role_assignment');

    Route::resource('permission', 'PermissionController');
    Route::get('user/{user}/assign_permission', 'UserController@assign_permission')
        ->name('user.assign_permission');
    Route::post('user/{user}/permission_assignment', 'UserController@permission_assignment')
        ->name('user.permission_assignment');

    Route::resource('speciality', 'SpecialityController');
    Route::get('user/{user}/assign_speciality', 'UserController@assign_speciality')
        ->name('user.assign_speciality');
    Route::post('user/{user}/speciality_assignment', 'UserController@speciality_assignment')
        ->name('user.speciality_assignment');

    Route::resource('tipodocumento', 'TipoDocumentoController');

    Route::resource('persona', 'PersonaController');

});

Route::group(['middleware' => ['auth'], 'as' => 'frontoffice.'], function(){

    Route::get('profile', 'UserController@profile')
        ->name('user.profile');
    Route::get('profile/{user}/edit', 'UserController@edit')
        ->name('user.edit');
    Route::put('profile/{user}/update', 'UserController@update')
        ->name('user.update');
    Route::get('profile/edit_password', 'UserController@edit_password')
        ->name('user.edit_password');
    Route::put('profile/change_password', 'UserController@change_password')
        ->name('user.change_password');

    Route::get('client/schedule', 'ClientController@schedule')
        ->name('client.schedule');
    Route::get('client/appointments', 'ClientController@appointments')
        ->name('client.appointments');
    Route::get('client/prescriptions', 'ClientController@prescriptions')
        ->name('client.prescriptions');
    Route::get('client/invoices', 'ClientController@invoices')
        ->name('client.invoices');
});

Route::group(['as' => 'ajax.'], function(){

    Route::get('user_speciality', 'AjaxController@user_speciality')
        ->name('user_speciality');
});