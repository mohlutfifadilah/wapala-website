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
        Schema::create('oprec', function (Blueprint $table) {
            $table->id();
            $table->text('foto')->nullable();
            $table->string('nama')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempatTglLahir')->nullable();
            $table->string('nim')->nullable();
            $table->string('prodi')->nullable();
            $table->string('agama')->nullable();
            $table->string('nohp')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat_rumah')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('nama_orangtua')->nullable();
            $table->string('nohp_orangtua')->nullable();
            $table->string('motivasi')->nullable();
            $table->string('pengalaman_organisasi')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('riwayat_penyakit')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('oprec');
    }
};
