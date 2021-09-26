<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket', function (Blueprint $table) {
            $table->string('id',255);
            $table->date('tanggal_masuk');
            $table->time('jam_masuk');
            $table->enum('status',['pending','success','failed']);
            $table->integer('total_bayar')->default(0);
            $table->text('kode_qr')->nullable();
            $table->text('instruksi_pembayaran')->nullable();
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
        Schema::dropIfExists('tikets');
    }
}
