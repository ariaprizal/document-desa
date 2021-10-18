<footer>
    <div class="footer-content">
        <div class="footer-social">
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-envelope"></i></a>
            <a href=""><i class="bi bi-whatsapp"></i></a>
        </div>
        <div class="footer-info">
            <p>Jl. Nanggerang No.18, Nanggerang, Sukasari, Kabupaten Sumedang, Jawa Barat 45366</p>
            <hr>
        </div>
        <div class="footer-email mb-5">
            <h2>Kritik dan Saran</h2>
            @if(session('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> {{session('message')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="{{route('kritik')}}" method="post">
                @csrf

                <!-- <div class="form-group mb-2">
                    <label for="name">Nama</label>
                    <input type="name" class="form-control" name="name" id="name" required>
                </div> -->
                <div class="form-group mb-2">
                    <label for="body">Kritik dan saran</label>
                    <textarea name="body" id="body" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
    <div class="copyright">
        <p>&copy; Copyright 2021 Pemerintahan Desa Nanggerang </p>
    </div>
</footer>