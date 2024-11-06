<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('grade')->get();
        return view('student', [
            'students' => $students,
            'title' => 'Student List'
        ]);
    }
}
