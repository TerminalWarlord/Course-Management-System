<?php

namespace App\Http\Controllers;
use App\Models\ProjectOutcome;
use App\Models\Department;
use App\Models\Session;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function test(){
        $code = 12;
        return response()->json([
            'data'=> ProjectOutcome::where("course_code", $code)->get()
        ]);
    }
    public function set_po(Request $req){
        
        $total = (int)$req->total_po;
        $department = $req->department;
        $done = false;
        for ($i = 1; $i <= $total; $i++) {
            $po = new ProjectOutcome();
            $po->course_code =  $req->course_code;
            $po->department = $department;
            if($po->save()){
                $done=true;
            }
            
        }
        if($done){
            $po = ProjectOutcome::where("department", $department)->get();
            return response()->json([
                'data'=> $po
            ]);
        }
        return response()->json([
            'success'=> false
        ]);
        
    }
    public function get_departments(){
        $department = Department::all();
        return response()->json([
            'data'=>$department
        ]);
    }
    public function get_sessions(){
        $sess = Session::all();
        return response()->json([
            'data'=>$sess
        ]);
    }
    public function get_teachers(){
        return response()->json([
            'data'=>User::where('role', '=', 'teacher')->get()
        ]);
    }
    public function get_courses($email){
        return response()->json([
            'data'=>Course::where('instructors_email', '=', $email)->get()
        ]);
    }
}