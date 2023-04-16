<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date',
            'time' => 'required',
        ]);
    
        // Format date value as 'YYYY-MM-DD'
        $date = date('Y-m-d', strtotime($validatedData['date']));
        // Format time value as 'HH:MM:SS'
        $time = date('H:i:s', strtotime($validatedData['time']));
    
        // Create a new appointment record
        Appointment::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'date' => $date,
            'time' => $time,
            'updated_at' => now(),
            'created_at' => now()
        ]);

        return redirect()->route('appointment.index')->with('success', 'Appointment Berhasil Dibuat');
    }

    public function index(){
        $events = array();
        $bookings = Appointment::all();
        foreach($bookings as $booking){
            $events[] = [
                'name' => $booking->name,
                'email' => $booking->email,
                'date' => $booking->date,
                'time' => $booking->time,
            ];
        };
        return view('appointment.index', ['events' => $events]);
    }
}
