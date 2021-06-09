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

Route::get('/','Admin\AdminCtrl');


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

Route::get('/dosen/review-proposal/{id}' ,'Dospem\DsnCtrl@review_proposal');
Route::post('/dosen/review-proposal/act' ,'Dospem\DsnCtrl@review_proposal_act');





/*
=========================== 
		Mahasiswa
===========================
*/
Route::get('/dashboard/mahasiswa' ,'Mahasiswa\MhsCtrl');

// daftar usulan
Route::get('/mahasiswa/daftar-usulan' ,'Mahasiswa\DaftarUsCtrl');

