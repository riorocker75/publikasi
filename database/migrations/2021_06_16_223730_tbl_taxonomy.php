<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblTaxonomy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('taxonomy')) {
            Schema::create('taxonomy', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('post_id');
                $table->text('jur_id')->nullable();
                $table->text('jenis')->nullable();
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
        Schema::dropIfExists('taxonomy');

    }
}
