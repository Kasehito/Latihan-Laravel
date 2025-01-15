<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentAdminController extends Controller
{
    public function departments()
    {
        $department = Department::all();
        return view('admin.admin-department', [
            'department' => $department,
            'title' => 'Department'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);

        Department::create($validated);
        return redirect()->route('admin.departments')->with('success', 'Department added successfully!');
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);

        $department->update($validated);
        return redirect()->route('admin.departments')->with('success', 'Department updated successfully!');
    }
}
