<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;


class DepartmentController extends Controller
{
    public function add_department(){
        return view('teacher.pages.department.add_department');
    }
    public function store_department(Request $req){
        $obj = new Department();
        $obj->name = $req->name;
        $obj->short_name = $req->short_name;
        $obj->campus = $req->campus;
        if($obj->save()){
            return redirect()->back();
        }
        dd($req);
    }
    public function all_departments(){
        $dept = Department::all();
        return view('teacher.pages.department.all_departments', compact('dept'));
    }
    public function edit_department($id){
        $department = Department::find($id);
        // dd($obj);
        return view('teacher.pages.department.edit_department', compact('department'));
    }
    public function update_department(Request $req, $id){
        $department = Department::find($id);
        // dd($req->name);
        $department->name=$req->name;
        $department->short_name=$req->short_name;
        $department->campus=$req->campus;
        $dept = Department::all();
        if($department->save()){
            return view('teacher.pages.department.all_departments', compact('dept'));
        }
        // dd($obj);
        // return view('teacher.pages.department.edit_department', compact('department'));
    }
    public function delete_department(Request $req, $id){
        $department = Department::find($id);
        $department->delete();
        $dept = Department::all();
        return view('teacher.pages.department.all_departments', compact('dept'));
        // dd($obj);
        // return view('teacher.pages.department.edit_department', compact('department'));
    }
}