<?php

use App\Http\Controllers\Client\CommentLessonController;
use App\Http\Controllers\Client\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix('lesson')->name('client.lesson.')->controller(LessonController::class)->group(
    function () {
        Route::get('lesson-{course}','index')->name('index');
    }
);
Route::name('exercise.')->controller(LessonController::class)->group(
    function () {
        Route::get('detail/{id}', 'detail')->name('detail');

    }
);

Route::name('exercise.')->controller(CommentLessonController::class)->group(
    function () {
        Route::post('storecmt',  'store')->name('storecmt');
        Route::post('reply/{id_comment}', 'reply')->name('reply');

    }
);
