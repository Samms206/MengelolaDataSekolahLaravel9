<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','nip','mapel_id'
    ];

    //relasi dari teachers ke mapels | many to one
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
