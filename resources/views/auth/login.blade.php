<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('css/loginStyle.css')}}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Box Icon -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Login</title>
</head>

<body>
    <div class="container-login">
        <div class="info-social">
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-envelope"></i></a>
            <a href=""><i class="bi bi-whatsapp"></i></a>
            <a href="{{route('/')}}"><i class="bi bi-house"></i></a>
        </div>
        <div class="info-area">
            <h3>Dokumen Online</h3>
            <h2>Desa Nanggerang</h2>

        </div>
        <div class="form-area">
            @if(session('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> {{session('error')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <h1>Masuk</h1>
            <form method="POST" action="{{ route('login-process') }}">
                @csrf
                <div class="form-input">
                    <div class="login-input">
                        <input id="nik" type="text" class="
                         @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik">
                        <label for="nik" class="label-name">
                            <span class="content-name">NIK</span>
                        </label>
                    </div>
                </div>

                <div class="form-input">
                    <div class="login-input">
                        <input id="password" type="password" class="
                         @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <label for="password" class="label-name">
                            <span class="content-name">Password</span>
                        </label>
                    </div>
                </div>

                <div class="login-input">
                    <div class="remember">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Ingat Saya') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                    <a class="lupa-password" href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                    @endif
                    <button type="submit" class="btn-login">
                        {{ __('Masuk ') }}<i class='bx bx-log-in-circle'></i>
                    </button>
                    <!--  -->
                    <p class="regis-btn">Belum punya akun? <a href="{{route('register')}}" id="move-register">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>






<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        const social = document.querySelectorAll('.info-social a');

        social.forEach((s, i) => {
            s.dataset.aos = 'fade-right';
            s.dataset.aosDelay = i * 100;
            s.dataset.aosDuration = 2000;
        });
        AOS.init();
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/login.js')}}"></script>
    
</body>

</html>