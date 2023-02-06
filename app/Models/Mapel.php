<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    //relasi mapel ke teacher | one to many
    protected $fillable = ['mapel'];

    public function teacher()
    {
        return $this->hasMany(Teacher::class);
    }
}
