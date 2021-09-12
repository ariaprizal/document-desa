@extends('layouts.dashboardUser')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
@section('title', 'Layanan Pengajuan')

@section('content')

<section class="section-dashboard">
    <div class="history">
        <h1>Riwayat Pengajuan</h1>
        <div class="table-responsive">
            <table class="table table-bordered" id="table-history">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Id Pengajuan</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Jenis Surat</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>

@endsection


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        loadData();

        function loadData() {
            $('#table-history').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route('history')}}",
                    type: 'GET'
                },
                columns: [{
                        data: 'DT_RowIndex'
                    },
                    {
                        data: 'id_pengajuan'
                    },
                    {
                        data: 'nik'
                    },
                    {
                        data: 'jenis_surat'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'action'
                    },
                ]
            });
        }
    });
</script>