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
}
