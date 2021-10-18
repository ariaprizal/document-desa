<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Box Icon -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/navbar-guest.css')}}">
    <link rel="stylesheet" href="{{asset('css/landingpage.css')}}">

    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">

    

    <title>@yield('tittle')</title>
</head>

<body>
    <nav class="navbar-guest">
        <div class="logo">
            <h3>Desa Nanggerang</h3>
        </div>
        <ul>
            <div class="nav-menu">
                <li><a href="{{route('/')}}">Beranda</a></li>
                @guest
                @else
                @if(Auth::user()->is_admin==0)
                <li><a href="{{route('user-dashboard')}}">Dashboard</a></li>
                @elseif(Auth::user()->is_admin==1)
                <li><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
                @elseif(Auth::user()->is_admin==2)
                <li>
                    <a href=" {{route('list-rt')}}">Permohonan</a>
                </li>
                @elseif(Auth::user()->is_admin==3)
                <li><a href="{{route('list-rw')}}">Permohonan</a></li>
                @endif
                @endguest
                <li><a href="{{route('about')}}">Tentang Kami</a></li>
            </div>

            <div class="login-btn">
                @guest
                <li><a href="{{route('login')}}">Masuk</a></li>
                <li><a href="{{route('register')}}">Daftar</a></li>
                @else
                @if(Auth::user()->is_admin == 0)
                <a href="#" style="text-decoration: none; color: #ffff; width: 6rem;">{{Auth::user()->name}}</a>
                @else
                <a href="{{route('admin-dashboard')}}" style="text-decoration: none; color: #ffff; width: 10rem;">{{Auth::user()->name}}</a>
                @endif
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" href="" style="background-color: transparent; color: #ffff; width: 6rem; border: none;">Logout</button>
                </form>

                @endguest
            </div>
        </ul>
        <div class="toggle-btn">
            <i class='bx bx-menu'></i>
        </div>

    </nav>

    <main>
        @yield('content')
    </main>












    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/navbarGuest.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js" integrity="sha512-UxP+UhJaGRWuMG2YC6LPWYpFQnsSgnor0VUF3BHdD83PS/pOpN+FYbZmrYN+ISX8jnvgVUciqP/fILOXDjZSwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>