<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Course $course)
    {
        if($course->users()->first()->id == auth()->user()->id){
            $chapters = $course->chapters;
            return view('screens.client.lesson.exercise', compact('course','chapters'));
        }else {
            return redirect()->back();
        }
    }

    public function watch()
    {

    }

    public function exercise()
    {

    }
}
