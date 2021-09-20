<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Box Icon -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('/css/dashboardUser.css')}}">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>@yield('title')</title>
</head>

<body>
    <div class="search-bar">
        <h2>Selamat Datang {{Auth::user()->name}}</h2>
        <a href="{{route('/')}}" class="go-home"><i class='bx bxs-home'></i></a>
    </div>
    <div class="side-bar">
        <div class="navigation">
            <div class="logo">
                <h2>Desa Nanggerang</h2>
            </div>
            <div class="menu">
                <a href="{{route('user-dashboard')}}"><i class='bx bxs-dashboard'></i>Dashboard</a>
                <a href="#" class="dropdown__menu"><i class='bx bxs-file-plus'></i>Buat Dokumen<i class='bx bx-chevron-down'></i></a>
                <div class="sub-menu">
                    <a href="{{route('document', ['value' => 'domisili'])}}">Surat Domisili</a>
                    <a href="{{route('document', ['value' => 'skck'])}}">Surat SKCK</a>
                    <a href="{{route('document', ['value' => 'sktm'])}}">Surat SKTM</a>
                    <a href="{{route('document', ['value' => 'bedanama'])}}">Surat Beda Nama</a>
                    <a href="{{route('document', ['value' => 'sku'])}}">Surat Izin Usaha</a>
                    <a href="{{route('document', ['value' => 'keramaian'])}}">Surat Izin Keramaian</a>
                    <a href="{{route('document', ['value' => 'kehilangan'])}}">Surat Pengantar Kehilangan</a>
                    <a href="{{route('document', ['value' => 'penghasilan'])}}">Surat Keterangan Penghasilan</a>
                </div>
                <a href="{{route('history')}}"><i class='bx bx-history'></i>Riwayat Pengajuan</a>
            </div>
            <div class="other-menu">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" href="" style="background-color: transparent; color: #ffff; width: 6rem; border: none;"><i class='bx bx-log-in-circle'></i>Logout</button>
                </form>
            </div>

        </div>
    </div>
    <main>
        @yield('content')
    </main>

    <div class="floating-menu">
        <div class="floating">
            <i class='bx bx-menu'></i>
        </div>
    </div>





    <script src="{{asset('js/dashboardUser.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js" integrity="sha512-UxP+UhJaGRWuMG2YC6LPWYpFQnsSgnor0VUF3BHdD83PS/pOpN+FYbZmrYN+ISX8jnvgVUciqP/fILOXDjZSwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        const cardDetail = document.querySelectorAll('.card-today');

        cardDetail.forEach((card, i) => {
            card.dataset.aos = "fade-down";
            card.dataset.aosDelay = i*100;
            card.dataset.aosDuration = 1000;
        });
        AOS.init();
    </script>
</body>

</html>