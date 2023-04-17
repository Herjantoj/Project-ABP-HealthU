<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function appointment(Request $request)
    {
        $request->validate([
            'appointment_name' => 'required',
            'appointment_email' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
        ]);

        $new_appointment = new Appointment;
        $new_appointment->name = $request->appointment_name;
        $new_appointment->email = $request->appointment_email;
        $new_appointment->date = $request->appointment_date;
        $new_appointment->time = $request->appointment_time;

        if ($new_appointment->save) {
            
        }
    }
}