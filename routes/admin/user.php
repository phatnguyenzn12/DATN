<?php

use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/user')->name('admin.user.')->middleware('auth','permission.check:admin|mentor')->controller(UserController::class)->group(
    function () {
        Route::get('/index','index')->name('index');
        Route::get('/list-data/{search?}/{record?}','filterData')->name('listData');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/detail/{id}', 'detail')->name('detail');
        Route::get('/update/{id}', 'update')->name('update');
        Route::post('/saveUpdate/{id}', 'saveUpdate')->name('saveUpdate');
    }
);