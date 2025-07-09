<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function(){
    return redirect('/admin/dashboard');
});
//Trang chu
Route::get('/admin/dashboard', function(){
    return view('dashboard');
});
//Dang nhap
Route::get('/login', function(){
    return view('login');
});

Route::prefix('admin')->group(function(){
    //Quan ly sinh vien
    Route::prefix('students')->group(function(){
        Route::get('/', [StudentController::class, 'index']);
        Route::get('/create', [StudentController::class, '']);
        Route::get('{id}/edit', [StudentController::class, '']);
        //Khong the goi method la private
        Route::get('/privateStudent', [StudentController::class, 'privatefunc']);
        //Test basic CRUD
        Route::get('/testdb', function(){
            return Student::all();
        });
        Route::get('/create_test', [StudentController::class, 'create']);
        Route::get('/edit_test/{id}', [StudentController::class, 'edit']);
        Route::get('/delete_test/{id}', [StudentController::class, 'delete']);
        //Show chi tiet mot hoc sinh
        Route::get('/{id}', [StudentController::class, 'show']);
    });
    //Quan ly lop hoc
    Route::prefix('classes')->group(function(){
        Route::get('/', function () {
            return 'Danh sach lop hoc';
        });
        Route::get('create', function () {
            return 'Them lop hoc';
        });
        Route::get('{id}/edit', function ($id) {
            return 'Sua lop hoc id: ' . $id;
        });
    });
    //Quan ly mon hoc
    Route::prefix('subjects')->group(function(){
        Route::get('/', function () {
            return 'Danh sach mon hoc';
        });
        Route::get('create', function () {
            return 'Them mon hoc';
        });
        Route::get('{id}/edit', function ($id) {
            return 'Sua mon hoc id: ' . $id;
        });
    });
    Route::prefix('grades')->group(function(){
        //Quan ly diem
        Route::get('/', function () {
            return 'Danh sach diem';
        });
        Route::get('create', function () {
            return 'Nhap diem';
        });
        Route::get('student/id/grades', function () {
            return 'Danh sach diem cua 1 sinh vien';
        });
        Route::get('{id}/edit', function ($id) {
            return 'Chinh sua diem id: ' . $id;
        });
    });
});

//404
Route::fallback(function(){
    return 'This page is not found please try again!';
});