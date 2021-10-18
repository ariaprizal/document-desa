<?php

namespace App\Http\Controllers;

use App\Models\Submission as ModelsSubmission;
use App\Models\User;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  Show View Login
    public function indexLogin()
    {
        return view('auth.login');
    }

    // Shoe View Registrasi
    public function indexRegister()
    {
        return view('auth.register');
    }

    // Login Process
    public function loginProcess(Request $request)
    {

        $credentials = $request->validate([
            'nik' => ['required'],
            'password' => ['required'],
        ]);
        $remember_me = $request->has('remember') ? true : false;
        if (Auth::attempt($credentials, $remember_me)) {
            $user = Auth::user();
            if ($user->is_admin == '1') {
                return redirect()->intended('/admin/dashboard');
            } else if ($user->is_admin == '0') {
                return redirect()->intended('/user/dashboard');
            } else if ($user->is_admin == '2') {
                return redirect()->intended('/rt/list');
            } else if ($user->is_admin == '3') {
                return redirect()->intended('/rw/list');
            }
            $request->session()->regenerate();
        }

        return redirect('login')->with(
            'error',
            'NIK atau Password salah',
        );
    }


    // Logout Function\
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

    // Registrasi
    public function registrasi(Request $request)
    {
        $request->validate([
            'nik' => ['required'],
            'password' => ['required'],
            'tlp' => ['required'],
        ]);

        $nik = $request->nik;

        $user = User::where('nik', $nik)->get();
        if (count($user) > 0) {
            User::where('nik', $nik)->update([
                'password' => bcrypt($request->password),
                'tlp' => $request->tlp
            ]);
            return redirect('/login')->with(
                'error',
                'Akun Telah dibuat Silahkan Login',
            );
        } else {
            return redirect('/register')->with(
                'error',
                'NIK tidak Terdaftar',
            );
        }
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
