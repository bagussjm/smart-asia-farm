<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landmark', function (Blueprint $table) {
            $table->id();
            $table->string('nama_landmark',255);
            $table->text('deskripsi_landmark')->nullable();
            $table->text('info_landmark')->nullable();
            $table->text('profil_landmark')->nullable();
            $table->text('gambar_landmark')->nullable();
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
        Schema::dropIfExists('landmarks');
    }
}
