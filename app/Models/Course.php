<?php

namespace App\Models;

use App\helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'starting_date',
        'ending_date',
        'fee',
        'short_description',
        'long_description',
        'image',
        'status',
    ];

    public static function saveCourseData($request, $id = null)
    {
        Course::updateOrCreate(['id' => $id],[
            'title' => $request->title,
            'starting_date' => $request->starting_date,
            'ending_date' => $request->ending_date,
            'fee' => $request->fee,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => Helper::uploadImage($request->file('image'), 'admin-course/img/', isset($id) ? Course::where('id', $id)->first()->image : null),
            'status' => $request->status,
        ]);
    }
}
