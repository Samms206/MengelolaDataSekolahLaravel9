<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Teacher::insert([
            'name' => 'Pak ucup',
            'nip' => '3304411',
            'mapel_id' => 1
        ]);
    }
}
