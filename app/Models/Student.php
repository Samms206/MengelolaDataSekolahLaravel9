<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name','gender','nis','image','class_id'
    ];

    //relasi dari student ke class | Many to One
    public function class()
    {
        return $this->belongsTo(Clas::class, 'class_id', 'id');
    }

    //relasi many to many dari student ke extracurricular
    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id', 'extracurricular_id');
    }
}
