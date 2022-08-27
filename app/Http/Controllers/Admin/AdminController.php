<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enroll;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manage()
    {
        return view('admin.enroll.manage', [
            'enrolls' => Enroll::latest()->get(),
        ]);
    }


    public function delete($id)
    {
        Enroll::find($id)->delete();
        return redirect()->back()->with('message', 'Enroll deleted successfully');
    }

    public function changeStatus ($id)
    {
        $enrolls = Enroll::find($id);
        if ($enrolls->payment_status == 'pending')
        {
            $enrolls->payment_status = 'complete';
        }
        elseif ($enrolls->payment_status == 'complete')
        {
            $enrolls->payment_status = 'pending';
        }
        $enrolls->save();
        return back()->with('message', 'Enroll status changed successfully');
    }
}
