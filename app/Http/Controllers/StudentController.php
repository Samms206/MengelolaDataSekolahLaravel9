<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Models\Clas;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index(Request $request)
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
        return view('students', ['studentList' => $siswa]);
    }

    public function show($id)
    {
        $student = Student::with(['class.homeroomteacher'])->findOrFail($id);
        return view('Detail/student-detail',['student' => $student]);
    }

    public function create()
    {
        $class = Clas::select('id','name')->get();
        return view("student-add", ['class' => $class]);
    }

    public function store(StudentCreateRequest $request)
    {
        $newName = '';
        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }
        $request['image'] = $newName;
        $student = Student::create($request->all());

        if($student){
            Session::flash('status','success');
            Session::flash('message','add new student success!');
        }

        return redirect('/students');
    }
    public function edit($id)
    {
        # code...
        $student = Student::with('class')->findOrFail($id);
        $class = Clas::where('id', '!=', $student->class_id)->get(['id','name']);
        return view("student-edit",['student' => $student, 'class' => $class]);
    }
    public function update(Request $request, $id)
    {
        $student = Student::findOrfail($id);
        $student->update($request->all());
        if($student){
            Session::flash('status','success');
            Session::flash('message','update data student success!');
        }
        return redirect('/students');
    }

    public function delete($id)
    {
        $student = Student::FindOrFail($id);
        return view('student-delete',['student'=>$student]);
    }
    public function destroy($id)
    {
        $delStudent = Student::FindOrFail($id);
        $delStudent->delete();  
        if($delStudent){
            Session::flash('status','success');
            Session::flash('message','delete data student success!');
        }
        return redirect('/students');
    }
    public function deleted()
    {
        # code...
        $student = Student::onlyTrashed()->get();
        return view('students-restore',['StudentDeletedList' => $student]);
    }
    public function restore($id)
    {
        # code...
        $deletedStudent = Student::withTrashed()->where('id',$id)->restore();

        if($deletedStudent){
            Session::flash('status','success');
            Session::flash('message','Restore data student success!');
        }

        return redirect('/students');

    }
}
