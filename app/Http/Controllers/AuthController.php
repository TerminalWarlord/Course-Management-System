<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view('teacher.pages.login');
    }
    public function register(){
        return view('teacher.pages.register');
    }
    //
    public function registerStore(Request $req){
        if(User::where('email', '=', $req->email)->first()){
            return redirect()->back()->with('error', 'User with the same email exists!');
        }
        $originalImage= $req->file('image');
        $thumbnailImage = Image::make($originalImage);
        $originalPath = public_path().'/uploads/';
        $filename = $originalImage->getClientOriginalName();
        $thumbnailImage->save($originalPath.time().$filename);
        $user = new User();
        $user->first_name=$req->first_name;
        $user->last_name=$req->last_name;
        $user->email=$req->email;
        $user->dob=$req->dob;
        $user->batch=$req->batch;
        $user->contact_no=$req->contact_no;
        $user->department_id=$req->department;
        $user->student_id=$req->student_id;
        $user->password=md5($req->password);
        $user->image=$filename;
        if($user->save()){
            return redirect()->back()->with('success', 'Account has been created successfully!');
        }
        return redirect()->back()->with('error', 'Something went wrong!');
        dd($req);
    }

    public function loginConfirm(Request $req){
        $email = $req->email;
        $password = md5($req->password);
        $obj = User::where('email', '=', $req->email)
                    ->first();
        if($obj){
            Session::put('fname', $obj->first_name);
            Session::put('lname', $obj->last_name);
            Session::put('role', $obj->role);
            Session::put('email', $obj->email);
            return redirect('/dashboard');
        }
        return redirect()->back()->with('error', 'Invalid credentials!');
        
    }

    public function logout(Request $req){
        $req->session()->forget(['fname', 'lname', 'role', 'email']);
        return redirect('/login');
        
    }
}