<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPublikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('publikasi')) {
           Schema::create('publikasi', function (Blueprint $table) {
               $table->bigIncrements('id');
               $table->text('judul');
               $table->text('slug')->nullable();
               $table->text('deskripsi')->nullable();
               $table->date('tgl')->nullable();
               $table->text('id_pengguna')->nullable();
               $table->text('penulis')->nullable();
               $table->text('jurusan')->nullable();
               $table->text('kata_kunci')->nullable();
               $table->text('kk_slug')->nullable();
               $table->text('kategori')->nullable();
               $table->text('berkas')->nullable();
               $table->text('link')->nullable();
               $table->text('status_berkas')->nullable()->comment('1=publish', '2=private');
               $table->text('status')->nullable();
               $table->text('status_post')->nullable()->comment('1=review, 2=publish');
               $table->text('status_user')->nullable()->comment('dosen =1', 'mahasiswa =2');
           }); 
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publikasi');
    }
}
