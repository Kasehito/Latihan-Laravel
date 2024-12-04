<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class GradeAdminController extends Controller
{
    public function grades()
    {
        $grade = Grade::all();
        return view('admin.admin-grade', [
            'title' => 'Grades', 
            'grade' => $grade->load('students', 'department')
        ]);
    }
}
