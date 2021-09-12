@extends('layouts.dashboardUser')
<link rel="stylesheet" href="{{asset('css/document.css')}}">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@section('title', 'Surat Keterangan Domisili')

@section('content')
<section class="section-domisili">
    <h2>Silahkan Isi Data Untuk Membuat Dokumen</h2>
    <div class="form-domisili">
        <h3>{{$value}} </h3>
        <form action="{{route('submission')}}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Error Info -->
            @if(session('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> {{session('error')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif(session('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong> {{session('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <!-- End Error Info -->

            <!-- form KTP KK -->
            <div class="data-form">
                <div class="input-group input-syarat">
                    <label for="input-ktp">Upload Photo KTP</label>
                    <input type="file" class="form-control w-100" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="ktp" id="input-ktp" require>
                    <div class="image-preview" id="image-preview">
                        <img src="" alt="Gambar Pratinjau" class="image-preview__image" id="image-preview__image">
                        <span class="image-preview__text">Gambar Pratinjau</span>
                    </div>

                </div>
                <div class="input-group input-syarat">
                    <label for="input-kk">Upload Photo kartu Keluarga</label>
                    <input type="file" class="form-control w-100" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="kk" id="input-kk">
                    <div class="image-previewKk" id="image-previewKk">
                        <img src="" alt="Gambar Pratinjau" class="image-previewKk__image" id="image-previewKk__image">
                        <span class="image-previewKk__text">Gambar Pratinjau</span>
                    </div>
                </div>
            </div>
            <!-- End Form KTP KK -->

            <!-- form Domisili -->
            @if($value == 'Surat Keterangan Domisili')
            <input type="hidden" name="id_pengajuan" value="{{Str::random(8)}}">
            <input type="hidden" name="no_surat" value="474">
            <input type="hidden" name="jenis_surat" value="{{$value}}">
            <input type="hidden" name="status" value="proses">
            <input type="hidden" name="nik" value="{{Auth::user()->nik}}">

            <!-- End Form Domisili -->

            <!-- Form Beda Nama -->
            @elseif($value == 'Surat Keterangan Beda Nama')
            <input type="hidden" name="id_pengajuan" value="{{Str::random(8)}}">
            <input type="hidden" name="no_surat" value="474">
            <input type="hidden" name="jenis_surat" value="{{$value}}">
            <input type="hidden" name="status" value="proses">
            <input type="hidden" name="nik" value="{{Auth::user()->nik}}">

            <div class="input-data">
                <div class="register-input">
                    <input type="text" name="perbedaan" id="perbedaan" autocomplete="off" required>
                    <label for="perbedaan">Perbedaan</label>
                    <div class="splah"></div>
                </div>
                <div class="register-input">
                    <input type="text" name="keperluan" id="keperluan" autocomplete="off" required>
                    <label for="keperluan">Keperluan Surat</label>
                    <div class="splah"></div>
                </div>
            </div>
            <div class="input-data">
                <div class="register-input">
                    <input type="text" name="dokumen1" id="dokumen1" autocomplete="off" required>
                    <label for="dokumen1">Dokumen 1</label>
                    <div class="splah"></div>
                </div>
                <div class="register-input">
                    <input type="text" name="tertulis1" id="tertulis1" autocomplete="off" required>
                    <label for="tertulis1">Tertulis Pada Dokumen 1</label>
                    <div class="splah"></div>
                </div>
            </div>
            <div class="input-data">
                <div class="register-input">
                    <input type="text" name="dokumen2" id="dokumen2" autocomplete="off" required>
                    <label for="dokumen2">Dokumen 2</label>
                    <div class="splah"></div>
                </div>
                <div class="register-input">
                    <input type="text" name="tertulis2" id="tertulis2" autocomplete="off" required>
                    <label for="tertulis2">Tertulis Pada Dokumen 2</label>
                    <div class="splah"></div>
                </div>
            </div>
            <!-- End Form Beda Nama -->

            <!-- Form Kehilangan -->
            @elseif($value == 'Surat Keterangan Kehilangan')
            <input type="hidden" name="id_pengajuan" value="{{Str::random(8)}}">
            <input type="hidden" name="no_surat" value="477">
            <input type="hidden" name="jenis_surat" value="{{$value}}">
            <input type="hidden" name="status" value="proses">
            <input type="hidden" name="nik" value="{{Auth::user()->nik}}">

            <div class="input-data">
                <div class="register-input">
                    <input type="text" name="barang" id="barang" autocomplete="off" required>
                    <label for="barang">Barang Hilang</label>
                    <div class="splah"></div>
                </div>
                <div class="register-input">
                    <input type="text" name="lokasi" id="lokasi" autocomplete="off" required>
                    <label for="lokasi">Lokasi Kehilangan</label>
                    <div class="splah"></div>
                </div>
            </div>
            <div class="input-data">
                <div class="register-input">
                    <input type="date" name="tgl" id="tgl" autocomplete="off" required>
                    <label for="tgl">Waktu Kehilangan</label>
                    <div class="splah"></div>
                </div>
                <div class="register-input">
                    <input type="text" name="keperluan" id="keperluan" autocomplete="off" required>
                    <label for="keperluan">Keperluan Surat</label>
                    <div class="splah"></div>
                </div>
            </div>
            <!-- End Form Kehilangan -->

            <!-- Form keramaian -->
            @elseif($value == 'Surat Izin Keramaian')
            <input type="hidden" name="id_pengajuan" value="{{Str::random(8)}}">
            <input type="hidden" name="no_surat" value="478">
            <input type="hidden" name="jenis_surat" value="{{$value}}">
            <input type="hidden" name="status" value="proses">
            <input type="hidden" name="nik" value="{{Auth::user()->nik}}">

            <div class="input-data">
                <div class="register-input">
                    <input type="text" name="maksud_kegiatan" id="maksud" autocomplete="off" required value="{{ old('maksud_kegiatan') }}">
                    <label for="maksud">Maksud Keramaian</label>
                    <div class="splah"></div>
                </div>
                <div class="register-input">
                    <input type="text" name="lokasi" id="lokasi" autocomplete="off" required>
                    <label for="lokasi">Lokasi Keramaian</label>
                    <div class="splah"></div>
                </div>
            </div>
            <div class="input-data">
                <div class="register-input">
                    <input type="date" name="tgl" id="tgl" autocomplete="off" required>
                    <label for="tgl">Waktu Keramaian</label>
                    <div class="splah"></div>
                </div>
            </div>
            <!-- End Form keramaian -->

            <!-- Form penghasilan -->
            @elseif($value == 'Surat Keterangan Penghasilan')
            <input type="hidden" name="id_pengajuan" value="{{Str::random(8)}}">
            <input type="hidden" name="no_surat" value="475">
            <input type="hidden" name="jenis_surat" value="{{$value}}">
            <input type="hidden" name="status" value="proses">
            <input type="hidden" name="nik" value="{{Auth::user()->nik}}">

            <div class="input-data">
                <div class="register-input">
                    <input type="text" name="besar" id="besar" autocomplete="off" required>
                    <label for="besar">Besar Penghasilan</label>
                    <div class="splah"></div>
                </div>
                <div class="register-input">
                    <input type="text" name="keperluan" id="keperluan" autocomplete="off" required>
                    <label for="keperluan">Keperluan Surat</label>
                    <div class="splah"></div>
                </div>
            </div>
            <!-- End Form penghasilan -->

            <!-- Form skck -->
            @elseif($value == 'Surat Pengantar SKCK')
            <input type="hidden" name="id_pengajuan" value="{{Str::random(8)}}">
            <input type="hidden" name="no_surat" value="331">
            <input type="hidden" name="jenis_surat" value="{{$value}}">
            <input type="hidden" name="status" value="proses">
            <input type="hidden" name="nik" value="{{Auth::user()->nik}}">
            <div class="input-data">
                <div class="register-input">
                    <input type="text" name="keperluan" id="keperluan" autocomplete="off" required value="{{ old('keperluan') }}">
                    <label for="keperluan">Keperluan</label>
                    <div class="splah"></div>
                </div>
            </div>
            <!-- End Form skck -->

            <!-- Form sktm -->
            @elseif($value == 'Surat Keterangan Tidak Mampu')
            <input type="hidden" name="id_pengajuan" value="{{Str::random(8)}}">
            <input type="hidden" name="no_surat" value="474">
            <input type="hidden" name="jenis_surat" value="{{$value}}">
            <input type="hidden" name="status" value="proses">
            <input type="hidden" name="nik" value="{{Auth::user()->nik}}">

            <div class="input-data">
                <div class="register-input">
                    <input type="text" name="nama_anak" id="name" autocomplete="off" required value="{{ old('nama_anak') }}">
                    <label for="name">Nama Anak</label>
                    <div class="splah"></div>
                </div>
                <div class="register-input">
                    <input type="text" name="jenis_kelamin" id="jenisKelamin" autocomplete="off" required value="{{ old('jenis_kelamin') }}">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <div class="splah"></div>
                </div>
            </div>
            <div class="input-data">
                <div class="register-input">
                    <input type="text" name="pekerjaan_anak" id="pekerjaanAnak" autocomplete="off" required value="{{ old('pekerjaan_anak') }}">
                    <label for="pekerjaanAnak">Pekerjann Anak</label>
                    <div class="splah"></div>
                </div>
                <div class="register-input">
                    <input type="text" name="keperluan" id="keperluan" autocomplete="off" required value="{{ old('keperluan') }}">
                    <label for="keperluan">Keperluan</label>
                    <div class="splah"></div>
                </div>
            </div>
            <!-- End Form sktm -->

            <!-- Form sku -->
            @elseif($value == 'Surat Keterangan Usaha')
            <input type="hidden" name="id_pengajuan" value="{{Str::random(8)}}">
            <input type="hidden" name="no_surat" value="474">
            <input type="hidden" name="jenis_surat" value="{{$value}}">
            <input type="hidden" name="status" value="proses">
            <input type="hidden" name="nik" value="{{Auth::user()->nik}}">

            <div class="input-data">
                <div class="register-input">
                    <input type="text" name="jenis_usaha" id="jenisUsaha" autocomplete="off" required>
                    <label for="jenisUsaha">Jenis Usaha</label>
                    <div class="splah"></div>
                </div>
                <div class="register-input">
                    <input type="text" name="lokasi" id="lokasiUsaha" autocomplete="off" required>
                    <label for="lokasiUsaha">Lokasi Usaha</label>
                    <div class="splah"></div>
                </div>
            </div>
            <div class="input-data">
                <div class="register-input">
                    <input type="text" name="keperluan" id="keperluan" autocomplete="off" required value="{{ old('keperluan') }}">
                    <label for="keperluan">Keperluan</label>
                    <div class="splah"></div>
                </div>
            </div>
            <!-- End Form sku -->

            @endif
            <button type="submit" class="btn btn-success w-100 mt-4 ">Ajukan Dokumen</button>
        </form>
    </div>
</section>
<div class="circle1"></div>
<div class="circle2"></div>


@endsection
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>