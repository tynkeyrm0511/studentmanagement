<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;


//Trang chu
Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard', [
        'studentsCount' => Student::count(),
        'classesCount' => Classes::count(),
        'subjectsCount' => Subject::count()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');
//Dang xuat
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
    //Quan ly lop hoc
    Route::prefix('classes')->group(function () {
        Route::get('/', [ClassesController::class, 'index'])->name('classes.index');

        Route::get('/add', function () {
            return view('classes.add');
        })->name('classes.add');
        Route::post('/create', [ClassesController::class, 'create'])->name('classes.create');

        Route::get('/edit/{id}', [ClassesController::class, 'edit'])->name('classes.edit');
        Route::post('/update/{id}', [ClassesController::class, 'update'])->name('classes.update');

        Route::delete('/delete/{id}', [ClassesController::class, 'destroy'])->name('classes.delete');
    });
    //Quan ly mon hoc
    Route::prefix('subjects')->group(function () {
        Route::get('/', [SubjectsController::class, 'index'])->name('subjects.index');

        Route::get('/add', [SubjectsController::class, 'add'])->name('subjects.add');
        Route::post('/create', [SubjectsController::class, 'create'])->name('subjects.create');

        Route::get('/edit/{id}', [SubjectsController::class, 'edit'])->name('subjects.edit');
        Route::post('/update/{id}', [SubjectsController::class, 'update'])->name('subjects.update');

        Route::delete('/delete/{id}', [SubjectsController::class, 'destroy'])->name('subjects.delete');
    });
    //Quan ly diem
    Route::prefix('grades')->group(function () {
        //Chon mon va lop muon nhap diem
        Route::get('/select', [GradesController::class, 'select'])->name('grades.select');
        //Hien thi danh sach diem theo lop va mon
        Route::get('/', [GradesController::class, 'index'])->name('grades.index');
        //Nhap va sua diem
        Route::post('/', [GradesController::class, 'store'])->name('grades.store');
    });
});
//404
Route::fallback(function () {
    return view('404');
});
require __DIR__ . '/auth.php';
