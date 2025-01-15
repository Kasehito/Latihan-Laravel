<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Department;

class GradeAdminController extends Controller
{
    public function grades()
    {
        $grade = Grade::all();
        $departments = Department::all();
        
        return view('admin.admin-grade', [
            'title' => 'Grades', 
            'grade' => $grade->load('students', 'department'),
            'departments' => $departments
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'department_id' => 'required|exists:departments,id',
        ]);

        Grade::create($validated);

        return redirect()->route('admin.grades')->with('success', 'Grade created successfully!');
    }

    public function update(Request $request, Grade $grade)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $grade->update($validated);
        return redirect()->route('admin.grades')->with('success', 'Grade updated successfully!');
    }
}