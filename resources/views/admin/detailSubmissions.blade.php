@extends('layouts.dashboardAdmin')

<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('/css/admin/listSubmissions.css')}}">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@section('tittle', 'Admin | Daftar Pengajuan')

@section('content')

<div class="detail-submissions">
    <h2>Detail Pengajuan</h2>
    <div class="requirements">
        @foreach($submissions as $submit)
        @foreach($user as $u)
        <div class="detail">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Nama Pengaju </td>
                        <td>: {{$u->name}}</td>
                    </tr>
                    <tr>
                        <td>No. KTP </td>
                        <td>: {{$submit->nik}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Dokumen </td>
                        <td>: {{$submit->jenis_surat}}</td>
                    </tr>

                    @if($submit->jenis_surat == 'Surat Keterangan Penghasilan')
                    <tr>
                        <td>Besar Penhasilan</td>
                        <td>: {{$submit->besar}}</td>
                    </tr>
                    <tr>
                        <td>Keperluan Surat</td>
                        <td>: {{$submit->keperluan}}</td>
                    </tr>

                    @elseif($submit->jenis_surat == 'Surat Pengantar SKCK')
                    <tr>
                        <td>Keperluan</td>
                        <td>: {{$submit->keperluan}}</td>
                    </tr>

                    @elseif($submit->jenis_surat == 'Surat Keterangan Tidak Mampu')
                    <tr>
                        <td>Nama Anak</td>
                        <td>: {{$submit->nama_anak}}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: {{$submit->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Anak</td>
                        <td>: {{$submit->pekerjaan_anak}}</td>
                    </tr>
                    <tr>
                        <td>Keperluan</td>
                        <td>: {{$submit->keperluan}}</td>
                    </tr>

                    @elseif($submit->jenis_surat == 'Surat Keterangan Tidak Mampu')
                    <tr>
                        <td>Perbedaan</td>
                        <td>: {{$submit->perbedaan}}</td>
                    </tr>
                    <tr>
                        <td>Dokumen 1</td>
                        <td>: {{$submit->dokumen1}}</td>
                    </tr>
                    <tr>
                        <td>Tertulis Pada dokumen 1</td>
                        <td>: {{$submit->tertulis1}}</td>
                    </tr>
                    <tr>
                        <td>Dokumen 2</td>
                        <td>: {{$submit->dokumen2}}</td>
                    </tr>
                    <tr>
                        <td>Tertulis Pada dokumen 2</td>
                        <td>: {{$submit->tertulis2}}</td>
                    </tr>
                    <tr>
                        <td>Keperluan</td>
                        <td>: {{$submit->keperluan}}</td>
                    </tr>

                    @elseif($submit->jenis_surat == 'Surat Keterangan Usaha')
                    <tr>
                        <td>Jenis Usaha</td>
                        <td>: {{$submit->jenis_usaha}}</td>
                    </tr>
                    <tr>
                        <td>Lokasi Usaha</td>
                        <td>: {{$submit->lokasi}}</td>
                    </tr>

                    @elseif($submit->jenis_surat == 'Surat Izin Keramaian')
                    <tr>
                        <td>Maksud Keramaian</td>
                        <td>: {{$submit->maksud_kegiatan}}</td>
                    </tr>
                    <tr>
                        <td>Lokas Keramaian</td>
                        <td>: {{$submit->lokasi}}</td>
                    </tr>
                    <tr>
                        <td>Waktu Keramaian</td>
                        <td>: {{$submit->tgl}}</td>
                    </tr>

                    @elseif($submit->jenis_surat == 'Surat Keterangan Kehilangan')
                    <tr>
                        <td>Barang Yang Hilang</td>
                        <td>: {{$submit->barang}}</td>
                    </tr>
                    <tr>
                        <td>Waktu Hilang</td>
                        <td>: {{$submit->tgl}}</td>
                    </tr>
                    <tr>
                        <td>Lokasi Hilang</td>
                        <td>: {{$submit->lokasi}}</td>
                    </tr>
                    <tr>
                        <td>Keperluan Dokumen</td>
                        <td>: {{$submit->keperluan}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="image-area ml-5">
            <div>
                <p class="text-center">Photo KTP</p>
                <img src="{{asset('/submissions/image/ktp/'.$submit->ktp)}}" alt="photo-ktp">
            </div>
            <div>
                <p class="text-center">Photo Kartu Keluarga</p>
                <img src="{{asset('/submissions/image/kk/'.$submit->ktp)}}" alt="photo-kk">
            </div>

        </div>


    </div>
    <div class="validation">
        <a href="{{route('validation', ['id' =>$submit->id, 'status'=>'Ditolak'])}}" class="btn btn-outline-danger">DiTolak</a>
        <a href="{{route('validation', ['id' =>$submit->id, 'status'=>'Disetujui'])}}" type="button" class="btn btn-outline-success">Setujui</a>
    </div>
    @endforeach
    @endforeach
</div>





@endsection

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js" integrity="sha512-cdV6j5t5o24hkSciVrb8Ki6FveC2SgwGfLE31+ZQRHAeSRxYhAQskLkq3dLm8ZcWe1N3vBOEYmmbhzf7NTtFFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>