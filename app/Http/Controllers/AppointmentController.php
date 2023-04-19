<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
        ]);
    
        // Format date value as 'YYYY-MM-DD'
        $date = date('Y-m-d', strtotime($validatedData['date']));
        // Format time value as 'HH:MM:SS'
        $time = date('H:i:s', strtotime($validatedData['time']));
    
        // Create a new appointment record
        Appointment::create([
            'user_id' => auth()->user()->user_id,
            'date' => $date,
            'time' => $time,
        ]);

        return redirect()->route('appointment.index')->with('success', 'Appointment Berhasil Dibuat');
    }

    public function index(){
        $events = array();
        $bookings = Appointment::all();
        foreach($bookings as $booking){
            $events[] = [
                'date' => $booking->date,
                'time' => $booking->time,
            ];
        };
        return view('appointment.index', ['events' => $events]);
    }

    public function show(){
        $appointment = Appointment::with(['user'])->where('user_id',auth()->user()->user_id)->latest('created_at', 'desc')->first();
        return view('appointment.index', compact('appointment'));
    }

}
