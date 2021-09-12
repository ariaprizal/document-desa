<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\User;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($value)
    {
        // Document Name
        if ($value == 'domisili') {
            $docName = 'Surat Keterangan Domisili';
        } else if ($value == 'skck') {
            $docName = 'Surat Pengantar SKCK';
        } else if ($value == 'sktm') {
            $docName = 'Surat Keterangan Tidak Mampu';
        } else if ($value == 'sku') {
            $docName = 'Surat Keterangan Usaha';
        } else if ($value == 'bedanama') {
            $docName = 'Surat Keterangan Beda Nama';
        } else if ($value == 'penghasilan') {
            $docName = 'Surat Keterangan Penghasilan';
        } else if ($value == 'kehilangan') {
            $docName = 'Surat Keterangan Kehilangan';
        } else if ($value == 'keramaian') {
            $docName = 'Surat Izin Keramaian';
        }
        return view('users.createDocument', ['value' => $docName]);
    }

    // Show History Submissin
    public function history(Request $request)
    {
        // $submissions = Submission::where('nik', Auth::user()->nik)->get();
        $submissions = DB::table('submissions')->get();
        if ($request->ajax()) {
            return DataTables()->of($submissions)
                ->addColumn('action', function ($data) {
                    if ($data->status === 'Proses') {
                        $button = '';
                    } else if ($data->status === 'Disetujui') {
                        $button = route('download-pdf', $data->id);
                        $button = '<a href="' . $button . '"" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="bx bxs-download"></i>Download File</a>';
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

        return view('users.history', ['submissions' => $submissions]);
    }

    /**
     * Download pdf Document
     * @return Dompdf
     */
    public function downloadPdf($id)
    {
        $submission = Submission::where('id', $id)->get();
        $submissions = Submission::find($id);
        $user = User::where('nik', $submissions->nik)->get();

        $pdf = PDF::loadview('templateDocument', ['submission' => $submission, 'user' => $user]);
        return $pdf->download('document-pengajuan.pdf');
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
        $validator = Validator::make($request->all(), [
            'id_pengajuan' => ['required'],
            'no_surat' => ['required'],
            'jenis_surat' => ['required'],
            'nik' => ['required'],
            'ktp' => ['required'],
            'kk' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Silahkan Isi Semua Data Terlebih Dahulu');
        }

        $input = $request->all();

        if ($input['jenis_surat'] == 'Surat Keterangan Domisili') {
            $jenisSurat = Submission::where('jenis_surat', $input['jenis_surat'])->get();
            $noSurat = '/0' . count($jenisSurat) + 1;
            $input['no_surat'] = $input['no_surat'] . $noSurat;
        } else if ($input['jenis_surat'] == 'Surat Keterangan Usaha') {
            $jenisSurat = Submission::where('jenis_surat', $input['jenis_surat'])->get();
            $noSurat = '/0' . count($jenisSurat) + 1;
            $input['no_surat'] = $input['no_surat'] . $noSurat;
        } else if ($input['jenis_surat'] == 'Surat izin Keramaian') {
            $jenisSurat = Submission::where('jenis_surat', $input['jenis_surat'])->get();
            $noSurat = '/0' . count($jenisSurat) + 1;
            $input['no_surat'] = $input['no_surat'] . $noSurat;
        } else if ($input['jenis_surat'] == 'Surat Keterangan Tidak Mampu') {
            $jenisSurat = Submission::where('jenis_surat', $input['jenis_surat'])->get();
            $noSurat = '/0' . count($jenisSurat) + 1;
            $input['no_surat'] = $input['no_surat'] . $noSurat;
        } else if ($input['jenis_surat'] == 'Surat Keterangan Beda Nama') {
            $jenisSurat = Submission::where('jenis_surat', $input['jenis_surat'])->get();
            $noSurat = '/0' . count($jenisSurat) + 1;
            $input['no_surat'] = $input['no_surat'] . $noSurat;
        } else if ($input['jenis_surat'] == 'Surat Keterangan Kehilangan') {
            $jenisSurat = Submission::where('jenis_surat', $input['jenis_surat'])->get();
            $noSurat = '/0' . count($jenisSurat) + 1;
            $input['no_surat'] = $input['no_surat'] . $noSurat;
        } else if ($input['jenis_surat'] == 'Surat Keterangan Penghasilan') {
            $jenisSurat = Submission::where('jenis_surat', $input['jenis_surat'])->get();
            $noSurat = '/0' . count($jenisSurat) + 1;
            $input['no_surat'] = $input['no_surat'] . $noSurat;
        } else if ($input['jenis_surat'] == 'Surat Pengantar SKCK') {
            $jenisSurat = Submission::where('jenis_surat', $input['jenis_surat'])->get();
            $noSurat = '/0' . count($jenisSurat) + 1;
            $input['no_surat'] = $input['no_surat'] . $noSurat;
        }

        $imageKtp = $request->file('ktp');
        $destinationPath = 'submissions/image/ktp';
        $profileImageKtp = date('YmdHis') . "." . $imageKtp->getClientOriginalExtension();
        $imageKtp->move($destinationPath, $profileImageKtp);
        $input['ktp'] = "$profileImageKtp";

        $imageKk = $request->file('kk');
        $destinationPath = 'submissions/image/kk';
        $profileImageKk = date('YmdHis') . "." . $imageKk->getClientOriginalExtension();
        $imageKk->move($destinationPath, $profileImageKk);
        $input['kk'] = "$profileImageKtp";


        Submission::create($input);


        return redirect()->back()->with('success', 'Pengajuan Berhasil Dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
