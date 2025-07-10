<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request){
        //Neu co request thi chay whereAny
        // $students = Student::when($request->search, function($query)use($request){
        //     return $query->whereAny([
        //         'name',
        //         'gender',
        //         'dob',
        //         'email',
        //         'phone',
        //         'class_id'
        //     ],'like', '%' . $request->search . '%');
        // })//Neu khong co request thi bo qua whereAny -> lay toan bo
        // ->get();
        //if
        if($request->search){
            $students = Student::whereAny([
                'name',
                'gender',
                'dob',
                'email',
                'phone',
                'class_id'
            ], 'like', '%'.$request->search.'%')->paginate(10);
        }else{
            $students = Student::paginate(10);
        }
        return view('students.index', compact('students'));
    }
    public function create(){
        $s = new Student;
        $s->name = 'testcreate';
        $s->gender = 'male';
        $s->dob = '2001-09-09';
        $s->email = 'testemail@gmail.com';
        $s->phone = '01234456789';
        $s->class_id = 3;
        $s->save();
    }
    public function edit($id){
        $s = Student::find($id);
        $s->name = 'testedit';
        $s->gender = 'female';
        $s->dob = '2001-09-09';
        $s->email = 'testemail@gmail.com';
        $s->phone = '1111111111';
        $s->class_id = 1;
        $s->update();
    }
    public function delete($id){
        $s = Student::findOrFail($id);
        $s->delete();
    }
    public function whereCondition(){
        //AND
            //Old Laravel
        $s=Student::where('gender', '=', 'male')
            ->where('class_id', '=', 3)
            ->get();
            //Laravel 10.47+
        $a=Student::whereAll([
            ['gender', '=', 'male'],
            ['class_id', '=', 3]
        ]);
        //OR
            //Old Laravel
        $t=Student::where('gender', '=', 'female')
            ->orWhere('class_id', '=', 1)
            ->get();
            //Laravel 10.47+
        $b=Student::whereAny([
            ['gender', '=', 'female'],
            ['class_id', '=', 1]
        ]);

        //Tra ve score >= 80 va age khong thuoc khoang 20-30
        //Cach 1
        $u=Student::where('score', '>=', 80)
            ->where(function($query){
                $query->where('age', '<', 20)
                        ->orWhere('age', '>', 30);
            })->get();
            //Cach 2
        $d=Student::whereNotBetween('score', '>=80')
            ->whereNotBetween('age', [20, 30])
            ->get();

        //Tra ve score >= 80 va age thuoc khoang 20-30
            //Cach 1
        $v = Student::where('score', '>=', 80)
            ->where(function ($query) {
                $query->where('age', '>=', 20)
                    ->orWhere('age', '<=', 30);
            })->get();
            //Cach 2
        $n=Student::where('score', '>=', 80)
            ->whereBetween('age', [20, 30])
            ->get();
        
    }

    //Query Scopes
    public function queryScope(){
        $k=Student::male()
        ->where('id',1)
        ->get();
        return $k;
    }

    //Soft delete & restore delete records -> Xóa tạm thời và có thể khôi phục
    public function softDelete($id){
        $sd=Student::findOrFail($id)->delete(); // Soft delete - xóa mềm
        Student::withTrashed()->findOrFail($id)->restore(); // Restore delete - khôi phục
    }
    //Force delete -> Xóa vĩnh viễn khỏi DB
    public function forceDelete($id){
        $sd = Student::findOrFail($id)->forceDelete(); // Force delete - xóa hoàn toàn khỏi DB
    }
};
