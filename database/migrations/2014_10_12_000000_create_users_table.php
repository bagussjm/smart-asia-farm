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
            $table->enum('jenis_pengguna',['admin-pengelola','pemilik','pencari'])->default('admin-pengelola');
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->date('tanggal_lahir')->nullable();
            $table->string('kota_asal')->nullable();
            $table->enum('status',['kawin','belum kawin','kawin memiliki anak'])->nullable();
            $table->enum('pendidikan_terakhir',['SD','SMP','SMA','S1','S2','S3'])->nullable();
            $table->string('no_hp',14)->nullable();
            $table->enum('profesi',['karyawan','mahasiswa','lainnya'])->nullable();
            $table->string('institusi_tempat_kerja',255)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
