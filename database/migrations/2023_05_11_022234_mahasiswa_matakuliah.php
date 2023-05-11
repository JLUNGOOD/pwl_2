<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('mahasiswa_id')->nullable();
            $table->unsignedBigInteger('matkul_id')->nullable();
            $table->String('nilai')->nullable();
            $table->timestamps();
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('matkul_id')->references('id')->on('matkul');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
};
