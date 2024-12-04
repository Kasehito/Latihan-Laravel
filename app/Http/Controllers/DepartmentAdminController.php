<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

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
