<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AboutController extends Controller
{
    public function HomePage() {
        return view('homepage.index');
    }

    public function ContactPage() {
        return view('homepage.contact');
    }

    public function AppointmentPage() {
        return view('homepage.appointment');
    }

    public function RegistrasiPage() {
        return view('homepage.registrasi');
    }


    public function LoginPage() {
        return view('homepage.login');
    }
}
