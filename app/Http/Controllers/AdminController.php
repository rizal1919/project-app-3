<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function authenticate(Request $request){

        // dd($request->collect());

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        // dd($credentials);
        // dd(Auth::guard('administrator')->attempt($credentials));

        if( Auth::guard('administrator')->attempt($credentials) ){

            $request->session()->regenerate();
 
            return redirect()->intended('/perdin');
        }

        return back()->with('loginError', 'Login Gagal! ');
    }

    public function logout(Request $request)
    {
        

        Auth::guard('administrator')->logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/')->with('logoutSuccess', 'Logout berhasil!');
    }

    public function pendaftaranBaru(){
        return view('login.registration');
    }

    public function simpanPendaftaranBaru(Request $request){

        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $validatedData['password'] = \Illuminate\Support\Facades\Hash::make($validatedData['password']);

        Admin::create($validatedData);

        return redirect('/')->with('success','Pendaftaran Berhasil!');
    }
}
