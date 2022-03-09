<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoLowongansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_lowongans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('instansi');
            $table->longText('jurusan');
            $table->longText('judul');
            $table->longText('isi');
            $table->longText('foto');
            $table->date('tenggat');
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
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
        Schema::dropIfExists('info_lowongans');
    }
}
