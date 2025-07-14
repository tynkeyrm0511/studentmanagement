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

        return redirect()->route('classes.index');
    }

    public function edit($id){
        $classes = Classes::findOrFail($id);
        return view('classes.edit', compact('classes'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $classes = Classes::findOrFail($id);
        $classes->name=$request->name;
        $classes->update();

        return redirect()->route('classes.index');
    }

    public function destroy(Request $request, $id){
        $classes = Classes::findOrFail($id);
        $classes->delete();

        return redirect()->route('classes.index');
    }
}
