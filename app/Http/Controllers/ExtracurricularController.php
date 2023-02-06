<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Extracurricular;

class ExtracurricularController extends Controller
{
    //
    public function index()
    {
        # code...
        // $siswa = Student::with(['class', 'extracurriculars'])->get();

        $ekskul = Extracurricular::get();
        return view('ekskul',['ekskulList'=>$ekskul]);
    }
    public function show($id)
    {
        # code...
        $ekskul = Extracurricular::with('students')->findOrFail($id);
        return view('Detail\ekskul-detail',['ekskul'=>$ekskul]);
    }
    public function create()
    {
        # code...
        return view('ekskul-add');
    }
    public function store(Request $request)
    {
        # code...
        Extracurricular::create($request->all());
        return redirect('/extracurricular');
    }
    public function edit($id)
    {
        # code...
        $ekskul = Extracurricular::FindOrFail($id);
        return view('ekskul-edit',['ekskul'=>$ekskul]);
    }
    public function update(Request $request, $id)
    {
        # code...
        $ekskul = Extracurricular::FindOrFail($id);
        $ekskul->update($request->all());
        return redirect('/extracurricular');
    }

    public function add_student(Request $request)
    {
        //view & search data
        $keyword = $request->keyword;
        $siswa = Student::with('class')
        ->where('name', 'LIKE', '%'.$keyword.'%')
        ->orWhere('nis', 'LIKE', '%'.$keyword.'%')
        //search data with relation
        ->orWhereHas('class', function($query) use($keyword)
        {
            $query->where('name', 'LIKE', '%'.$keyword.'%');
        })
        ->paginate(10);
        return view('ekskul-student-show', ['studentList' => $siswa]);
    }

    public function show_add_student($id)
    {
        $data = Student::findOrFail($id);
        $data2 = Extracurricular::all();
        $student_extracurricular_ids = $data->extracurriculars->pluck('id')->toArray();
        return view("ekskul-student-add", ['dataStudent' => $data , 
                                            'extracurriculars' => $data2, 
                                            'student_extracurricular_ids' => $student_extracurricular_ids]);
    }
    public function update_pivot(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->extracurriculars()->sync($request->extracurricular_ids);

        return redirect('/students');
    }
}

