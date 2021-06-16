<?php

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

Route::get('/','FronCtrl');


/*
=========================== 
		Login User
===========================
*/
Route::get('/login/user' ,'Auth\AdminLogin');

Route::post('/LoginValidate','Auth\AdminLogin@loginCheck');
Route::get('/logout/user' ,'Auth\AdminLogin@logout');
// Route::get('/pengaturan/user' ,'Auth\AdminLogin@logout');
// daftar mahasiswa
Route::get('/daftar/mahasiswa' ,'Auth\AdminLogin@daftar_siswa');
Route::post('/daftar/mahasiswa/act' ,'Auth\AdminLogin@daftar_siswa_act');

/*
=========================== 
		Admin
===========================
*/
Route::get('/dashboard/admin' ,'Admin\AdminCtrl');


// publikasi data
Route::get('/admin/data-publikasi' ,'Admin\PubCtrl');
Route::get('/admin/publikasi/edit/{id}' ,'Admin\PubCtrl@publikasi_edit');
Route::post('/admin/publikasi/update' ,'Admin\PubCtrl@publikasi_update');
Route::get('/admin/publikasi/delete/{id}' ,'Admin\PubCtrl@publikasi_delete');

/*
=========================== 
		Review File
===========================
*/

//jadwal kegiatan berkas
Route::get('/upload/berkas/{id}','AjaxCtrl@viewfile_pdf');



// start prodi & jurusan
// jurusan
Route::get('/admin/daftar-jurusan' ,'Admin\ProdiCtrl@jurusan');

Route::post('/admin/daftar-jurusan/act' ,'Admin\ProdiCtrl@jurusan_act');
Route::get('/admin/daftar-jurusan/edit/{id}' ,'Admin\ProdiCtrl@jurusan_edit');
Route::post('/admin/daftar-jurusan/update' ,'Admin\ProdiCtrl@jurusan_update');
Route::get('/admin/daftar-jurusan/delete/{id}' ,'Admin\ProdiCtrl@jurusan_delete');

// prodi
Route::get('/admin/daftar-prodi' ,'Admin\ProdiCtrl@prodi');

Route::post('/admin/daftar-prodi/act' ,'Admin\ProdiCtrl@prodi_act');
Route::get('/admin/daftar-prodi/edit/{id}' ,'Admin\ProdiCtrl@prodi_edit');
Route::post('/admin/daftar-prodi/update' ,'Admin\ProdiCtrl@prodi_update');
Route::get('/admin/daftar-prodi/delete/{id}' ,'Admin\ProdiCtrl@prodi_delete');





// ----------------------------
// data pengusul
// data dosen

Route::get('/admin/pengguna/dosen' ,'Admin\PenggunaCtrl@dosen');

Route::get('/admin/pengguna/dosen/add' ,'Admin\PenggunaCtrl@dosen_add');
Route::post('/admin/pengguna/dosen/act' ,'Admin\PenggunaCtrl@dosen_act');
Route::get('/admin/pengguna/dosen/edit/{id}' ,'Admin\PenggunaCtrl@dosen_edit');
Route::post('/admin/pengguna/dosen/update' ,'Admin\PenggunaCtrl@dosen_update');
Route::get('/admin/pengguna/dosen/delete/{id}' ,'Admin\PenggunaCtrl@dosen_delete');





// data mahasiswa

Route::get('/admin/pengguna/mahasiswa' ,'Admin\PenggunaCtrl@mahasiswa');

Route::get('/admin/pengguna/mahasiswa/add' ,'Admin\PenggunaCtrl@mahasiswa_add');
Route::post('/admin/pengguna/mahasiswa/act' ,'Admin\PenggunaCtrl@mahasiswa_act');
Route::get('/admin/pengguna/mahasiswa/edit/{id}' ,'Admin\PenggunaCtrl@mahasiswa_edit');
Route::post('/admin/pengguna/mahasiswa/update' ,'Admin\PenggunaCtrl@mahasiswa_update');
Route::get('/admin/pengguna/mahasiswa/delete/{id}' ,'Admin\PenggunaCtrl@mahasiswa_delete');



// -----------------------


/*
=========================== 
		Dosen
===========================
*/ 
Route::get('/dashboard/dosen' ,'Dospem\DsnCtrl');

// publikasi data
Route::get('/dosen/data-publikasi' ,'Dospem\DsnPubCtrl');
Route::get('/dosen/publikasi/add' ,'Dospem\DsnPubCtrl@publikasi_add');
Route::post('/dosen/publikasi/act' ,'Dospem\DsnPubCtrl@publikasi_act');

Route::get('/dosen/publikasi/edit/{id}' ,'Dospem\DsnPubCtrl@publikasi_edit');
Route::post('/dosen/publikasi/update' ,'Dospem\DsnPubCtrl@publikasi_update');
Route::get('/dosen/publikasi/delete/{id}' ,'Dospem\DsnPubCtrl@publikasi_delete');




/*
=========================== 
		Mahasiswa
===========================
*/
Route::get('/dashboard/mahasiswa' ,'Mahasiswa\MhsCtrl');

// publikasi data
Route::get('/mahasiswa/data-publikasi' ,'Mahasiswa\MhsPubCtrl');
Route::get('/mahasiswa/publikasi/add' ,'Mahasiswa\MhsPubCtrl@publikasi_add');
Route::post('/mahasiswa/publikasi/act' ,'Mahasiswa\MhsPubCtrl@publikasi_act');

Route::get('/mahasiswa/publikasi/edit/{id}' ,'Mahasiswa\MhsPubCtrl@publikasi_edit');
Route::post('/mahasiswa/publikasi/update' ,'Mahasiswa\MhsPubCtrl@publikasi_update');
Route::get('/mahasiswa/publikasi/delete/{id}' ,'Mahasiswa\MhsPubCtrl@publikasi_delete');

Route::get('/mahasiswa/publikasi/ulang/{id}' ,'Mahasiswa\MhsPubCtrl@publikasi_ulang');
Route::post('/mahasiswa/publikasi/ulang/update{id}' ,'Mahasiswa\MhsPubCtrl@publikasi_ulang_update');


// pengatuaran profile mahaiswa
Route::get('/mahasiswa/profile' ,'Mahasiswa\MhsCtrl@profile');
Route::get('/mahasiswa/profile/edit' ,'Mahasiswa\MhsCtrl@profile_edit');
Route::post('/mahasiswa/profile/update' ,'Mahasiswa\MhsCtrl@profile_update');

// profile admin
Route::get('/admin/profile' ,'Admin\AdminCtrl@profile');
Route::get('/admin/profile/edit' ,'Admin\AdminCtrl@profile_edit');
Route::post('/admin/profile/update' ,'Admin\AdminCtrl@profile_update');

// profile dosen
Route::get('/dosen/profile' ,'Dospem\DsnCtrl@profile');
Route::get('/dosen/profile/edit' ,'Dospem\DsnCtrl@profile_edit');
Route::post('/dosen/profile/update' ,'Dospem\DsnCtrl@profile_update');



/* =========================== 
		Front
=========================== */

// publikasi dosen

Route::get('/publikasi-ilmiah/dosen' ,'FrontCtrl@publikasi_dosen');


// publikasi mahasiswa
Route::get('/publikasi-ilmiah/mahasiswa' ,'FrontCtrl@publikasi_mahasiswa');
