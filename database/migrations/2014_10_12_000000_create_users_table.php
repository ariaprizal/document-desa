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
            $table->string('name');
            $table->string('nik');
            $table->string('nkk');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('agama');
            $table->enum('pendidikan', ['SD/Sederajat', 'SLTP/Sederajat', 'SMA/Sederajat', 'Sarjana']);
            $table->string('pekerjaan');
            $table->enum('status', ['Belum/Tidak Menikah', 'Menikah', 'Duda', 'Janda']);
            $table->string('nama_ibu');
            $table->string('nama_ayah');
            $table->string('alamat');
            $table->string('password')->nullable();
            $table->string('is_admin')->nullable();
            $table->string('tlp')->nullable();
            $table->string('dusun');
            $table->string('rw');
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
