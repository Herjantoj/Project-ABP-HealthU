<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AboutController extends Controller
{
    public function HomePage() {
        
    }

    public function ContactPage() {
        return view('homepage.contact');
    }

    public function AppointmentPage() {
        $appointment = Appointment::with(['user'])->where('user_id',auth()->user()->user_id)->where('status', 1)->latest('created_at', 'desc')->first();
        return view('homepage.appointment', compact('appointment'));
    }

    public function RegistrasiPage() {
        return view('homepage.registrasi');
    }

    public function LoginPage() {
        return view('homepage.login');
    }
}
