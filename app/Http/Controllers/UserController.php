<?php

namespace App\Http\Controllers;

use App\Models\Submission as ModelsSubmission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Submission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $submisssions = count(DB::table('submissions')->get());
        $submisssions =count(ModelsSubmission::where('nik', Auth::user()->nik)->get());

        // Count Every Submissions
        $domisili = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Keterangan Domisili')
            ->where('nik', Auth::user()->nik)
            ->get());
        $skck = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Pengantar SKCK')
            ->where('nik', Auth::user()->nik)
            ->get());
        $sktm = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Keterangan Tidak Mampu')
            ->where('nik', Auth::user()->nik)
            ->get());
        $sku = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Keterangan Usaha')
            ->where('nik', Auth::user()->nik)
            ->get());
        $bedaNama = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Keterangan Beda Nama')
            ->where('nik', Auth::user()->nik)
            ->get());
        $penghasilan = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Keterangan Penghasilan')
            ->where('nik', Auth::user()->nik)
            ->get());
        $kehilangan = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Keterangan Kehilangan')
            ->where('nik', Auth::user()->nik)
            ->get());
        $keramaian = count(DB::table('submissions')
            ->where('jenis_surat', 'Surat Izin Keramaian')
            ->where('nik', Auth::user()->nik)
            ->get());
        return view('users.dashboard', [
            'submissions' => $submisssions,
            'domisili' => $domisili,
            'skck' => $skck,
            'sktm' => $sktm,
            'sku' => $sku,
            'bedaNama' => $bedaNama,
            'penghasilan' => $penghasilan,
            'kehilangan' => $kehilangan,
            'keramaian' => $keramaian,
        ]);
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
