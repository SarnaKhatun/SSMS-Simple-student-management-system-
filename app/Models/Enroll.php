<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Enroll extends Model
{
    use HasFactory;

    protected static $enroll;

    public static function createEnroll($request)
    {
       self::$enroll = new Enroll();
       self::$enroll->course_id = $request->course_id;
       self::$enroll->user_id = Auth::id();
       self::$enroll->enroll_date = Carbon::now()->format('d-m-Y');
       self::$enroll->payment_method = 1;
       self::$enroll->payment_status = 'pending';
       self::$enroll->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
