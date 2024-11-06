<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Grade;
use App\Models\Student;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cara yang benar untuk membuat departments
        $departments = [
            [
                'name' => 'PPLG',
                'desc' => 'Pemrograman Perangkat Lunak dan Gim'
            ],
            [
                'name' => 'Animasi 3D',
                'desc' => 'Animasi 3D'
            ],
            [
                'name' => 'DKV',
                'desc' => 'Desain Komunikasi Visual'
            ],
            [
                'name' => 'TG',
                'desc' => 'Teknik Grafika'
            ],
            [
                'name' => 'Animasi 2D',
                'desc' => 'Animasi 2D'
            ],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }

        $departments = Department::all();

        // Create grades with department_id
        $grades = collect(['11 PPLG 1', '11 PPLG 2', '12 PPLG 1', '12 PPLG 2','10 PPLG 1','10 PPLG 2','10 ANIMASI 1','10 ANIMASI 2','10 ANIMASI 3','10 ANIMASI 4','10 ANIMASI 5','10 DKV 1','10 DKV 2','10 DKV 3','10 DKV 4','11 ANIMASI 1','11 ANIMASI 2','11 ANIMASI 3','11 ANIMASI 4','11 ANIMASI 5','11 DKV 1','11 DKV 2','11 DKV 3','11 DKV 4','12 ANIMASI 1','12 ANIMASI 2','12 ANIMASI 3','12 ANIMASI 4','12 ANIMASI 5','12 DKV 1','12 DKV 2','12 DKV 3','12 DKV 4'])->map(function ($name) use ($departments) {
            return Grade::create([
                'name' => $name,
                'department_id' => $departments->random()->id
            ]);
        });

        // Create students with both grade_id and department_id
        Student::factory(100)->create([
            'grade_id' => fn() => $grades->random()->id,
            'department_id' => fn() => $departments->random()->id,
        ]);
    }
}
