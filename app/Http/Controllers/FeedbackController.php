<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function feedback(Request $request){
        Feedback::create($request->all());
        return redirect()->route('contact');
    }

    public function ShowFeedback(Request $request){
        $data = Feedback::all();
        return view('feedback.ShowFeedback', compact('data'));
    }
}
