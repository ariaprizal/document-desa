<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @page {
            size: folio;
        }

        .template {
            margin: 2rem 1.5rem 0rem 1.5rem;
        }

        .logo {
            width: 6.5rem;
            margin-left: 0;
            margin-top: -.5rem;
            position: absolute;
        }

        .template .template-head h1 {
            text-transform: uppercase;
            font-size: 1.4rem;
            margin-left: 4rem;
            text-align: center;
            font-weight: normal;
        }

        .template .template-head {
            margin-top: -.6rem;
        }

        .template-head h2 {
            font-size: .85rem;
            text-align: center;
            margin-top: -1.1rem;
            margin-left: 4rem;
            font-weight: normal;
        }

        .line-head {
            margin-top: -1rem;
        }

        .line-head hr:nth-child(1) {
            height: .8px;
            opacity: 1;
            background-color: black;
        }

        .line-head hr:nth-child(2) {
            height: 1px;
            opacity: 1;
            border: none;
            border-bottom: 1.2px solid black;
            margin-top: -.45rem;
            background-color: transparent;
        }

        .id-document {
            margin-top: 1.5rem;
        }

        .id-document h3 {
            text-align: center;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: -.5;
        }

        .id-document hr {
            opacity: 1;
            background-color: black;
            margin-top: -1rem;
        }


        .id-document h4 {
            text-align: center;
            font-size: 1rem;
            margin-top: -.8rem;
        }

        .template-content p {
            font-size: .95rem;
        }

        .template-content td {
            margin-bottom: .3rem;
        }

        .content-footer p {
            font-size: .95rem;
        }

        .template-ttd {
            margin-top: 3rem;
            margin-left: 20rem;

        }

        .template-ttd p {
            font-size: .95rem;
            text-align: center;
            font-weight: normal;
        }

        .template-ttd table {
            width: 100%;
            margin-top: -1.5rem;
        }

        .qr-code {
            width: 6rem;
        }
    </style>
    <title>PDF</title>
</head>

