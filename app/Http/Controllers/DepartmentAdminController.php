<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class DepartmentAdminController extends Controller
{
    //
    public function add_department_admin(){
        return view('teacher.pages.department_admin.add_admin');
        
    }
    public function all_department_admins(){
        // $user = User::all();
        $user = User::join('departments', 'users.department_id', '=', 'departments.id')->get(['users.*', 'departments.name']);
        // dd($data);
        return view('teacher.pages.department_admin.all_department_admins', compact('user'));
        
    }
    
    public function store_dp_admin(Request $req){
        if($req->password1!=$req->password2){
            return redirect()->back();
        }
        if(User::where('email','=',$req->password2)->first()){
            return redirect()->back()->with('error', "Duplicate email detected!");
        }
        $obj = new User();
        $obj->first_name=$req->first_name;
        $obj->last_name=$req->last_name;
        $obj->email=$req->email;
        $obj->contact_no=$req->contact_no;
        $obj->dob=$req->dob;
        $obj->department_id=$req->department;
        $obj->role=$req->role;
        $obj->role=$req->role;
        $obj->password=md5($req->password);
        
        if($obj->save()){
            $user = User::all();
            return redirect()->back()->with('success', "User has been created!");
        }
        return redirect()->back()->with('error', "Something went wrong!");
        
    }
    public function edit_department_admin($id){
        $user = User::find($id);
        return view('teacher.pages.department_admin.edit_department_admin', compact('user'));
    }
    public function update_department_admin(Request $req, $id){
        if(User::where('email','=',$req->password2)->first()){
            return redirect()->back()->with('error', "Duplicate email detected!");
        }
        $user = User::find($id);
        $user->first_name=$req->first_name;
        $user->last_name=$req->last_name;
        $user->email=$req->email;
        $user->contact_no=$req->contact_no;
        $user->dob=$req->dob;
        $user->role=$req->role;
        if($user->save()){
            return redirect()->back()->with('success', "User has been created!");
        }
        return redirect()->back()->with('error', "Something went wrong!");
    }

    public function delete_department_admin($id){
        User::find($id)->delete();
        return redirect()->back();

    }
}