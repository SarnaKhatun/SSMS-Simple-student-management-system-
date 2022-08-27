<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollController extends Controller
{
    public function enroll (Request $request)
    {
        if (Auth::check())
        {
           if (Auth::user()->access_label == 0)
           {
               Enroll::createEnroll($request);
               return back()->with('message', 'U enrolled this course successfully');
           }
           else {
               return back()->with('error', 'Only student can enrolled');
           }
        }
        else {
            return redirect('/login')->with('error', 'u must login first then enroll this course');
        }
    }
}
