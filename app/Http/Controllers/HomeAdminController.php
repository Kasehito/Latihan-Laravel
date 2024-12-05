<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;
use App\Models\Grade;

class HomeAdminController extends Controller
{
    public function index()
    {
        $student = Student::count();
        $department = Department::count();
        $grade = Grade::count();

        return view('admin.admin-home', compact('student', 'department', 'grade'), [
            'title' => 'Home'
        ]);
    }
}
