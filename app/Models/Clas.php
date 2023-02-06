<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    use HasFactory;

    protected $table = 'class';
    
    protected $fillable = [
        'name','teacher_id'
    ];

    //relasi dari class ke student | one to Many
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }
    
    public function homeroomteacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}
