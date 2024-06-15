<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
// enrollment
    // Route::get('/enroll', [StudentController::class, 'enrollment']);
    // Route::post('/store-enrollment', [StudentController::class, 'save_enrollment']);


    public function dashboard(){
        return view('teacher.pages.dashboard');
    }
    
    public function enrollment(){
        $courses = Course::all();
        return view('teacher.pages.student.enroll', compact('courses'));
    }
    public function save_enrollment(Request $req){
        $courses=$req->input('course_code', []);
        $exam_types=$req->input('exam_type', []);
        $course_titles=$req->input('course_title', []);
        $sections=$req->input('section', []);
        $student_id = User::where('email', '=', $req->session()->get('email'))->first()->student_id;
        for($i=0; $i<count($courses);$i++){
            $obj = new Enrollment();
            $obj->student_id=$student_id;
            $obj->exam_type=$exam_types[$i];
            $obj->course_code=$courses[$i];
            $obj->course_title=$course_titles[$i];
            $obj->section=$sections[$i];
            $obj->save();
        }
        $courses = Course::all();
        return view('teacher.pages.student.enroll', compact('courses'))->with('success', 'Courses have been enrolled!');
    }
    public function enrollments(Request $req){
        $sid = User::where('email', '=', $req->session()->get('email'))->first()->student_id;
        $obj = Enrollment::where('student_id', '=', $sid)->get();
        // dd($obj);
        return view('teacher.pages.student.enrollments', compact('obj'));
    }
}