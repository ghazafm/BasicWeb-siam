<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('masuk');
});

Route::get('/page', [StudentController::class, 'home']);
Route::get('/page/about', [StudentController::class, 'about']);
Route::get('/page/contact', [StudentController::class, 'contact']);

Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/add', [StudentController::class, 'add']);
Route::post('/student/addsave', [StudentController::class, 'addsave']);
Route::get('/student/edit/{nim}', [StudentController::class, 'edit']);
Route::post('/student/editsave', [StudentController::class, 'editsave']);
Route::get('/student/delete/{nim}', [StudentController::class, 'delete']);
Route::get('/student/search', [StudentController::class, 'search']);