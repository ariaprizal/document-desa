@extends('layouts.navbarGuest')

<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('css/about.css')}}">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


<style>
    .navbar-guest .nav-menu li a,
    .logo {
        color: black;
    }

    @media screen and (max-width: 768px) {

        .navbar-guest .nav-menu li a{
            color: #fff;
        }
        .toggle-btn i{
            color: black;
        }
    }
</style>
@section('tittle', 'Tentang Kami')

@section('content')

<section class="section-about">
    <div class="info">
        <div class="detail-info">
            <p class="text-center" style="font-size: 1.3rem; font-weight: bold;">Layanan Pengajuan Dokumen Desa</p>
            <p>Sistem dapat digunakan oleh masyarakat Desa Nanggerang sebagai media untuk mengajukan dokumen atau surat-surat yang diperlukan secara online. Tujuan dibuatnya sistem adalah untuk memudahkan masyarakat dalam melakukan pengajuan tanpa harus datang ke kantor Desa. selain itu masyarakat yang tengah berada di luar kota dapat dengan mudah melakukan pengajuan, karena dokumen atau surat yang telah di validasi oleh perangkat desa, dapat di download langsung dan dicetak secara mandiri.</p>
            <div class="info-social">
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-envelope"></i></a>
                <a href=""><i class="bi bi-whatsapp"></i></a>
            </div>
        </div>
        <div class="img-info">
            <img src=" {{asset('images/img-desa.png')}} " alt="Photo Desa">
        </div>
    </div>


</section>





























@include('layouts.footer')


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    const social = document.querySelectorAll('.footer-social a');

    social.forEach((s, i) => {
        s.dataset.aos = 'fade-right';
        s.dataset.aosDelay = i * 100;
        s.dataset.aosDuration = 1000;
    });
    AOS.init();
</script>
@endsection