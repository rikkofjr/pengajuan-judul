<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_judul', function (Blueprint $table) {
            $table->bigIncrements('id_judul');
            $table->text('judul');
            $table->text('latar_belakang');
            $table->string('jenis_penelitian');
            $table->string('dp_1');
            $table->string('dp_2');
            $table->string('user_judul');
            $table->string('st_judul');
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
        Schema::dropIfExists('tb_judul');
    }
}
