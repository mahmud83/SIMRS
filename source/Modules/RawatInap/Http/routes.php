<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\RawatInap\Http\Controllers'], function()
{
    Route::get('kamar', [
        'as' => 'ranap.kamar',
        'uses' => 'RawatInapController@indexKamar'
    ]);

    //Route::resource('ranap', 'RawatInapController');

    Route::get('/ranap', [
        'as' => 'ranap.index',
        'uses' => 'RawatInapController@showAllRawatInap'
    ]);

    Route::get('/ranap/create', [
        'as' => 'ranap.create',
        'uses' => 'RawatInapController@createNewRawatInap'
    ]);

    Route::post('/ranap', [
        'as' => 'ranap.store',
        'uses' => 'RawatInapController@saveNewRawatInap'
    ]);

    Route::get('/ranap/{id}', [
        'as' => 'ranap.show',
        'uses' => 'RawatInapController@showDetailRawatInap'
    ]);

    Route::get('/ranap/{id}/edit', [
        'as' => 'ranap.edit',
        'uses' => 'RawatInapController@editRawatInap'
    ]);

    Route::patch('/ranap/{id}', [
        'as' => 'ranap.update',
        'uses' => 'RawatInapController@updateRawatInap'
    ]);

    //Route::resource('ranap/{id}/perintah_dokter_dan_pengobatan', 'PerintahDokterDanPengobatanController');

    Route::get('/ranap/{id}/perintah_dokter_dan_pengobatan', [
        'as' => 'perintah_dokter_dan_pengobatan.index',
        'uses' => 'PerintahDokterDanPengobatanController@showAllPerintahDokterDanPengobatanPasien'
    ]);

    Route::get('ranap/{id}/perintah_dokter_dan_pengobatan/{perintah}/create', [
        'as' => 'perintah_dokter_dan_pengobatan.create',
        'uses' => 'PerintahDokterDanPengobatanController@createPerintahDokterDanPengobatanPasien'
    ]);

    Route::post('/ranap/{id}/perintah_dokter_dan_pengobatan', [
        'as' => 'perintah_dokter_dan_pengobatan.store',
        'uses' => 'PerintahDokterDanPengobatanController@savePerintahDokterDanPengobatanPasien'
    ]);

    Route::get('/ranap/{id}/perintah_dokter_dan_pengobatan/{perintah_dokter_dan_pengobatan}', [
        'as' => 'perintah_dokter_dan_pengobatan.show',
        'uses' => 'PerintahDokterDanPengobatanController@showDetailPerintahDokterDanPengobatanPasien'
    ]);

    Route::get('/ranap/{id}/perintah_dokter_dan_pengobatan/{perintah_dokter_dan_pengobatan}/edit', [
        'as' => 'perintah_dokter_dan_pengobatan.edit',
        'uses' => 'PerintahDokterDanPengobatanController@editPerintahDokterDanPengobatanPasien'
    ]);

    Route::patch('/ranap/{id}/perintah_dokter_dan_pengobatan/{perintah_dokter_dan_pengobatan}', [
        'as' => 'perintah_dokter_dan_pengobatan.update',
        'uses' => 'PerintahDokterDanPengobatanController@updatePerintahDokterDanPengobatanPasien'
    ]);

    //Route::resource('ranap/{id}/catatan_harian_perawatan', 'CatatanHarianPerawatanController');

    Route::get('ranap/{id}/catatan_harian_perawatan', [
        'as' => 'catatan_harian_perawatan.index',
        'uses' => 'CatatanHarianPerawatanController@showAllCatatanHarianDanPerawatan'
    ]);

    Route::get('ranap/{id}/catatan_harian_perawatan/create', [
        'as' => 'catatan_harian_perawatan.create',
        'uses' => 'CatatanHarianPerawatanController@createNewCatatanHarianDanPerawatan'
    ]);

    Route::post('ranap/{id}/catatan_harian_perawatan', [
        'as' => 'catatan_harian_perawatan.store',
        'uses' => 'CatatanHarianPerawatanController@storeCatatanHarianDanPerawatan'
    ]);

    Route::get('ranap/{id}/catatan_harian_perawatan/{catatan_harian_perawatan}/edit', [
        'as' => 'catatan_harian_perawatan.edit',
        'uses' => 'CatatanHarianPerawatanController@editCatatanHarianDanPerawatan'
    ]);

    Route::patch('ranap/{id}/catatan_harian_perawatan/{catatan_harian_perawatan}', [
        'as' => 'catatan_harian_perawatan.update',
        'uses' => 'CatatanHarianPerawatanController@updateCatatanHarianDanPerawatan'
    ]);

    Route::get('/ranap/kamar/{id}', [
        'as' => 'ranap.kamar.show',
        'uses' => 'RawatInapController@showKamar'
    ]);
});

Route::group(['middleware' => 'web'], function ()
{
    Route::get('ranap/pasien/cari', [
        'as' => 'ranap.pasien.cari',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@cariPasien'
    ]);

    Route::get('ranap/pasien/index', [
        'as' => 'ranap.pasien.index',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@showAllPasien'
    ]);

    Route::get('ranap/pasien/create', [
        'as' => 'ranap.pasien.create',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@createNewPasien'
    ]);

    Route::get('ranap/pasien/{id}', [
        'as' => 'ranap.pasien.show',
        'uses' => 'Modules\Pasien\Http\Controllers\PasienController@showDetailPasien'
    ]);
});
