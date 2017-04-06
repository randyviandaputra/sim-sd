<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_nilais', function (Blueprint $table) {
            $table->increments('id_nilai');
            $table->integer('id_guru');
            $table->string('no_induk_siswa');
            $table->float('nilai_tugas');
            $table->float('nilai_absensi');
            $table->float('nilai_uts');
            $table->float('nilai_uas');
            $table->float('nilai_rata_rata');
            $table->integer('semester');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaksi_nilais');
    }
}