<body>
    @foreach($submission as $submit)
    @foreach($user as $u)

    <!-- Template Domisili -->
    @if ($submit->jenis_surat == 'Surat Keterangan Domisili')
    <style>
        @page {
            size: A4;
        }

        .template {
            margin: 1.5rem 1.5rem 0rem .8rem;
        }
    </style>
    <div class="template">
        <img class="logo" src="{{asset('images/insunMedal.png')}}" alt="logo-insun_medal">
        <div class="template-head">
            <h1>pemerintah daerah kabupaten Sumedang</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;">Kecamatan sukasari.</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;"><b>desa nanggerang</b> </h1>
            <h2>Jl.Cikuda Nanggerang Dusun Nanggerang Rt 01 Rw 01 45366</h2>
        </div>
        <div class="line-head">
            <hr>
            <hr>
        </div>
        <div class="id-document">
            <h3> {{$submit->jenis_surat}} </h3>
            <hr style="width: 15rem; ">
            <h4>Nomor : {{$submit->no_surat}}/DS/{{\Carbon\Carbon::now()->isoFormat('Y')}}</h4>
        </div>
        <div class="template-content">
            <p style="text-indent: .5in;">Yang bertanda tangan di bawah ini Kepala Desa Nanggerang Kecamatan Sukasari. Kabupaten SUMEDANG, menerangkan dengan sebenarnya bahwa: </p>
            <table class="" style="white-space: pre;">
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="text-indent: .2in;">: <b>{{$u->name}}</b> </td>
                </tr>
                <tr>
                    <td>Nomor Induk Kependudukan</td>
                    <td style="text-indent: .2in;">: {{$u->nik}}</td>
                </tr>
                <tr>
                    <td>Nomor Kartu Keluarga</td>
                    <td style="text-indent: .2in;">: {{$u->nkk}}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td style="text-indent: .2in;">: {{$u->tempat_lahir}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td style="text-indent: .2in;">: {{\Carbon\Carbon::parse($u->tgl_lahir)->isoFormat('dddd, D MMMM Y')}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td style="text-indent: .2in;">: {{$u->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td style="text-indent: .2in;">: {{$u->agama}}</td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td style="text-indent: .2in;">: {{$u->pendidikan}}</td>
                </tr>
                <tr>
                    <td>Pekerjaan </td>
                    <td style="text-indent: .2in;">: {{$u->pekerjaan}}</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td style="text-indent: .2in;">: {{$u->status}}</td>
                </tr>
                <tr>
                    <td>Nama Orang Tua</td>
                    <td style="text-indent: .2in;">: {{$u->nama_ibu}} /{{$u->nama_ayah}}</td>
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td style="text-indent: .2in; ">: {{$u->alamat}} <br> Desa Nanggerang Kecamatan sukasari <br> Kabupaten Sumedang Provinsi Jawa Barat</td>
                </tr>
            </table>
        </div>
        <div class="content-footer">
            <p style="text-indent: .5in;">Berdasarkan Keterangan dari RT dan RW setempat benar bahwa yang bersangkutan Penduduk Desa NANGGERANG Kecamatan SUKASARI. Dan sepengetahuan kami bahwa yang bersangkutan:</p>
            <h4 style="text-align: center; ">==benar berdomisili di alamat tersebut.==</h4>
            <p style="text-indent: .5in;">keterangan ini berlaku 1 (satu) bulan dari tanggal pembuatan. </p>
            <p style="text-indent: .5in; margin-top: -.5rem;">Demikian keterangan ini, untuk dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="template-ttd">
            <p>SUMEDANG, {{\Carbon\Carbon::parse($submit->update_at)->isoFormat('DD MMMM Y')}}</p>
            <p style="margin-top: -.7rem;">Kepala Desa Nanggerang</p>
            <p><img class="qr-code" src="{{asset('images/qr-code.png')}}" alt="qr-code"></p>

        </div>
    </div>
    <!-- end Template Domisili -->

    <!-- Template SKCK -->
    @elseif ($submit->jenis_surat == 'Surat Pengantar SKCK')
    <style>
        .template {
            margin: -.5rem 1.5rem 0rem 0rem;
        }
    </style>
    <div class="template">
        <img class="logo" src="{{asset('images/insunMedal.png')}}" alt="logo-insun_medal">
        <div class="template-head">
            <h1>pemerintah daerah kabupaten Sumedang</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;">Kecamatan sukasari.</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;"><b>desa nanggerang</b> </h1>
            <h2>Jl.Cikuda Nanggerang Dusun Nanggerang Rt 01 Rw 01 45366</h2>
        </div>
        <div class="line-head">
            <hr>
            <hr>
        </div>
        <div class="id-document">
            <h3>{{$submit->jenis_surat}} </h3>
            <hr style="width: 12rem; ">
            <h4>Nomor : {{$submit->no_surat}}/DS/{{\Carbon\Carbon::now()->isoFormat('Y')}}</h4>
        </div>
        <div class="template-content">
            <p style="text-indent: .5in;">Yang bertanda tangan di bawah ini Kepala Desa Nanggerang Kecamatan Sukasari. Kabupaten SUMEDANG, menerangkan dengan sebenarnya bahwa: </p>
            <table class="" style="white-space: pre;">
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="text-indent: .2in;">: <b>{{$u->name}}</b> </td>
                </tr>
                <tr>
                    <td>Nomor Induk Kependudukan</td>
                    <td style="text-indent: .2in;">: {{$u->nik}}</td>
                </tr>
                <tr>
                    <td>Nomor Kartu Keluarga</td>
                    <td style="text-indent: .2in;">: {{$u->nkk}}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td style="text-indent: .2in;">: {{$u->tempat_lahir}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td style="text-indent: .2in;">: {{\Carbon\Carbon::parse($u->tgl_lahir)->isoFormat('dddd, D MMMM Y')}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td style="text-indent: .2in;">: {{$u->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td style="text-indent: .2in;">: {{$u->agama}}</td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td style="text-indent: .2in;">: {{$u->pendidikan}}</td>
                </tr>
                <tr>
                    <td>Pekerjaan </td>
                    <td style="text-indent: .2in;">: {{$u->pekerjaan}}</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td style="text-indent: .2in;">: {{$u->status}}</td>
                </tr>
                <tr>
                    <td>Nama Orang Tua</td>
                    <td style="text-indent: .2in;">: {{$u->nama_ibu}} /{{$u->nama_ayah}}</td>
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td style="text-indent: .2in; ">: {{$u->alamat}} <br> Desa Nanggerang Kecamatan sukasari <br> Kabupaten Sumedang Provinsi Jawa Barat</td>
                </tr>
            </table>
        </div>
        <div class="content-footer">
            <p style="text-indent: .5in;">Sepanjang pengetahuan kami hingga dikeluarkannya Surat Keterangan ini, yang bersangkutan tidak pernah terlibat dalam suatu tindak perkara atau tidak dalam masa tahanan serta tidak terlibat organisasi terlarang dan obat-obatan terlarang.
            </p>
            <p style="text-indent: .5in;">Surat Keterangan ini dipergunakan untuk : {{$submit->keperluan}} </p>
            <p style="text-indent: .5in; margin-top: -.5rem;">Demikian keterangan ini, untuk dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="template-ttd" style="margin-left: 0;">
            <p>Mengetahui:</p>
            <table>
                <tr>
                    <td>
                        <p>Reg.No.:.........................................</p>
                        <p style="margin-top: -1rem;">CAMAT SUKASARI</p>
                        <br><br>
                        <p>NIP:........................................</p>
                    </td>
                    <td></td>
                    <td>
                        <p style="font-weight: normal;">SUMEDANG, {{\Carbon\Carbon::parse($submit->update_at)->isoFormat('DD MMMM Y')}}</p>
                        <p style="margin-top: -.7rem; font-weight: normal;">Kepala Desa Nanggerang</p>
                        <p><img class="qr-code" src="{{asset('images/qr-code.png')}}" alt="qr-code" style="margin-left: 0rem; "></p>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p style="margin-left: -2rem; margin-top: -1rem;">Mengetahui:</p>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <p style="margin-top: -1rem;">DANRAMIL SUKASARI</p>
                        <br><br>
                        <p>..................................................</p>
                        <p style="margin-top: -1rem;">NRP:........................................</p>
                    </td>
                    <td></td>
                    <td>
                        <p style="margin-top: -1rem;">KAPOLSEK SUKASARI</p>
                        <br><br>
                        <p>...................................................</p>
                        <p style="margin-top: -1rem;">NRP:........................................</p>
                    </td>
                </tr>
            </table>

        </div>
    </div>
    <!-- end Template SKCK -->


    <!-- Template SKTM -->
    @elseif ($submit->jenis_surat == 'Surat Keterangan Tidak Mampu')
    <div class="template">
        <img class="logo" src="{{asset('images/insunMedal.png')}}" alt="logo-insun_medal">
        <div class="template-head">
            <h1>pemerintah daerah kabupaten Sumedang</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;">Kecamatan sukasari.</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;"><b>desa nanggerang</b> </h1>
            <h2>Jl.Cikuda Nanggerang Dusun Nanggerang Rt 01 Rw 01 45366</h2>
        </div>
        <div class="line-head">
            <hr>
            <hr>
        </div>
        <div class="id-document">
            <h3> {{$submit->jenis_surat}} </h3>
            <hr style="width: 17rem; ">
            <h4>Nomor : {{$submit->no_surat}}/DS/{{\Carbon\Carbon::now()->isoFormat('Y')}}</h4>
        </div>
        <div class="template-content">
            <p style="text-indent: .5in;">Yang bertanda tangan di bawah ini Kepala Desa Nanggerang Kecamatan Sukasari. Kabupaten SUMEDANG, menerangkan dengan sebenarnya bahwa: </p>
            <table class="" style="white-space: pre;">
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="text-indent: .2in;">: <b>{{$u->name}}</b> </td>
                </tr>
                <tr>
                    <td>Nomor Induk Kependudukan</td>
                    <td style="text-indent: .2in;">: {{$u->nik}}</td>
                </tr>
                <tr>
                    <td>Nomor Kartu Keluarga</td>
                    <td style="text-indent: .2in;">: {{$u->nkk}}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td style="text-indent: .2in;">: {{$u->tempat_lahir}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td style="text-indent: .2in;">: {{\Carbon\Carbon::parse($u->tgl_lahir)->isoFormat('dddd, D MMMM Y')}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td style="text-indent: .2in;">: {{$u->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td style="text-indent: .2in;">: {{$u->agama}}</td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td style="text-indent: .2in;">: {{$u->pendidikan}}</td>
                </tr>
                <tr>
                    <td>Pekerjaan </td>
                    <td style="text-indent: .2in;">: {{$u->pekerjaan}}</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td style="text-indent: .2in;">: {{$u->status}}</td>
                </tr>
                <tr>
                    <td>Nama Orang Tua</td>
                    <td style="text-indent: .2in;">: {{$u->nama_ibu}} /{{$u->nama_ayah}}</td>
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td style="text-indent: .2in; ">: {{$u->alamat}} <br> Desa Nanggerang Kecamatan sukasari <br> Kabupaten Sumedang Provinsi Jawa Barat</td>
                </tr>
            </table>
        </div>
        <div class="content-footer">
            <p style="text-indent: .5in;">Berdasarkan pengantar dari RT/RW setempat dan data yang ada benar bahwa yang bersangkutan Penduduk Desa NANGGERANG Kecamatan SUKASARI. dan: </p>
            <h4 style="text-align: center; width: 90%; ">==yang bersangkutan tergolong keluarga yang tidak mampu (berpenghasilan rendah) karena tidak mempunyai penghasilan tetap==</h4>
            <p style="text-indent: .5in;">Surat Keterangan ini dipergunakan untuk : {{$submit->keperluan}}</p>
            <p style="text-indent: .5in; margin-top: -.5rem;">Demikian keterangan ini, untuk dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="template-ttd">
            <p>SUMEDANG, {{\Carbon\Carbon::parse($submit->update_at)->isoFormat('DD MMMM Y')}}</p>
            <p style="margin-top: -.7rem;">Kepala Desa Nanggerang</p>
            <p><img class="qr-code" src="{{asset('images/qr-code.png')}}" alt="qr-code"></p>
        </div>
    </div>
    <!-- end Template SKTM -->


    <!-- Template SKU -->
    @elseif ($submit->jenis_surat == 'Surat Keterangan Usaha')
    <div class="template">
        <img class="logo" src="{{asset('images/insunMedal.png')}}" alt="logo-insun_medal">
        <div class="template-head">
            <h1>pemerintah daerah kabupaten Sumedang</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;">Kecamatan sukasari.</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;"><b>desa nanggerang</b> </h1>
            <h2>Jl.Cikuda Nanggerang Dusun Nanggerang Rt 01 Rw 01 45366</h2>
        </div>
        <div class="line-head">
            <hr>
            <hr>
        </div>
        <div class="id-document">
            <h3> {{$submit->jenis_surat}} </h3>
            <hr style="width: 13.7rem; ">
            <h4>Nomor : {{$submit->no_surat}}/DS/{{\Carbon\Carbon::now()->isoFormat('Y')}}</h4>
        </div>
        <div class="template-content">
            <p style="text-indent: .5in;">Yang bertanda tangan di bawah ini Kepala Desa Nanggerang Kecamatan Sukasari. Kabupaten SUMEDANG, menerangkan dengan sebenarnya bahwa: </p>
            <table class="" style="white-space: pre;">
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="text-indent: .2in;">: <b>{{$u->name}}</b> </td>
                </tr>
                <tr>
                    <td>Nomor Induk Kependudukan</td>
                    <td style="text-indent: .2in;">: {{$u->nik}}</td>
                </tr>
                <tr>
                    <td>Nomor Kartu Keluarga</td>
                    <td style="text-indent: .2in;">: {{$u->nkk}}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td style="text-indent: .2in;">: {{$u->tempat_lahir}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td style="text-indent: .2in;">: {{\Carbon\Carbon::parse($u->tgl_lahir)->isoFormat('dddd, D MMMM Y')}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td style="text-indent: .2in;">: {{$u->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td style="text-indent: .2in;">: {{$u->agama}}</td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td style="text-indent: .2in;">: {{$u->pendidikan}}</td>
                </tr>
                <tr>
                    <td>Pekerjaan </td>
                    <td style="text-indent: .2in;">: {{$u->pekerjaan}}</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td style="text-indent: .2in;">: {{$u->status}}</td>
                </tr>
                <tr>
                    <td>Nama Orang Tua</td>
                    <td style="text-indent: .2in;">: {{$u->nama_ibu}} /{{$u->nama_ayah}}</td>
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td style="text-indent: .2in; ">: {{$u->alamat}} <br> Desa Nanggerang Kecamatan sukasari <br> Kabupaten Sumedang Provinsi Jawa Barat</td>
                </tr>
            </table>
        </div>
        <div class="content-footer">
            <p style="text-indent: .5in;">Berdasarkan pengetahuan kami dan data yang ada benar bahwa yang bersangkutan Penduduk Desa NANGGERANG Kecamatan SUKASARI. dan pada saat ini memiliki usaha : </p>
            <h4 style="text-align: center;">== {{$submit->jenis_usaha}} yang berlokasi di : {{$submit->lokasi}} Alamat tersebut di atas==</h4>
            <p style="text-indent: .5in;">Surat Keterangan ini dipergunakan untuk : {{$submit->keperluan}}</p>
            <p style="text-indent: .5in; margin-top: -.5rem;">Demikian keterangan ini, untuk dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="template-ttd">
            <p>SUMEDANG, {{\Carbon\Carbon::parse($submit->update_at)->isoFormat('DD MMMM Y')}}</p>
            <p style="margin-top: -.7rem;">Kepala Desa Nanggerang</p>
            <p><img class="qr-code" src="{{asset('images/qr-code.png')}}" alt="qr-code"></p>
        </div>
    </div>
    <!-- end Template SKU -->

    <!-- Template Beda Nama -->
    @elseif ($submit->jenis_surat == 'Surat Keterangan Beda Nama')
    <div class="template">
        <img class="logo" src="{{asset('images/insunMedal.png')}}" alt="logo-insun_medal">
        <div class="template-head">
            <h1>pemerintah daerah kabupaten Sumedang</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;">Kecamatan sukasari.</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;"><b>desa nanggerang</b> </h1>
            <h2>Jl.Cikuda Nanggerang Dusun Nanggerang Rt 01 Rw 01 45366</h2>
        </div>
        <div class="line-head">
            <hr>
            <hr>
        </div>
        <div class="id-document">
            <h3> {{$submit->jenis_surat}} </h3>
            <hr style="width: 16.2rem; ">
            <h4>Nomor : {{$submit->no_surat}}/DS/{{\Carbon\Carbon::now()->isoFormat('Y')}}</h4>
        </div>
        <div class="template-content">
            <p style="text-indent: .5in;">Yang bertanda tangan di bawah ini Kepala Desa Nanggerang Kecamatan Sukasari. Kabupaten SUMEDANG, menerangkan dengan sebenarnya bahwa: </p>
            <table class="" style="white-space: pre;">
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="text-indent: .2in;">: <b>{{$u->name}}</b> </td>
                </tr>
                <tr>
                    <td>Nomor Induk Kependudukan</td>
                    <td style="text-indent: .2in;">: {{$u->nik}}</td>
                </tr>
                <tr>
                    <td>Nomor Kartu Keluarga</td>
                    <td style="text-indent: .2in;">: {{$u->nkk}}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td style="text-indent: .2in;">: {{$u->tempat_lahir}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td style="text-indent: .2in;">: {{\Carbon\Carbon::parse($u->tgl_lahir)->isoFormat('dddd, D MMMM Y')}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td style="text-indent: .2in;">: {{$u->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td style="text-indent: .2in;">: {{$u->agama}}</td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td style="text-indent: .2in;">: {{$u->pendidikan}}</td>
                </tr>
                <tr>
                    <td>Pekerjaan </td>
                    <td style="text-indent: .2in;">: {{$u->pekerjaan}}</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td style="text-indent: .2in;">: {{$u->status}}</td>
                </tr>
                <tr>
                    <td>Nama Orang Tua</td>
                    <td style="text-indent: .2in;">: {{$u->nama_ibu}} /{{$u->nama_ayah}}</td>
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td style="text-indent: .2in; ">: {{$u->alamat}} <br> Desa Nanggerang Kecamatan sukasari <br> Kabupaten Sumedang Provinsi Jawa Barat</td>
                </tr>
            </table>
        </div>
        <div class="content-footer">
            <p style="text-indent: .5in;">Berdasarkan pengetahuan kami dan data yang ada benar bahwa yang bersangkutan Penduduk Desa NANGGERANG Kecamatan SUKASARI. dan terdapat perbedaan dalam penulisan Nama lengkap, di dalam {{$submit->dokumen1}} tertulis {{$submit->tertulis1}} sedangkan di dalam {{$submit->dokumen2}} tertulis {{$submit->tertulis2}} .</p>
            <h4 style="text-align: center;">==data tersebut adalah orang yang sama==</h4>
            <p style="text-indent: .5in;">Surat Keterangan ini dipergunakan untuk : {{$submit->keperluan}}</p>
            <p style="text-indent: .5in; margin-top: -.5rem;">Demikian keterangan ini, untuk dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="template-ttd">
            <p>SUMEDANG, {{\Carbon\Carbon::parse($submit->update_at)->isoFormat('DD MMMM Y')}}</p>
            <p style="margin-top: -.7rem;">Kepala Desa Nanggerang</p>
            <p><img class="qr-code" src="{{asset('images/qr-code.png')}}" alt="qr-code"></p>
        </div>
    </div>
    <!-- end Template Beda Nama -->

    <!-- Template Penghasilan -->
    @elseif ($submit->jenis_surat == 'Surat Keterangan Penghasilan')
    <div class="template">
        <img class="logo" src="{{asset('images/insunMedal.png')}}" alt="logo-insun_medal">
        <div class="template-head">
            <h1>pemerintah daerah kabupaten Sumedang</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;">Kecamatan sukasari.</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;"><b>desa nanggerang</b> </h1>
            <h2>Jl.Cikuda Nanggerang Dusun Nanggerang Rt 01 Rw 01 45366</h2>
        </div>
        <div class="line-head">
            <hr>
            <hr>
        </div>
        <div class="id-document">
            <h3> {{$submit->jenis_surat}} </h3>
            <hr style="width: 17.2rem; ">
            <h4>Nomor : {{$submit->no_surat}}/DS/{{\Carbon\Carbon::now()->isoFormat('Y')}}</h4>
        </div>
        <div class="template-content">
            <p style="text-indent: .5in;">Yang bertanda tangan di bawah ini Kepala Desa Nanggerang Kecamatan Sukasari. Kabupaten SUMEDANG, menerangkan dengan sebenarnya bahwa: </p>
            <table class="" style="white-space: pre;">
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="text-indent: .2in;">: <b>{{$u->name}}</b> </td>
                </tr>
                <tr>
                    <td>Nomor Induk Kependudukan</td>
                    <td style="text-indent: .2in;">: {{$u->nik}}</td>
                </tr>
                <tr>
                    <td>Nomor Kartu Keluarga</td>
                    <td style="text-indent: .2in;">: {{$u->nkk}}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td style="text-indent: .2in;">: {{$u->tempat_lahir}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td style="text-indent: .2in;">: {{\Carbon\Carbon::parse($u->tgl_lahir)->isoFormat('dddd, D MMMM Y')}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td style="text-indent: .2in;">: {{$u->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td style="text-indent: .2in;">: {{$u->agama}}</td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td style="text-indent: .2in;">: {{$u->pendidikan}}</td>
                </tr>
                <tr>
                    <td>Pekerjaan </td>
                    <td style="text-indent: .2in;">: {{$u->pekerjaan}}</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td style="text-indent: .2in;">: {{$u->status}}</td>
                </tr>
                <tr>
                    <td>Nama Orang Tua</td>
                    <td style="text-indent: .2in;">: {{$u->nama_ibu}} /{{$u->nama_ayah}}</td>
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td style="text-indent: .2in; ">: {{$u->alamat}} <br> Desa Nanggerang Kecamatan sukasari <br> Kabupaten Sumedang Provinsi Jawa Barat</td>
                </tr>
            </table>
        </div>
        <div class="content-footer">
            <p style="text-indent: .5in;">Berdasarkan pengetahuan kami dan data yang ada benar bahwa yang bersangkutan Penduduk Desa NANGGERANG Kecamatan SUKASARI. dan </p>
            <h4 style="text-align: center;">==benar mempunyai penghasilan rata-rata Rp. {{number_format($submit->besar, 2)}} per bulan==</h4>
            <p style="text-indent: .5in;">Surat Keterangan ini dipergunakan untuk : {{$submit->keperluan}}</p>
            <p style="text-indent: .5in; margin-top: -.5rem;">Demikian keterangan ini, untuk dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="template-ttd">
            <p>SUMEDANG, {{\Carbon\Carbon::parse($submit->update_at)->isoFormat('DD MMMM Y')}}</p>
            <p style="margin-top: -.7rem;">Kepala Desa Nanggerang</p>
            <p><img class="qr-code" src="{{asset('images/qr-code.png')}}" alt="qr-code"></p>
        </div>
    </div>
    <!-- end Template Penghasilan -->

    <!-- Template Keramaian -->
    @elseif ($submit->jenis_surat == 'Surat Izin Keramaian')
    <div class="template">
        <img class="logo" src="{{asset('images/insunMedal.png')}}" alt="logo-insun_medal">
        <div class="template-head">
            <h1>pemerintah daerah kabupaten Sumedang</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;">Kecamatan sukasari.</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;"><b>desa nanggerang</b> </h1>
            <h2>Jl.Cikuda Nanggerang Dusun Nanggerang Rt 01 Rw 01 45366</h2>
        </div>
        <div class="line-head">
            <hr>
            <hr>
        </div>
        <div class="id-document">
            <h3> {{$submit->jenis_surat}} </h3>
            <hr style="width: 12.2rem; ">
            <h4>Nomor : {{$submit->no_surat}}/DS/{{\Carbon\Carbon::now()->isoFormat('Y')}}</h4>
        </div>
        <div class="template-content">
            <p style="text-indent: .5in;">Yang bertanda tangan di bawah ini Kepala Desa Nanggerang Kecamatan Sukasari. Kabupaten SUMEDANG, menerangkan dengan sebenarnya bahwa: </p>
            <table class="" style="white-space: pre;">
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="text-indent: .2in;">: <b>{{$u->name}}</b> </td>
                </tr>
                <tr>
                    <td>Nomor Induk Kependudukan</td>
                    <td style="text-indent: .2in;">: {{$u->nik}}</td>
                </tr>
                <tr>
                    <td>Nomor Kartu Keluarga</td>
                    <td style="text-indent: .2in;">: {{$u->nkk}}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td style="text-indent: .2in;">: {{$u->tempat_lahir}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td style="text-indent: .2in;">: {{\Carbon\Carbon::parse($u->tgl_lahir)->isoFormat('dddd, D MMMM Y')}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td style="text-indent: .2in;">: {{$u->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td style="text-indent: .2in;">: {{$u->agama}}</td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td style="text-indent: .2in;">: {{$u->pendidikan}}</td>
                </tr>
                <tr>
                    <td>Pekerjaan </td>
                    <td style="text-indent: .2in;">: {{$u->pekerjaan}}</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td style="text-indent: .2in;">: {{$u->status}}</td>
                </tr>
                <tr>
                    <td>Nama Orang Tua</td>
                    <td style="text-indent: .2in;">: {{$u->nama_ibu}} /{{$u->nama_ayah}}</td>
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td style="text-indent: .2in; ">: {{$u->alamat}} <br> Desa Nanggerang Kecamatan sukasari <br> Kabupaten Sumedang Provinsi Jawa Barat</td>
                </tr>
            </table>
        </div>
        <div class="content-footer">
            <p style="text-indent: .5in;">Berdasarkan pengetahuan kami dan data yang ada benar bahwa yang bersangkutan Penduduk Desa NANGGERANG Kecamatan SUKASARI. dan </p>
            <h4 style="text-align: center;">==benar akan melaksanakan keramaian dengan maksud {{$submit->maksud_kegiatan}} pada hari, tanggal {{\Carbon\Carbon::parse($submit->tgl)->isoFormat('dddd, D MMMM Y')}} yang bertempat di {{$submit->lokasi}} ==</h4>
            <p style="text-indent: .5in; margin-top: -.5rem;">Demikian keterangan ini, untuk dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="template-ttd">
            <p>SUMEDANG, {{\Carbon\Carbon::parse($submit->update_at)->isoFormat('DD MMMM Y')}}</p>
            <p style="margin-top: -.7rem;">Kepala Desa Nanggerang</p>
            <p><img class="qr-code" src="{{asset('images/qr-code.png')}}" alt="qr-code"></p>
        </div>
    </div>
    <!-- end Template Keramaian -->

    <!-- Template Kehilangan -->
    @elseif ($submit->jenis_surat == 'Surat Keterangan Kehilangan')
    <div class="template">
        <img class="logo" src="{{asset('images/insunMedal.png')}}" alt="logo-insun_medal">
        <div class="template-head">
            <h1>pemerintah daerah kabupaten Sumedang</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;">Kecamatan sukasari.</h1>
            <h1 style="margin-top: -1rem; font-size: 1.4rem;"><b>desa nanggerang</b> </h1>
            <h2>Jl.Cikuda Nanggerang Dusun Nanggerang Rt 01 Rw 01 45366</h2>
        </div>
        <div class="line-head">
            <hr>
            <hr>
        </div>
        <div class="id-document">
            <h3> {{$submit->jenis_surat}} </h3>
            <hr style="width: 17rem; ">
            <h4>Nomor : {{$submit->no_surat}}/DS/{{\Carbon\Carbon::now()->isoFormat('Y')}}</h4>
        </div>
        <div class="template-content">
            <p style="text-indent: .5in;">Yang bertanda tangan di bawah ini Kepala Desa Nanggerang Kecamatan Sukasari. Kabupaten SUMEDANG, menerangkan dengan sebenarnya bahwa: </p>
            <table class="" style="white-space: pre;">
                <tr>
                    <td>Nama Lengkap</td>
                    <td style="text-indent: .2in;">: <b>{{$u->name}}</b> </td>
                </tr>
                <tr>
                    <td>Nomor Induk Kependudukan</td>
                    <td style="text-indent: .2in;">: {{$u->nik}}</td>
                </tr>
                <tr>
                    <td>Nomor Kartu Keluarga</td>
                    <td style="text-indent: .2in;">: {{$u->nkk}}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td style="text-indent: .2in;">: {{$u->tempat_lahir}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td style="text-indent: .2in;">: {{\Carbon\Carbon::parse($u->tgl_lahir)->isoFormat('dddd, D MMMM Y')}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td style="text-indent: .2in;">: {{$u->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td style="text-indent: .2in;">: {{$u->agama}}</td>
                </tr>
                <tr>
                    <td>Pendidikan</td>
                    <td style="text-indent: .2in;">: {{$u->pendidikan}}</td>
                </tr>
                <tr>
                    <td>Pekerjaan </td>
                    <td style="text-indent: .2in;">: {{$u->pekerjaan}}</td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td style="text-indent: .2in;">: {{$u->status}}</td>
                </tr>
                <tr>
                    <td>Nama Orang Tua</td>
                    <td style="text-indent: .2in;">: {{$u->nama_ibu}} /{{$u->nama_ayah}}</td>
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td style="text-indent: .2in; ">: {{$u->alamat}} <br> Desa Nanggerang Kecamatan sukasari <br> Kabupaten Sumedang Provinsi Jawa Barat</td>
                </tr>
            </table>
        </div>
        <div class="content-footer">
            <p style="text-indent: .5in;">Berdasarkan pengetahuan kami dan data yang ada benar bahwa yang bersangkutan Penduduk Desa NANGGERANG Kecamatan SUKASARI. dan </p>
            <h4 style="text-align: center;">==benar telah kehilangan {{$submit->barang}} pada hari, tanggal {{\Carbon\Carbon::parse($submit->tgl)->isoFormat('dddd, D MMMM Y')}}, lokasi kehilangan di {{$submit->lokasi}} ==</h4>
            <p style="text-indent: .5in; margin-top: -.5rem;">Demikian keterangan ini, untuk dipergunakan sebagaimana mestinya.</p>
        </div>
        <div class="template-ttd">
            <p>SUMEDANG, {{\Carbon\Carbon::parse($submit->update_at)->isoFormat('DD MMMM Y')}}</p>
            <p style="margin-top: -.7rem;">Kepala Desa Nanggerang</p>
            <p><img class="qr-code" src="{{asset('images/qr-code.png')}}" alt="qr-code"></p>
        </div>
    </div>
    <!-- end Template kehilangan -->
    @endif
    @endforeach
    @endforeach
</body>

</html>