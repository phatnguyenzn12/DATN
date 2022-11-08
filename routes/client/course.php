<?php

use App\Http\Controllers\Client\CommentCourseController;
use App\Http\Controllers\Client\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('course')->name('client.course.')->controller(CourseController::class)->group(
    function () {
        Route::get('{course1}','show')->name('show')->where([
            'course1' => '\d+'
        ]);
    }
);
Route::name('commentcourse.')->controller(CommentCourseController::class)->group(
    function () {
        Route::post('store',  'store')->name('store');


    }
);
