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

    public function create(Request $request){

        $request->validate([
            'name'=>'required|string|max:255'
        ]);
        $classes = new Classes();
        $classes->name = $request->name;
        $classes->save();

        return redirect('classes');
    }

    public function update(){

    }

    public function delete(){

    }
}
