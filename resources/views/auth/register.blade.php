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
    <title>Register</title>
</head>

<body>
    <div class="container-login">
        <div class="info-social">
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-envelope"></i></a>
            <a href=""><i class="bi bi-whatsapp"></i></a>
            <a href="{{'/'}}"><i class="bi bi-house"></i></a>
        </div>
        <div class="info-area">
            <h3>Dokumen Online</h3>
            <h2>Desa Nanggerang</h2>

        </div>
        <div class="form-area">
            <h1>Daftar</h1>
            @if(session('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> {{session('error')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{route('registrasi-process')}}" method="post">
                @csrf


                <div class="register-input">
                    <input type="text" name="nik" id="nik" autocomplete="off" required>
                    <label for="nik">No KTP</label>
                    <div class="splah"></div>
                </div>
                <div class="register-input">
                    <input type="text" name="tlp" id="tlp" autocomplete="off" required>
                    <label for="tlp">No HP</label>
                    <div class="splah"></div>
                </div>
                <div class="register-input">
                    <input type="password" name="password" id="password" autocomplete="off" required>
                    <label for="password">Password</label>
                    <div class="splah"></div>
                </div>
                <div class="login-input">
                    <button type="submit" class="btn-login">
                        {{ __('Daftar ') }}<i class='bx bx-log-in-circle'></i>
                    </button>
                    <p class="regis-btn">Sudah Daftar? <a href="{{route('login')}}">Masuk</a></p>
                </div>

            </form>
        </div>
    </div>







    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>