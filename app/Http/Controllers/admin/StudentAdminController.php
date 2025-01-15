<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Department;

class StudentAdminController extends Controller
{
    public function students()
    {
        $students = Student::with('grade', 'department')->get();
        $grades = Grade::all();
        $departments = Department::all();
        
        return view('admin.admin-student', [
            'students' => $students,
            'grades' => $grades,
            'departments' => $departments,
            'title' => 'Student List'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'address' => 'required|string',
            'grade_id' => 'required|exists:grades,id'
        ]);

        Student::create($validated);
        return redirect()->route('admin.students')->with('success', 'Student added successfully!');
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'address' => 'required|string',
            'grade_id' => 'required|exists:grades,id'
        ]);

        $student->update($validated);
        return redirect()->route('admin.students')->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students')->with('success', 'Student deleted successfully!');
    }
} 