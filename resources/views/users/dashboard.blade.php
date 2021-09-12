@extends('layouts.dashboardUser')
<link rel="stylesheet" href="{{asset('css/document.css')}}">
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

@section('title', 'Layanan Pengajuan')

@section('content')

<section class="section-dashboard">
    <div class="all-submissions">
        <i class='bx bxs-file-doc'></i>
        <h4>Total Riwayat Pengajuan</h4>
        <h4> {{$submissions}} </h4>
    </div>
    <div class="detail-section">
        <h3>Riwayat Pengajuan</h3>
        <div class="card-detail">
            <div class="card-today" >
                <h4>Surat Keterangan Domisili</h4>
                <h4>{{$domisili}} </h4>
            </div>
            <div class="card-today">
                <h4>Surat Pengantar SKCK</h4>
                <h4>{{$skck}} </h4>
            </div>
            <div class="card-today">
                <h4>Surat Keterangan Tidak Mampu</h4>
                <h4>{{$sktm}} </h4>
            </div>
            <div class="card-today">
                <h4>Surat Keterangan Usaha</h4>
                <h4>{{$sku}} </h4>
            </div>
        </div>
        <div class="card-detail">
            <div class="card-today">
                <h4>Surat Keterangan Beda Nama</h4>
                <h4>{{$bedaNama}} </h4>
            </div>
            <div class="card-today">
                <h4>Surat Keterangan Penghasilan</h4>
                <h4>{{$penghasilan}} </h4>
            </div>
            <div class="card-today">
                <h4>Surat Keterangan Kehilangan</h4>
                <h4>{{$kehilangan}} </h4>
            </div>
            <div class="card-today">
                <h4>Surat Izin Keramaian</h4>
                <h4>{{$keramaian}} </h4>
            </div>
        </div>
    </div>
</section>

@endsection

<script>
    
</script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
