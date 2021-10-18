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

        .container-report {
            margin: 2rem 1.5rem 0rem 1.5rem;
        }

        .logo {
            width: 6.5rem;
            margin-left: 0;
            margin-top: -.5rem;
            position: absolute;
        }

        .container-report .template-head h1 {
            text-transform: uppercase;
            font-size: 1.4rem;
            margin-left: 4rem;
            text-align: center;
            font-weight: normal;
        }

        .container-report .template-head {
            margin-top: -1rem;
        }

        .template-head h2 {
            font-size: .85rem;
            text-align: center;
            margin-top: -.6rem;
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



        .container-report table {
            width: 100%;
            margin-top: 2rem;

        }
        .container-report h4{
            font-size: 1.2rem;
            text-align: center;
        }

        .table {
            border-collapse: collapse;
        }

        table tr {

            border: .5px solid black;
        }

        table tr td {
            text-align: left;
            border: 1px solid black;
            height: 2rem;
            padding-left: .5rem;
        }

        table tr th {
            text-align: center;
            border: 1px solid black;
            height: 3rem;
            padding-left: .5rem;
            background-color: darkturquoise;
        }

    </style>
    <title>Document</title>
</head>

<body>
    <div class="container-report">
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
        <h4 class="text-center text-dark ">Laporan Pengajuan Dokumen Kependudukan {{$date}} </h4>
        <table class="table">

            <thead>
                <tr>
                    <th scope="col text-center">NO</th>
                    <th scope="col text-center">Id Pengajuan</th>
                    <th scope="col text-center">Nama Pengaju</th>
                    <th scope="col text-center">NIK</th>
                    <th scope="col text-center">Jenis Surat</th>
                    <th scope="col text-center">Tanggal</th>
                </tr>
            <tbody>
                @foreach($submissions as $submit)
                <tr>
                    <td> {{$loop->iteration}} </td>
                    <td> {{$submit->id_pengajuan}} </td>
                    <td> {{$submit->name}} </td>
                    <td> {{$submit->nik}} </td>
                    <td> {{$submit->jenis_surat}} </td>
                    <td> {{\Carbon\Carbon::parse($submit->updated_at)->isoFormat('dddd, D MMMM Y')}} </td>
                </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
    </div>













</body>


</html>