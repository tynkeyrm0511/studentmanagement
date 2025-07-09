<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //Properties
    protected $name;
    //Constructor
    public function __construct(){
        $this->name = 'My name is Syntax Ngo';
    }
    //Students showAll method
    public function index(){
        return view('students');
    }
    //Show detail method
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return $student;
    }
    //Create method
    public function create(){
        $student = new Student();
        $student->name='created testname';
        $student->gender='male';
        $student->dob='2000-05-12';
        $student->email='test@example.com';
        $student->phone='0334667534';
        $student->class_id=2;
        $student->save();//add
        return 'Added successfully';
    }
    //Edit method
    public function edit($id){
        $student = Student::findOrFail($id);

        $student->name='edited testname';
        $student->gender = 'female';
        $student->dob = '2111-01-01';
        $student->email = 'test@example.com';
        $student->phone = '1111111111';
        $student->class_id = 3;
        $student->update();//edit
        return "Edited $id successfully";
    }
    public function delete($id){
        $student = Student::findOrFail($id);
        $student->delete();//delete
        return "Delete $id successfully";
        
    }
    //private method chi duoc su dung trong class nay (OOP), ben ngoai se khong goi duoc
    private function privatefunc(){
        return "hello i am hidding!";
    }
};
