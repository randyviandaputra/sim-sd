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
            $table->decimal('nilai_tugas');
            $table->decimal('nilai_absensi');
            $table->decimal('nilai_uts');
            $table->decimal('nilai_uas');
            $table->decimal('nilai_rata_rata');
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
