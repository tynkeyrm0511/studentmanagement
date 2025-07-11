<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/dashboard');
});
//Trang chu
Route::get('/dashboard', function () {
    return view('dashboard');
});
//Dang nhap
Route::get('/login', function () {
    return view('login');
});

Route::prefix('/students')->group(function () {
    Route::get('/', [StudentController::class, 'index']);
    Route::get('/add', [StudentController::class, 'add']);
    Route::post('create', [StudentController::class, 'create']);
});

//404
Route::fallback(function () {
    return view('404');
});
