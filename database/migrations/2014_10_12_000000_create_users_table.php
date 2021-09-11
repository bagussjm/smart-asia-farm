<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('jenis_pengguna',['admin','pengelola','pelanggan'])->default('admin');
            $table->string('nama_lengkap');
            $table->string('no_hp',14)->nullable();
            $table->text('alamat')->nullable();
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir',255)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
