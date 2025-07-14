<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function select(){
        $subjects = Subject::all();
        $classes = Classes::all();
        return view('grades.select', compact('subjects', 'classes'));
    }
    public function index(Request $request){
        
        $subject_id = $request->subject_id;
        $class_id = $request->class_id;

        $subject = Subject::find($subject_id);
        $class = Classes::find($class_id);

        $students = Student::where('class_id', $class_id)->get();

        $grades = Grade::where('subject_id', $subject_id)
            ->whereIn('student_id', $students->pluck('id'))
            ->get()
            ->keyBy('student_id');

        return view('grades.index', compact('students', 'grades', 'subject_id', 'class_id', 'subject', 'class'));
    }
    public function store(Request $request){
        foreach($request->scores as $studentID=>$score){
            Grade::updateOrCreate(
                [
                    'student_id' => $studentID,
                    'subject_id' => $request->subject_id,
                ],
                [
                    'score'=>$score
                ]
            );
        }
        return redirect()->route('grades.index',[
            'subject_id'=>$request->subject_id,
            'class_id'=>$request->class_id,
        ])->with('success', 'Score has been saved!');
    }
}
