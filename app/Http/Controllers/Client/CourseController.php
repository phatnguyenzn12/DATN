<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::select('*')->paginate(5);
        return view('screens.client.course.list',compact('courses'));
    }

    public function show($course1,Course $course)
    {
        $cou = Course::find($course1);
        // dd($cou);
        $comments = $course->commentCourses()->get();
        // dd($cou->commentCourses);
        return view('screens.client.course.intro', compact('course', 'comments', 'cou'));
    }
}
