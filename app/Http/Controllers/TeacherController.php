<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Schedule;
use App\Models\CourseOutcome;

class TeacherController extends Controller
{
    public function my_courses(Request $req){
        $email = $req->session()->get('email');
        $courses = Course::where('instructors_email', '=', $email)->get();
        return view('teacher.pages.course.my_courses', compact('courses'));
    }
    public function all_courses(Request $req){
        $courses = Course::all();
        return view('teacher.pages.course.all_courses', compact('courses'));
    }
    public function create_lesson_plan(Request $req){
        $email = $req->session()->get('email');
        $obj = Course::where('instructors_email', '=', $email)->get();
        return view('teacher.pages.course.create_lesson_plan', compact('obj'));
    }
    public function store_lesson_plan(Request $req){
        $schedule = new Schedule();
        $schedule->course_id=$req->course_id;
        $schedule->class1=$req->class1;
        $schedule->class2=$req->class2;
        $schedule->class3=$req->class3;
        $schedule->class4=$req->class4;
        $schedule->class5=$req->class5;
        $schedule->class6=$req->class6;
        $schedule->class7=$req->class7;
        $schedule->class8=$req->class8;
        $schedule->class9=$req->class9;
        $schedule->class10=$req->class10;
        $schedule->class11=$req->class11;
        $schedule->class12=$req->class12;
        $schedule->class13=$req->class13;
        if($schedule->save()){
            return redirect()->back()->with('success', 'Schedule has been published!');
        }
        return redirect()->back()->with('error', 'Something went wrong!');
        dd($schedule);
        $obj = Course::where('instructors_email', '=', $email)->get();
        return view('teacher.pages.course.create_lesson_plan', compact('obj'));
    }

    public function show_lesson_plan($id){
        $obj = Course::where('id', '=', $id)->first();
        $phone_no = User::where('email', '=', $obj->instructors_email)->first()->contact_no;
        $instructor = User::where('email', '=', $obj->instructors_email)->first()->first_name .' '. User::where('email', '=', $obj->instructors_email)->first()->last_name;
        $schedules = Schedule::where('course_id', '=', $id)->first();
        $cos = CourseOutcome::where('course_code', '=', $obj->course_code)->get();

        return view('teacher.pages.student.lesson_plan', compact('obj', 'phone_no', 'instructor', 'schedules', 'cos'));
    }
    
}