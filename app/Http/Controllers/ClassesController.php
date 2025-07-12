<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index(Request $request){
        if($request->search){
            $classes = Classes::whereAny([
                'id',
                'name',
            ], 'like','%'. $request->search . '%')->paginate(10);
        }else{
            $classes = Classes::paginate(10);
        }
        return view('classes.index', compact('classes'));
    }

    public function create(){

    }

    public function update(){

    }

    public function delete(){
        
    }
}
