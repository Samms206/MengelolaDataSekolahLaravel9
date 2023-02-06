<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index()
    {
        # code...
        $guru = Teacher::get();
        return view('teachers',['teachersList'=>$guru]);
    }
    public function show($id)
    {
        # code...
        $guru = Teacher::with('mapel')->findOrFail($id);
        return view('Detail\teacher-detail',['teacher'=>$guru]);
    }
    public function create()
    {
        # code...
        $mapel = Mapel::select('id','mapel')->get();
        return view("teacher-add",['mapel'=>$mapel]);
    }
    public function store(Request $request)
    {
        # code...
        Teacher::create($request->all());
        return redirect("/teachers");
    }
    public function edit(Request $request, $id)
    {
        # code...
        $teacher = Teacher::with('mapel')->findOrFail($id);
        $mapel = Mapel::where('id', '!=', $teacher->mapel_id)->get(['id','mapel']);
        return view('teacher-edit',['teacher'=> $teacher, 'mapel'=> $mapel]);

    }
    public function update(Request $request, $id)
    {
        # code...
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
        return redirect('/teachers');
    }
    public function delete($id)
    {
        $data = Teacher::findOrFail($id);
        $data->delete();
        return redirect('/teachers');

    }
}
