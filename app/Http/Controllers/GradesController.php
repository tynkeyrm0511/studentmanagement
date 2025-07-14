<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    public function index(Request $request){
        if($request->search){
            $grades = Grade::with(['student', 'subject'])->where(function($q) use ($request){
                $search = '%' . $request->search . '%';
                $q->whereAny(['id','score'], 'like', $search)
                ->orWhereHas('student', function($q)use($search){
                    $q->where('name', 'like', $search);
                })
                ->orWhereHas('subject',function($q)use($search){
                    $q->where('name', 'like', $search);
                });
            })->paginate(10);
        }else{
            $grades = Grade::with(['student', 'subject'])->paginate(10);
        }
        return view('grades.index', compact('grades'));
    }
}
