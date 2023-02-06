<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Teacher;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    //
    public function index()
    {
        # code...
        $mapel = Mapel::get();
        return view('Mapel\mapels',['mapelsList'=>$mapel]);
    }
    public function show($id)
    {
        # code...
        $mapel = Mapel::with('teacher')->findOrFail($id);
        return view('Detail\mapel-detail',['mapel'=>$mapel]);
    }
    public function create()
    {
        # code...
        return view("Mapel/mapel-add");
    }
    public function store(Request $request)
    {
        # code...
        Mapel::create($request->all());
        return redirect('/mapels');
    }
    public function edit(Request $request, $id)
    {
        # code...
        $mapel = Mapel::findOrFail($id);
        return view('Mapel\mapel-edit',['mapel'=>$mapel]);
    }
    public function update(Request $request, $id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->update($request->all());
        return redirect('/mapels');
    }
    public function delete($id)
    {
        $data = Mapel::findOrFail($id);
        $data->delete($id);
        return redirect('/mapels');

    }
}
