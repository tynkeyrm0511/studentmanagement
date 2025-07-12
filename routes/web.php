<?php

use App\Http\Controllers\ClassesController;
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
//Quan ly sinh vien
Route::prefix('/students')->group(function () {
    //read
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    //create
    Route::get('/add', [StudentController::class, 'add'])->name('students.add');
    Route::post('create', [StudentController::class, 'create'])->name('students.create');
    //update
    Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::post('/update/{id}', [StudentController::class, 'update'])->name('students.update');
    //delete
    Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('students.delete');
});
//Quan ly sinh vien
Route::prefix('classes')->group(function(){
    Route::get('/',[ClassesController::class, 'index'])->name('classes.index');

    Route::get('/add', function(){return view('classes.add');})->name('classes.add');
    Route::post('/create', [ClassesController::class, 'create'])->name('classes.create');
    
    Route::get('/edit/{id}', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::post('/update/{id}', [ClassesController::class, 'update'])->name('classes.update');

    Route::delete('/delete/{id}', [ClassesController::class, 'destroy'])->name('classes.delete');
});
//404
Route::fallback(function () {
    return view('404');
});
