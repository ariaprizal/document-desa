<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Box Icon -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('/css/admin/dashboardAdmin.css')}}">

    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>@yield('title')</title>
</head>

<body>

    <section>
        <div class="sidebar">
            <div class="sidebar-menu">
                <div class="profile-admin">
                    <img src="{{asset('/images/insunMedalBg.png')}}" alt="photo-profile">
                    <h2> {{Auth::user()->name}} </h2>
                </div>
                <div class="sidebar_menu">
                    <a class="active" href="{{route('admin-dashboard')}}"><i class='bx bxs-dashboard'></i>Dashboard</a>


                    <a class="" href="{{route('list-submissions')}}">

                        <input type="hidden" name="views" value="0">
                        @if($notif==true)
                        <i class='bx bx-notification animate-bounce text-red-600'></i>
                        @else
                        <i class='bx bx-list-ul'></i>
                        @endif
                        Daftar Pengajuan</a>
                    <a href="{{route('report')}}"><i class='bx bxs-report'></i>Laporan</a>
                </div>
                <div class="other-menu">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" href="" style="background-color: transparent; color: #ffff; width: 6rem; border: none;"><i class='bx bx-log-in-circle'></i>Logout</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="main-home">
            <div class="searchbar">
                <h3 style="color: white;">Desa Nanggerang</h3>
                <a href="{{route('/')}}"><i class='bx bxs-home'></i></a>
            </div>
            <main>
                @yield('content')
            </main>
        </div>

        </div>
    </section>
    <div class="floating-menu">
        <div class="floating">
            <i class='bx bx-menu'></i>
        </div>
    </div>
















    <script src="{{asset('js/admin/dashboardAdmin.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js" integrity="sha512-UxP+UhJaGRWuMG2YC6LPWYpFQnsSgnor0VUF3BHdD83PS/pOpN+FYbZmrYN+ISX8jnvgVUciqP/fILOXDjZSwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>