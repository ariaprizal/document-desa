<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Submission;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use DateTime;
use Facade\FlareClient\Time\Time;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = count(DB::table('users')->get());

        $submission = Submission::all();
        $submissions = count(DB::table('submissions')
            ->where('level', 'desa')
            ->get());

        foreach ($submission as $submission) {
            # code...
            $dateNow = $submission->created_at;
        }
        $proses = count(DB::table('submissions')
            ->where('level', 'desa')
            ->where('status', 'Proses')
            ->get());
        $disetujui = count(DB::table('submissions')
            ->where('level', 'desa')
            ->where('status', 'Disetujui')
            ->get());
        $ditolak = count(DB::table('submissions')
            ->where('level', 'desa')
            ->where('status', 'Ditolak')
            ->get());

        // Count Every Submissions
        $domisili = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Keterangan Domisili')
            ->get());
        $skck = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Pengantar SKCK')
            ->get());
        $sktm = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Keterangan Tidak Mampu')
            ->get());
        $sku = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Keterangan Usaha')
            ->get());
        $bedaNama = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Keterangan Beda Nama')
            ->get());
        $penghasilan = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Keterangan Penghasilan')
            ->get());
        $kehilangan = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Keterangan Kehilangan')
            ->get());
        $keramaian = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Izin Keramaian')
            ->get());

        // Count Submission Today
        $domisiliToday = count(DB::table('submissions')
            ->where('level', 'desa')
            ->where('jenis_surat', 'Surat Keterangan Domisili')
            ->where('created_at', $dateNow)
            ->get());
        $skckToday = count(DB::table('submissions')
            ->where('level', 'desa')
            ->where('jenis_surat', 'Surat Pengantar SKCK')
            ->where('created_at', $dateNow)
            ->get());
        $sktmToday = count(DB::table('submissions')
            ->where('level', 'desa')
            ->where('jenis_surat', 'Surat Keterangan Tidak Mampu')
            ->where('created_at', $dateNow)
            ->get());
        $skuToday = count(DB::table('submissions')
            ->where('level', 'desa')
            ->where('jenis_surat', 'Surat Keterangan Usaha')
            ->where('created_at', $dateNow)
            ->get());
        $bedaNamaToday = count(DB::table('submissions')
            ->where('level', 'desa')
            ->where('jenis_surat', 'Surat Keterangan Beda Nama')
            ->where('created_at', $dateNow)
            ->get());
        $penghasilanToday = count(DB::table('submissions')
            ->where('level', 'desa')
            ->where('jenis_surat', 'Surat Keterangan Penghasilan')
            ->where('created_at', $dateNow)
            ->get());
        $kehilanganToday = count(DB::table('submissions')
            ->where('level', 'desa')
            ->where('jenis_surat', 'Surat Keterangan Kehilangan')
            ->where('created_at', $dateNow)
            ->get());
        $keramaianToday = count(DB::table('submissions')
            ->where('level', 'desa')
            ->where('jenis_surat', 'Surat Izin Keramaian')
            ->where('created_at', $dateNow)
            ->get());

        // $notif = '';
        $submissionView = Submission::where('level', 'desa')->get();
        foreach ($submissionView as $views) {
            if ($views->views === '0') {
                $notif = true;
            } else if ($views->views === '1') {
                $notif = false;
            }
        }

        return view('admin.dashboard', [
            'user' => $user, 'submissions' => $submissions, 'proses' => $proses, 'disetujui' => $disetujui, 'ditolak' => $ditolak,
            'domisili' => $domisili,
            'skck' => $skck,
            'sktm' => $sktm,
            'sku' => $sku,
            'bedaNama' => $bedaNama,
            'penghasilan' => $penghasilan,
            'kehilangan' => $kehilangan,
            'keramaian' => $keramaian,
            'domisiliToday' => $domisiliToday,
            'skckToday' => $skckToday,
            'sktmToday' => $sktmToday,
            'skuToday' => $skuToday,
            'bedaNamaToday' => $bedaNamaToday,
            'penghasilanToday' => $penghasilanToday,
            'kehilanganToday' => $kehilanganToday,
            'keramaianToday' => $keramaianToday,
            'notif' => $notif,
        ]);
    }

    // Show List Submissions
    public function listSubmissions(Request $request)
    {


        if ($request->ajax()) {
            if ($request->filter_type != '' && $request->filter_validation == '') {
                $submissions = DB::table('Submissions')
                    ->where('level', 'desa')
                    ->where('jenis_surat', $request->filter_type)
                    ->orderBy('status', 'DESC')
                    ->get();
            } else if ($request->filter_type == '' && $request->filter_validation != '') {
                $submissions = DB::table('Submissions')
                    ->where('level', 'desa')
                    ->where('status', $request->filter_validation)
                    ->orderBy('status', 'DESC')
                    ->get();
            } else if ($request->filter_type != '' && $request->filter_validation != '') {
                $submissions = DB::table('Submissions')
                    ->where('level', 'desa')
                    ->where('status', $request->filter_validation)
                    ->where('jenis_surat', $request->filter_type)
                    ->orderBy('status', 'DESC')
                    ->get();
            } else {
                $submissions = DB::table('Submissions')
                    ->where('level', 'desa')
                    ->orderBy('status', 'DESC')->get();
            }
            return DataTables()->of($submissions)
                ->addColumn('action', function ($data) {
                    if ($data->status === 'Proses') {
                        $button = route('detail-submissions', $data->id);
                        $button = '<a href="' . $button . '"" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Detail</a>';
                    } else if ($data->status === 'Disetujui') {
                        $button = route('print-show', $data->id);
                        $button = '<a href="' . $button . '"" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Print</a>';
                    }
                    return $button;
                })
                ->addColumn('date', function ($data) {
                    $date = Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM Y');
                    $date = '<p>' . $date . '</p>';
                    return $date;
                })
                ->rawColumns(['action', 'date'])
                ->addIndexColumn()
                ->make(true);
        }


        $submissionView = Submission::where('level', 'desa')->get();
        Submission::where('views', '0')
            ->where('level', 'desa')
            ->update(['views' => '1']);
        foreach ($submissionView as $views) {
            if ($views->views === '0') {
                $notif = true;
            } else if ($views->views === '1') {
                $notif = false;
            }
        }
        return view('admin.listSubmissions', ['notif' => $notif]);
    }



    // Validation Document
    public function validation($id, $value)
    {
        $submission = Submission::where('id', $id)->get();
        if (count($submission) > 0) {
            Submission::where('id', $id)->update([
                'status' => $value
            ]);
            return redirect('/admin/list')->with(
                'success',
                'Status Validasi Telah Diubah',
            );
        } else {
            return redirect('/admin/list')->with(
                'error',
                'Gagal Melakukan Validasi',
            );
        }
    }




    /** 
     * Print / Show Submissions After Validation
     * @return Dompdf
     */
    public function printShow($id)
    {
        $submission = Submission::where('id', $id)->get();
        $submissions = Submission::find($id);
        $user = User::where('nik', $submissions->nik)->get();

        $pdf = PDF::loadview('templateDocument', ['submission' => $submission, 'user' => $user]);
        return $pdf->stream('document-pengajuan.pdf');
    }

    /**
     * Show Report Submissions Menu
     * @return view admin.report
     */
    public function report(Request $request)
    {

        $submissions  = DB::table('users')
            ->join('submissions', 'users.nik', '=', 'submissions.nik')
            ->where('submissions.status', 'Disetujui')
            ->get();

        if ($request->ajax()) {
            //Jika request from_date ada value(datanya) maka
            if (!empty($request->from_date)) {
                //Jika tanggal awal(from_date) hingga tanggal akhir(to_date) adalah sama maka
                if ($request->from_date === $request->to_date) {
                    //kita filter tanggalnya sesuai dengan request from_date
                    $submissions  = DB::table('users')
                        ->join('submissions', 'users.nik', '=', 'submissions.nik')
                        ->where('submissions.status', 'Disetujui')
                        ->whereDate('submissions.updated_at', '=', $request->from_date)
                        ->get();
                } else {
                    //kita filter dari tanggal awal ke akhir
                    $submissions  = DB::table('users')
                        ->join('submissions', 'users.nik', '=', 'submissions.nik')
                        ->where('submissions.status', 'Disetujui')
                        ->whereBetween('submissions.updated_at', array($request->from_date, $request->to_date))
                        ->get();
                }
            }
            //load data default
            else {
                $submissions  = DB::table('users')
                    ->join('submissions', 'users.nik', '=', 'submissions.nik')
                    ->where('submissions.status', 'Disetujui')
                    ->get();
            }
            return DataTables()->of($submissions)
                ->addIndexColumn()
                ->make(true);
        }
        $submissionView = Submission::where('level', 'desa')->get();
        foreach ($submissionView as $views) {
            if ($views->views === '0') {
                $notif = true;
            } else if ($views->views === '1') {
                $notif = false;
            }
        }
        return view('admin.report', ['notif' => $notif]);
    }

    /**
     * generate Pdf Report
     * @return View reportPdf
     */
    public function reportPdf(Request $request)
    {

        if (!empty($request->from_date)) {
            //Jika tanggal awal(from_date) hingga tanggal akhir(to_date) adalah sama maka
            if ($request->from_date === $request->to_date) {
                //kita filter tanggalnya sesuai dengan request from_date
                $submissions  = DB::table('users')
                    ->join('submissions', 'users.nik', '=', 'submissions.nik')
                    ->where('submissions.status', 'Disetujui')
                    ->whereDate('submissions.updated_at', '=', $request->from_date)
                    ->get();
                $date = 'Pada ' . Carbon::parse($request->from_date)->isoFormat('dddd, D MMMM Y');
            } else {
                //kita filter dari tanggal awal ke akhir
                $submissions  = DB::table('users')
                    ->join('submissions', 'users.nik', '=', 'submissions.nik')
                    ->where('submissions.status', 'Disetujui')
                    ->whereBetween('submissions.updated_at', array($request->from_date, $request->to_date))
                    ->get();
                $date = 'Pada ' . Carbon::parse($request->from_date)->isoFormat('dddd, D MMMM Y') . ' Sampai ' . Carbon::parse($request->to_date)->isoFormat('dddd, D MMMM Y');
            }
        } else {
            $submissions  = DB::table('users')
                ->join('submissions', 'users.nik', '=', 'submissions.nik')
                ->where('submissions.status', 'Disetujui')
                ->get();
            $date = '';
        }

        $pdf = PDF::loadView('admin.reportPdf', ['submissions' => $submissions, 'date' => $date]);
        return $pdf->stream('Laporan Pengajuan Dokumen Kependudukan.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $submissions = Submission::where('id', $id)->get();
        $submission = Submission::find($id);
        $user = User::where('nik', $submission->nik)->get();
        $submissionView = Submission::where('level', 'desa')->get();
        foreach ($submissionView as $views) {
            if ($views->views === '0') {
                $notif = true;
            } else if ($views->views === '1') {
                $notif = false;
            }
        }

        return view('admin.detailSubmissions', ['submissions' => $submissions, 'user' => $user, 'notif' => $notif]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    // Are RT





    // Area RW
}
