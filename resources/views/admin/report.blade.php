@extends('layouts.dashboardAdmin')

<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('/css/admin/report.css')}}">
<!-- Bootstrap CSS -->

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
@section('tittle', 'Admin | Daftar Pengajuan')

@section('content')

<div class="report-container">
    <h3 class="card-title text-center">Daftar Pengajuan Yang Disetujui</h3>
    <!-- MULAI DATE RANGE PICKER -->
    <h4 class="card-title text-center mt-1 pb-4"> Filter Tanggal Laporan </h4>
        <form action="{{route('report-pdf')}}" method="get">
    <div class="date-area input-daterange pb-4">
            <input type="text" name="from_date" id="from_date" placeholder="Dari Tanggal" readonly />
            <input type="text" name="to_date" id="to_date" placeholder="Sampai Tanggal" readonly />
            <button type="button" name="filter" id="filter" class="btn btn-success">Filter</button>
            <button type="button" name="refresh" id="refresh" class="btn btn-danger">Refresh</button>
            <button type="submit" name="reportPdf" id="reportPdf" class="btn btn-danger">Print Laporan</button>
    </div>
        </form>
    <!-- AKHIR DATE RANGE PICKER -->
    <div class="table-responsive">
        <table class="table  table-bordered table-hover " id="table-report">
            <thead class="table-success">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Id Pengajuan</th>
                    <th scope="col">Nama Pengaju</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Jenis Surat</th>
                    <th scope="col">Tanggal</th>
                </tr>

            </thead>
        </table>
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
    $.fn.dataTable.render.moment = function(from, to, locale) {
        // Argument shifting
        if (arguments.length === 1) {
            moment.locale('id');
            to = from;
            from = 'YYYY-MM-DD HH:mm:ss';
        } else if (arguments.length === 2) {
            moment.locale('id');
        }

        return function(d, type, row) {
            if (!d) {
                return type === 'sort' || type === 'type' ? 0 : d;
            }

            var m = window.moment(d, from, locale, true);

            // Order and type get a number value from Moment, everything else
            // sees the rendered value
            return m.format(type === 'sort' || type === 'type' ? 'x' : to);
        };
    };


    $(document).ready(function() {

        //jalankan function load_data diawal agar data ter-load
        load_data();
        //Iniliasi datepicker pada class input
        $('.input-daterange').datepicker({
            todayBtn: 'linked',
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('#filter').click(function() {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if (from_date != '' && to_date != '') {
                $('#table-report').DataTable().destroy();
                load_data(from_date, to_date);
            } else {
                alert('Both Date is required');
            }
        });
        $('#refresh').click(function() {
            $('#from_date').val('');
            $('#to_date').val('');
            $('#table-report').DataTable().destroy();
            load_data();
        });

        function load_data(from_date = '', to_date = '') {
            $('#table-report').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route('report')}}",
                    type: 'GET',
                    data: {
                        from_date: from_date,
                        to_date: to_date,
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id_pengajuan',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'nik',
                    },
                    {
                        data: 'jenis_surat',
                    },
                    {
                        data: 'updated_at',
                        render: $.fn.dataTable.render.moment('DD-MM-YYYY ')
                    }
                ]
            });
        }


    });
</script>