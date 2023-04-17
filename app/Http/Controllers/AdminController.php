<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function LoginAdmin(){
        return view('admin.loginAdmin');
    }

    public function RegisterAdmin(){
        return view('admin.registerAdmin');
    }

    public function SaveRegisterAdmin(Request $request){
        Admin::create([
            'name_admin' => $request->name_admin,
            'email_admin' => $request->email_admin,
            'password_admin' => bcrypt($request->password_admin),
            'remember_token' => Str::random(60),
        ]);
        return redirect('/LoginAdmin');
    }

    public function LoginProses(Request $request){
        $email_admin = $request->input('email_admin');
        $password_admin = $request->input('password_admin');

        $user = Admin::where('email_admin', $email_admin)->first();

        if ($user && Hash::check($password_admin, $user->password_admin)) {
            // Akses diberikan
            Auth::login($user);
            return redirect()->intended('/dokter');
        } else {
            // Akses ditolak
            return redirect()->back()->with('error', 'Email atau password salah');
        }
    }

    public function LogoutAdmin(){
        Auth::logout();
        return redirect('/Home');
    }
}
