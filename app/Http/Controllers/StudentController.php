<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentAddRequest;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //index HTTP_GET VIEW
    public function index(Request $request){
        if($request->search){
            $students = Student::whereAny([
                'id',
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
        $classes = Classes::all();
        return view('students.index', compact('students', 'classes'));
    }
    //fill data to Add Form HTTP_GET VIEW
    public function add(){
        $classes = Classes::all();
        return view('students.add', compact('classes'));
    }
    //create HTTP_POST
    public function create(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
            'phone' => 'required|string|max:255',
            'class_id' => 'integer|min:1|max:20',
        ]);
        $students = new Student();
        $students->name = $request->name;
        $students->gender = $request->gender;
        $students->dob = $request->dob;
        $students->email = $request->email;
        $students->phone = $request->phone;
        $students->class_id = $request->class_id;
        $students->save();

        return redirect()->route('students.index');
    }
    //edit HTTP_GET
    public function edit($id){
        $students = Student::findOrFail($id);
        $classes = Classes::all();
        return view('students.edit', compact('students','classes'));
    }
    //update HTTP_POST
    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date',
            'phone' => 'required|string|max:255',
            'class_id' => 'integer|min:1|max:20',
        ]);

        $students = Student::findOrFail($id);
        $students->name = $request->name;
        $students->gender = $request->gender;
        $students->dob = $request->dob;
        $students->email = $request->email;
        $students->phone = $request->phone;
        $students->class_id = $request->class_id;
        $students->update();

        return redirect()->route('students.index');
    }
    //delete HTTP_DELETE
    public function destroy(Request $request, $id){
        $students = Student::findOrFail($id)->delete();
        return redirect()->route('students.index');
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
