@extends('layouts.dashboardAdmin')

<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('/css/admin/listSubmissions.css')}}">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@section('tittle', 'Admin | Daftar Pengajuan')

@section('content')

<div class="detail-submissions">
    <h2>Detail Pengajuan</h2>
    <div class="requirements">
        @foreach($submissions as $submit)
        @foreach($user as $u)
        <div>
            <p>Nama Pengaju : {{$u->name}} </p>
            <p>No. KTP : {{$submit->nik}}</p>
            <p>Jenis Dokumen : {{$submit->jenis_surat}} </p>

            @if($submit->jenis_surat == 'Surat Keterangan Penghasilan')
            <p>Besar Penhasilan : {{$submit->besar}}</p>
            <p>Keperluan Surat : {{$submit->keperluan}}</p>

            @elseif($submit->jenis_surat == 'Surat Pengantar SKCK')
            <p>Keperluan : {{$submit->keperluan}} </p>

            @elseif($submit->jenis_surat == 'Surat Keterangan Tidak Mampu')
            <p>Nama Anak : {{$submit->nama_anak}} </p>
            <p>Jenis Kelamin : {{$submit->jenis_kelamin}} </p>
            <p>Pekerjaan Anak : {{$submit->pekerjaan_anak}} </p>
            <p>Keperluan : {{$submit->keperluan}} </p>

            @elseif($submit->jenis_surat == 'Surat Keterangan Tidak Mampu')
            <p>Perbedaan : {{$submit->perbedaan}} </p>
            <p>Dokumen 1 : {{$submit->dokumen1}} </p>
            <p>Tertulis Pada dokumen 1 : {{$submit->tertulis1}} </p>
            <p>Dokumen 2 : {{$submit->dokumen2}} </p>
            <p>Tertulis Pada dokumen 2 : {{$submit->tertulis2}} </p>
            <p>Keperluan : {{$submit->keperluan}} </p>

            @elseif($submit->jenis_surat == 'Surat Keterangan Usaha')
            <p>Jenis Usaha : {{$submit->jenis_usaha}}</p>
            <p>Lokasi Usaha : {{$submit->lokasi}}</p>

            @elseif($submit->jenis_surat == 'Surat Izin Keramaian')
            <p>Maksud Keramaian : {{$submit->maksud_kegiatan}} </p>
            <p>Lokas Keramaian : {{$submit->lokasi}} </p>
            <p>Waktu Keramaian : {{$submit->tgl}} </p>

            @elseif($submit->jenis_surat == 'Surat Keterangan Kehilangan')
            <p>Barang Yang Hilang : {{$submit->barang}} </p>
            <p>Waktu Hilang : {{$submit->tgl}} </p>
            <p>Lokasi Hilang : {{$submit->lokasi}} </p>
            <p>Keperluan Dokumen : {{$submit->keperluan}} </p>
            @endif
        </div>
        <div>
            <p>Photo KTP</p>
            <img src="{{asset('/submissions/image/ktp/'.$submit->ktp)}}" alt="photo-ktp">
            <p>Photo Kartu Keluarga</p>
            <img src="{{asset('/submissions/image/kk/'.$submit->ktp)}}" alt="photo-kk">
        </div>


    </div>
    <div class="validation">
        <a href="{{route('validation', ['id' =>$submit->id, 'status'=>'Ditolak'])}}" class="btn btn-outline-danger">DiTolak</a>
        <a href="{{route('validation', ['id' =>$submit->id, 'status'=>'Disetujui'])}}" type="button" class="btn btn-outline-success">Setujui</a>
    </div>
    @endforeach
    @endforeach
</div>





@endsection

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>