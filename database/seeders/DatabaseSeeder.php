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
        // Create departments
        $departments = [
            [
                'name' => 'PPLG',
                'desc' => 'Pemrograman Perangkat Lunak dan Gim'
            ],
            [
                'name' => 'Animasi 2D',
                'desc' => 'Animasi 2 Dimensi'
            ],
            [
                'name' => 'Animasi 3D',
                'desc' => 'Animasi 3 Dimensi'
            ],
            [
                'name' => 'DKV',
                'desc' => 'Desain Komunikasi Visual'
            ],
            [
                'name' => 'TG',
                'desc' => 'Teknik Grafika'
            ],
        ];

        // Create departments and store them in a collection
        $departmentModels = collect();
        foreach ($departments as $dept) {
            $departmentModels[$dept['name']] = Department::create($dept);
        }

        // Create grades with correct department_id
        $grades = [
            // PPLG
            '10 PPLG 1' => 'PPLG',
            '10 PPLG 2' => 'PPLG',
            '11 PPLG 1' => 'PPLG',
            '11 PPLG 2' => 'PPLG',
            '12 PPLG 1' => 'PPLG',
            '12 PPLG 2' => 'PPLG',
            
            // Animasi 3D
            '10 ANIMASI 1' => 'Animasi 3D',
            '10 ANIMASI 2' => 'Animasi 3D',
            '10 ANIMASI 3' => 'Animasi 3D',
            '11 ANIMASI 1' => 'Animasi 3D',
            '11 ANIMASI 2' => 'Animasi 3D',
            '11 ANIMASI 3' => 'Animasi 3D',
            '12 ANIMASI 1' => 'Animasi 3D',
            '12 ANIMASI 2' => 'Animasi 3D',
            '12 ANIMASI 3' => 'Animasi 3D',
            
            // Animasi 2D
            '10 ANIMASI 4' => 'Animasi 2D',
            '10 ANIMASI 5' => 'Animasi 2D',
            '11 ANIMASI 4' => 'Animasi 2D',
            '11 ANIMASI 5' => 'Animasi 2D',
            '12 ANIMASI 4' => 'Animasi 2D',
            '12 ANIMASI 5' => 'Animasi 2D',
            
            // DKV
            '10 DKV 1' => 'DKV',
            '10 DKV 2' => 'DKV',
            '11 DKV 1' => 'DKV',
            '11 DKV 2' => 'DKV',
            '12 DKV 1' => 'DKV',
            '12 DKV 2' => 'DKV',
            
            // TG (DKV 3 & 4)
            '10 DKV 3' => 'TG',
            '10 DKV 4' => 'TG',
            '10 DKV 5' => 'TG',
            '11 DKV 3' => 'TG',
            '11 DKV 4' => 'TG',
            '12 DKV 3' => 'TG',
            '12 DKV 4' => 'TG',
            '12 DKV 5' => 'TG',
        ];

        $gradeModels = collect();
        foreach ($grades as $gradeName => $deptName) {
            $gradeModels->push(Grade::create([
                'name' => $gradeName,
                'department_id' => $departmentModels[$deptName]->id
            ]));
        }

        // Create students
        Student::factory(100)->create([
            'grade_id' => fn() => $gradeModels->random()->id,
        ]);
    }
}
