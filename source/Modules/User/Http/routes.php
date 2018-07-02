<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\User\Http\Controllers'], function()
{
    Route::resource('user/setting', 'SettingController');

    Route::get('/user/setting/{id}/edit/password', [
        'as' => 'setting.edit_password',
        'uses' => 'SettingController@editPassword'
    ]);

    Route::post('/user/setting/update_password', [
        'as' => 'setting.update_password',
        'uses' => 'SettingController@updatePassword'
    ]);

    Route::get('/user/cari', [
        'as' => 'user.cari',
        'uses' => 'UserController@cariStaff'
    ]);

    //Route::resource('user', 'UserController');

    Route::get('/user', [
        'as' => 'user.index',
        'uses' => 'UserController@showAllStaff'
    ]);

    Route::get('/user/create', [
        'as' => 'user.create',
        'uses' => 'UserController@createNewStaff'
    ]);

    Route::post('/user', [
        'as' => 'user.store',
        'uses' => 'UserController@saveNewStaff'
    ]);

    Route::get('/user/{id}', [
        'as' => 'user.show',
        'uses' => 'UserController@showDetailStaff'
    ]);

    Route::get('/user/{id}/edit', [
        'as' => 'user.edit',
        'uses' => 'UserController@editStaff'
    ]);

    Route::patch('/user/{id}', [
        'as' => 'user.update',
        'uses' => 'UserController@updateStaff'
    ]);

    Route::delete('/user/{id}', [
        'as' => 'user.delete',
        'uses' => 'UserController@deleteStaff'
    ]);

    //Route::resource('jabatan', 'JabatanController');

    Route::get('/jabatan/create', [
        'as' => 'jabatan.create',
        'uses' => 'JabatanController@createNewJabatan'
    ]);

    Route::post('/jabatan', [
        'as' => 'jabatan.store',
        'uses' => 'JabatanController@saveNewJabatan'
    ]);

    Route::get('/jabatan/{id}/edit', [
        'as' => 'jabatan.edit',
        'uses' => 'JabatanController@editJabatan'
    ]);

    Route::patch('/jabatan/{id}', [
        'as' => 'jabatan.update',
        'uses' => 'JabatanController@updateJabatan'
    ]);
});
