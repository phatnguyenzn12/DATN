<?php

use App\Http\Controllers\Admin\CateCourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/cate-course')->name('admin.cate-course.')->middleware('auth','permission.check:admin|mentor')->controller(CateCourseController::class)->group(
    function () {
        Route::get('','index')->name('index');
        Route::get('create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('{id}/edit','edit')->name('edit');
        Route::put('{id}/edit','update')->name('update');
        Route::delete('{id}/delete', 'destroy')->name('delete');
    }
);
