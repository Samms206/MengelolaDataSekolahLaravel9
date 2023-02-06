<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClasController extends Controller
{
    //
    public function index()
    {
        # code...
        $kelas = Clas::get();
        return view('class', ['classList'=> $kelas]);
    }
    public function show($id)
    {
        # code...
        $kelas = Clas::with(['students','homeroomteacher'])->findOrFail($id);
        return view('Detail\class-detail', ['class'=> $kelas]);
    }
    public function create()
    {
        $teacher = Teacher::select('id','name')->get();
        return view('class-add',['teacher'=>$teacher]);
    }
    public function store(Request $request)
    {
        # code...
        // dd($request);
        $class = Clas::create($request->all());
        if($class){
            Session::flash('status','success');
            Session::flash('message','add new class success!');
        }
        return redirect('/class');
    }
    public function edit(Request $request, $id)
    {
        # code...
        $class = Clas::with('homeroomteacher')->findOrFail($id);
        $teacher = Teacher::where('id', '!=', $class->teacher_id)->get(['id','name']);
        return view('class-edit',['class'=> $class, 'teacher'=> $teacher]);
    }
    public function update(Request $request, $id)
    {
        # code...
        $class = Clas::findOrFail($id);
        $class->update($request->all());
        return redirect('/class');

    }
}
