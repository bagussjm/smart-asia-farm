<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->string('id',255);
            $table->string('nama_instansi',255)->nullable();
            $table->text('keterangan_instansi')->nullable();
            $table->text('alamat_instansi')->nullable();
            $table->text('lokasi_instansi')->nullable();
            $table->text('foto_profil_instansi')->nullable();
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
        Schema::dropIfExists('profil');
    }
}
