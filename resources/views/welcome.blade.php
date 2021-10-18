@extends('layouts.navbarGuest')
@section('tittle', 'Selamat Datang')
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@section('content')
<header>
    <div class="jumbo_tron">
        <img src="{{asset('/images/jumbotron.jpg')}}" alt="document Background">
    </div>
    <div class="jumbo-text">
        <h2>Selamat Datang Di Layanan Pembuatan Dokumen Kependudukan</h2>
        <h3>Desa Nanggerang</h3>

        <!-- <a href="{{route('about')}}">Informasi Lebih Lanjut</a> -->
    </div>
</header>

<section class="section-content">
    <div class="intro">
        <div class="intro-text" data-aos="fade-in" data-aos-duration="2000">
            <h3>Membuat Dokumen Kapanpun Dimanapun</h3>
            <p>Lakukan Pengajuan Dokumen atau surat-surat yang dibutuhkan dengan mudah dan cepat di manapun dan kapanpun secara online. Pengajuan dapat dilakukan melalui Handphone masing masing selama terkoneksi ke Internet</p>
        </div>
        <div class="intro-img" data-aos="fade-up" data-aos-duration="2000">
            <img src="{{asset('images/sc1-2.jpg')}}" alt="image">
        </div>
    </div>
    <div class="step">
        <h2>Mengajukan Dokumen Melalui Handphone</h2>
        <div class="by-step">
            <i class="bi bi-phone-fill"></i>
            <p>Masuk <a href="">dokumen.desananggerang.com</a> melalui browser handphone anda</p>
        </div>
        <div class="by-step">
            <i class="bi bi-card-list"></i>
            <p>Lakukan Pendaftaran dan Masuk dengan akun anda</p>
        </div>
        <div class="by-step">
            <i class="bi bi-check-circle"></i>
            <p>Buat Pengajuan dokumen dan isi semua data</p>
        </div>
        <div class="by-step">
            <i class="bi bi-arrow-down-circle"></i>
            <p>Setelah dokumen disetujui, Download dokumen pada halaman riwayat pengajuan</p>
        </div>
    </div>
</section>
<!-- <section>
    <div class="content-intro">
        <svg class="slide__overlay" viewBox="0 0 831 405" preserveAspectRatio="xMaxYMax slice">
            <path class="slide__overlay-path" d="M0,0 100,0 600,405 0,405" />
        </svg>
    </div>
    <div class="intro">
        
    </div>
    <div class="intro-text" data-aos="fade-up" data-aos-duration="2000">
        
    </div>

</section>

<section>
    
    <div class="step">
        <div class="by-step" >
            <i class="bi bi-phone-fill"></i>
            <p>Masuk <a href="">dokumen.desananggerang.com</a> melalui browser handphone anda</p>
        </div>
        <div class="by-step" >
            <i class="bi bi-card-list"></i>
            <p>Buat pengajuan dokumen yang diperlukan dan isi data secara lengkap</p>
        </div>
        <div class="by-step" >
            <i class="bi bi-check-circle"></i>
            <p>Dokumen Berhasil diajukan, tunggu pegawai desa melakukan persejuan</p>
        </div>
    </div>
</section> -->


@include('layouts.footer')

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    const step = document.querySelectorAll('.by-step');

    step.forEach((s, i) => {
        s.dataset.aos = 'fade-up';
        s.dataset.aosDelay = i * 100;
        s.dataset.aosDuration = 1000;
    });
    const social = document.querySelectorAll('.footer-social a');

    social.forEach((s, i) => {
        s.dataset.aos = 'fade-right';
        s.dataset.aosDelay = i * 100;
        s.dataset.aosDuration = 1000;
    });
    AOS.init();
</script>
@endsection