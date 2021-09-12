@extends('layouts.dashboardAdmin')
<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('/css/admin/dashboard.css')}}">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@section('tittle', 'Admin | Dashboard')

@section('content')
<div class="dahboard-admin">
    <div class="card-section">
        <div class="card">
            <i class="bi bi-people-fill"></i>
            <p>Jumlah Penduduk</p>
            <h4>{{$user}} </h4>
        </div>
        <div class="card">
            <i class="bi bi-file-earmark-arrow-down"></i>
            <p>Total Pengajuan</p>
            <h4>{{$submissions}} </h4>
        </div>
        <div class="card">
            <i class="bi bi-file-earmark-text"></i>
            <p>Menunggu Validasi</p>
            <h4>{{$proses}} </h4>
        </div>
        <div class="card">
            <i class="bi bi-file-earmark-check"></i>
            <p>Disetujui</p>
            <h4>{{$disetujui}} </h4>
        </div>
        <div class="card">
            <i class="bi bi-file-earmark-excel"></i>
            <p>Ditolak</p>
            <h4>{{$ditolak}} </h4>
        </div>
    </div>
    <div class="detail-section">
        <h3>Pengajuan Hari Ini {{\Carbon\Carbon::parse(now())->isoFormat('dddd, D MMMM Y')}} </h3>
        <div class="card-detail">
            <div class="card-today">
                <h4>Surat Keterangan Domisili</h4>
                <h4>{{$domisiliToday}} </h4>
            </div>
            <div class="card-today">
                <h4>Surat Pengantar SKCK</h4>
                <h4>{{$skckToday}} </h4>
            </div>
            <div class="card-today">
                <h4>Surat Keterangan Tidak Mampu</h4>
                <h4>{{$sktmToday}} </h4>
            </div>
            <div class="card-today">
                <h4>Surat Keterangan Usaha</h4>
                <h4>{{$skuToday}} </h4>
            </div>
        </div>
        <div class="card-detail">
            <div class="card-today">
                <h4>Surat Keterangan Beda Nama</h4>
                <h4>{{$bedaNamaToday}} </h4>
            </div>
            <div class="card-today">
                <h4>Surat Keterangan Penghasilan</h4>
                <h4>{{$penghasilanToday}} </h4>
            </div>
            <div class="card-today">
                <h4>Surat Keterangan Kehilangan</h4>
                <h4>{{$kehilanganToday}} </h4>
            </div>
            <div class="card-today">
                <h4>Surat Izin Keramaian</h4>
                <h4>{{$keramaianToday}} </h4>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>