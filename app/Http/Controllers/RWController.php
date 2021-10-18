<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RWController extends Controller
{

    public function listRw(Request $request)
    {

        $submission = DB::table('submissions')->where('level', 'rw')->get();
        $getRw = '';
        foreach ($submission as $submit) {
            $rw = DB::table('users')
                ->where('nik', $submit->nik)
                ->where('dusun', Auth::user()->dusun)
                ->where('rw', Auth::user()->rw)
                ->get();
                
            foreach ($rw as $r) {
                $getRw = $r->nik;
            }
        }

        if ($request->ajax()) {
            if ($request->filter_type != '' && $request->filter_validation == '') {
                $submissions = DB::table('Submissions')
                    ->where('level', 'rw')
                    ->where('nik', $getRw)
                    ->where('jenis_surat', $request->filter_type)
                    ->orderBy('status', 'DESC')
                    ->get();
            } else if ($request->filter_type == '' && $request->filter_validation != '') {
                $submissions = DB::table('Submissions')
                    ->where('level', 'rw')
                    ->where('nik', $getRw)
                    ->where('status', $request->filter_validation)
                    ->orderBy('status', 'DESC')
                    ->get();
            } else if ($request->filter_type != '' && $request->filter_validation != '') {
                $submissions = DB::table('Submissions')
                    ->where('level', 'rw')
                    ->where('nik', $getRw)
                    ->where('status', $request->filter_validation)
                    ->where('jenis_surat', $request->filter_type)
                    ->orderBy('status', 'DESC')
                    ->get();
            } else {
                $submissions = DB::table('Submissions')
                    ->where('level', 'rw')
                    ->where('nik', $getRw)
                    ->orderBy('status', 'DESC')->get();
            }
            return DataTables()->of($submissions)
                ->addColumn('action', function ($data) {

                    if ($data->status === 'Proses') {
                        $button = route('detail-rw', $data->id);
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


        $submissionView = Submission::all();
        Submission::where('views', '1')->update(['views' => '0']);
        foreach ($submissionView as $views) {
            if ($views->views === '1') {
                $notif = true;
            } else if ($views->views === '0') {
                $notif = false;
            }
        }
        return view('rw.list', ['notif' => $notif]);
    }


    public function detailRw($id)
    {
        $submissions = Submission::where('id', $id)->get();
        $submission = Submission::find($id);
        $user = User::where('nik', $submission->nik)->get();

        return view('rw.detail', ['submissions' => $submissions], ['user' => $user]);
    }


    // ---------------------------------------------------------------------------
    public function validation($id, $level)
    {
        $submission = Submission::where('id', $id)->get();

        if (count($submission) > 0) {
            if ($level === '0') {
                Submission::where('id', $id)->update([
                    'status' => 'Ditolak'
                ]);
            } else if ($level === 'desa') {
                Submission::where('id', $id)->update([
                    'level' => $level
                ]);

                return redirect('/rw/list')->with(
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
