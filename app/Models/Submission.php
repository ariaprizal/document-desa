<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pengajuan',
        'no_surat',
        'nik',
        'jenis_surat',
        'ktp',
        'kk',
        'jenis_usaha',
        'lokasi',
        'maksud_kegiatan',
        'tgl',
        'nama_anak',
        'jenis_kelamin',
        'pekerjaan_anak',
        'keperluan',
        'perbedaan',
        'dokumen1',
        'dokumen2',
        'tertulis1',
        'tertulis2',
        'barang',
        'besar',
        'status',
    ];

}
