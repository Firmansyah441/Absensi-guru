<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.auth');
    }

    public function ceklogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $level = Auth::user()->role_id;
            if ($level == 1) {
                toast('Success Toast','success');
                return redirect()->intended('/admin/dashboard');
            } elseif ($level == 2) {
                toast('Success Toast','success');
                return redirect()->intended('/guru/dashboard');
            }elseif ($level == 3) {
                toast('Success Toast','success');
                return redirect()->intended('/kepsek/dashboard');
            }
            else {
            Session::flash('error', 'Hak akses tidak dikenali.');
            return redirect('/login');
        }
        }
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
