<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWahanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wahana', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wahana',255);
            $table->text('deskripsi_wahana')->nullable();
            $table->text('profil_wahana')->nullable();
            $table->text('gambar_wahana')->nullable();
            $table->integer('tarif_tiket')->default(0);
            $table->string('masa_aktif')->nullable();
            $table->text('syarat_ketentuan')->nullable();
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
        Schema::dropIfExists('wahanas');
    }
}
