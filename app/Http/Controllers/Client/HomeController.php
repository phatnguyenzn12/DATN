<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
       
        $courses = Course::select('*');
        if(auth()->user()){
            $courses_id = auth()->user()->load('courses')->courses->pluck('id')->toArray();
            $courses = $courses->whereNotIn('id',$courses_id);
        }
        $courses =  $courses->get();

        $courses->transform(
            function (Course $course) {
                return [
                    ...$course->toArray(),
                    ...['chapter' => $course->chapters->count()],
                    ...['lesson' => $course->lessons->count()]
                ];
            }
        )->toJson();

        $courses = json_decode($courses);

        return view('screens.client.home', compact('courses'));
    }
}
