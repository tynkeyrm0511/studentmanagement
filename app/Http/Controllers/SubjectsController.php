<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index(Request $request){
        if($request->search){
            $subjects = Subject::whereAny([
                'id', 
                'name', 
                'credit'
            ],'like', '%'.$request->search.'%')->paginate(10);
        }else{
            $subjects = Subject::paginate(10);
        }
        return view('subjects.index', compact('subjects'));
    }
    public function add(){
        return view('subjects.add');
    }
    public function create(Request $request){
        
        $request->validate([
            'name'=>'string|max:255',
            'credit'=>'integer|min:1|max:10'
        ]);
        $subjects = new Subject();
        $subjects->name = $request->name;
        $subjects->credit = $request->credit;
        $subjects->save();

        return redirect()->route('subjects.index');
    }
    public function edit(Request $request, $id){
        $subjects = Subject::findOrFail($id);
        return view('subjects.edit', compact('subjects'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'string|max:255',
            'credit' => 'integer|min:1|max:10'
        ]);
        $subjects = Subject::findOrFail($id);
        $subjects->name = $request->name;
        $subjects->credit = $request->credit;
        $subjects->update();
        return redirect()->route('subjects.index');
    }
    public function destroy(Request $request, $id){
        $subjects = Subject::findOrFail($id)->delete();
        return redirect()->route('subjects.index');
    }
}
