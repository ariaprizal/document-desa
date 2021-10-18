<?php

namespace App\Http\Controllers;

use App\Models\Submission as ModelsSubmission;
use App\Models\User;
use App\Models\Sumbissions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Submission;

// use Submission;

class RTController extends Controller
{
    public function indexRt()
    {
        
        return view('rt.dashboard');
    }
    public function listRT(Request $request)
    {

        $submission = DB::table('submissions')->where('level', 'rt')->get();
        $getRt = '';
        foreach ($submission as $submit) {
            $rt = DB::table('users')
                ->where('nik', $submit->nik)
                ->where('alamat', Auth::user()->alamat)
                ->get();
            foreach ($rt as $r) {
                $getRt = $r->nik;
            }
            
        }

        if ($request->ajax()) {
            if ($request->filter_type != '' && $request->filter_validation == '') {
                $submissions = DB::table('Submissions')
                    ->where('level', 'rt')
                    ->where('nik', $getRt)
                    ->where('jenis_surat', $request->filter_type)
                    ->orderBy('status', 'DESC')
                    ->get();
            } else if ($request->filter_type == '' && $request->filter_validation != '') {
                $submissions = DB::table('Submissions')
                    ->where('level', 'rt')
                    ->where('nik', $getRt)
                    ->where('status', $request->filter_validation)
                    ->orderBy('status', 'DESC')
                    ->get();
            } else if ($request->filter_type != '' && $request->filter_validation != '') {
                $submissions = DB::table('Submissions')
                    ->where('level', 'rt')
                    ->where('nik', $getRt)
                    ->where('status', $request->filter_validation)
                    ->where('jenis_surat', $request->filter_type)
                    ->orderBy('status', 'DESC')
                    ->get();
            } else {
                $submissions = DB::table('Submissions')
                    ->where('level', 'rt')
                    ->where('nik', $getRt)
                    ->orderBy('status', 'DESC')->get();
            }
            return DataTables()->of($submissions)
                ->addColumn('action', function ($data) {

                    if ($data->status === 'Proses') {
                        $button = route('detail-rt', $data->id);
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


        $submissionView = ModelsSubmission::all();
        ModelsSubmission::where('views', '1')->update(['views' => '0']);
        foreach ($submissionView as $views) {
            if ($views->views === '1') {
                $notif = true;
            } else if ($views->views === '0') {
                $notif = false;
            }
        }
        return view('rt.list', ['notif' => $notif]);
    }


    public function detailRt($id)
    {
        $submissions = ModelsSubmission::where('id', $id)->get();
        $submission = ModelsSubmission::find($id);
        $user = User::where('nik', $submission->nik)->get();

        return view('rt.detail', ['submissions' => $submissions], ['user' => $user]);
    }


    // ---------------------------------------------------------------------------
    public function validation($id, $level)
    {
        $submission = ModelsSubmission::where('id', $id)->get();

        if (count($submission) > 0) {
            if ($level === '0') {
                ModelsSubmission::where('id', $id)->update([
                    'status' => 'Ditolak'
                ]);
            } else if ($level === 'rw') {
                ModelsSubmission::where('id', $id)->update([
                    'level' => $level
                ]);

                return redirect('/rt/list')->with(
                    'success',
                    'Status Validasi Telah Diubah',
                );
            }
        } else {
            return redirect('/rt/list')->with(
                'error',
                'Gagal Melakukan Validasi',
            );
        }
    }
}
