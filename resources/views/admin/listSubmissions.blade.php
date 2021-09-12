@extends('layouts.dashboardAdmin')

<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('/css/admin/listSubmissions.css')}}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
@section('tittle', 'Admin | Daftar Pengajuan')

@section('content')

<div class="daftar-pengajuan">
    <h2>Daftar Pengajuan</h2>

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
    <!-- Filter Submissions -->
    <div class="data-table ">
        <div class="form-group">
            <select name="filter_type" id="filter_type" class="form-control">
                <option value="">Jenis Dokumen</option>
                <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                <option value="Surat Keterangan Penghasilan">Surat Keterangan Penghasilan </option>
                <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu </option>
                <option value="Surat Pengantar SKCK">Surat Pengantar SKCK </option>
                <option value="urat Keterangan Usaha">Surat Keterangan Usaha </option>
                <option value="Surat Izin Keramaian">Surat Izin Keramaian </option>
                <option value="Surat Keterangan Beda Nama">Surat Keterangan Beda Nama </option>
                <option value="Surat Keterangan Kehilangan">Surat Keterangan Kehilangan </option>
            </select>
            <select name="filter_validation" id="filter_validation" class="form-control">
                <option value="" id="">Status Dokumen</option>
                <option value="Proses" id="proses">Proses</option>
                <option value="Disetujui" id="disetujui">Disetujui</option>
                <option value="Ditolak" id="proses">Ditolak</option>
            </select>
            <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
            <button type="button" name="reset" id="reset" class="btn btn-danger">Reset</button>
        </div>
        <div class="form-group">

        </div>
        <!-- Emd Filter Submissions -->

        <div class="table-responsive">
            <table class="table table-bordered" id="table-submissions">
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



</div>
@endsection

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.19/dataRender/datetime.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<script>
    $(document).ready(function() {

        loadData();

        $('#filter').click(function() {
            var filter_type = $('#filter_type').val();
            var filter_validation = $('#filter_validation').val();
            if (filter_type != '' || filter_validation != '') {
                $('#table-submissions').DataTable().destroy();
                loadData(filter_type, filter_validation);
            } else {
                alert('Silahkan Isi Data Terlebih Dahulu');
            }
        });
        $('#reset').click(function() {
            $('#filter_type').val('');
            $('#filter_validation').val('');
            $('#table-submissions').DataTable().destroy();
            loadData();
        });

        function loadData(filter_type = '', filter_validation = '') {
            $('#table-submissions').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route('list-submissions')}}",
                    type: 'GET',
                    data: {
                        filter_type: filter_type,
                        filter_validation: filter_validation
                    }
                    
                },
                columns: [{
                        data: 'DT_RowIndex',
                    },
                    {
                        data: 'id_pengajuan',
                    },
                    {
                        data: 'nik',
                    },
                    {
                        data: 'jenis_surat',
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'status',

                    },
                    {
                        data: 'action'

                    }
                ]
            })
        }

    });
</script>