<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentAdminController extends Controller
{
    public function students()
    {
        $students = Student::with('grade', 'department')->get();
        return view('admin.admin-student', [
            'students' => $students,    
            'title' => 'Student List'
        ]);
    }
}
