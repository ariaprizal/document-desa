<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Submission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('id_pengajuan')->unique();
            $table->string('no_surat');
            $table->string('nik');
            $table->enum('jenis_surat', ['Surat Keterangan Domilisi', 'Surat Keterangan Usaha', 'Surat Izin Keramaian', 'Surat Keterangan Tidak Mampu', 'Surat Keterangan Beda Nama', 'Surat Keterangan Kehilangan', 'Surat keterangan penghasilan', 'Surat Pengantar SKCK']);
            $table->string('ktp');
            $table->string('kk');
            $table->string('jenis_usaha')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('maksud_kegiatan')->nullable();
            $table->date('tgl')->nullable();
            $table->string('nama_anak')->nullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->string('pekerjaan_anak')->nullable();
            $table->string('keperluan')->nullable();
            $table->string('perbedaan')->nullable();
            $table->string('dokumen1')->nullable();
            $table->string('dokumen2')->nullable();
            $table->string('tertulis1')->nullable();
            $table->string('tertulis2')->nullable();
            $table->string('barang')->nullable();
            $table->string('besar')->nullable();
            $table->enum('status', ['Disetujui', 'Ditolak', 'Proses'])->nullable();
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
        Schema::dropIfExists('submissions');
    }
}
