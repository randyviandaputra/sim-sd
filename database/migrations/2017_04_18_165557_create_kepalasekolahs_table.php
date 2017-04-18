<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKepalasekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepalasekolahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_induk');
            $table->string('nama_kepala');
            $table->integer('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kepalasekolahs');
    }
}
