<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\CourseOutcome;
use App\Models\ProjectOutcome;


class CourseController extends Controller
{
    public function addcourse(){
        return view('teacher.pages.course.add_course');
    }

    public function store_course(Request $req){
        // dd($req->all());
        $dept = $req->department;
        for ($j = 1; $j < 4; $j++) {
            $obj = new CourseOutcome();
            $clo = "";
            for ($i = 1; $i < 13; $i++) {
                if (request()->input('clo'.$j . $i)!=null) {
                    $clo=$clo."1";
                }
                else $clo=$clo."0";
            }
            $obj->details = $req->all()['clo'.$j.'_name'];
            $obj->department_id = $dept;
            $obj->course_code = $req->course_code;
            $obj->po_string = $clo;
            $obj->co_name = 'CLO'.$j;
            $obj->save();
            // dd($obj);
        }   
        $obj = new Course();
        $obj->course_title=$req->course_title;
        $obj->course_code=$req->course_code;
        $obj->version=$req->version;
        $obj->level=$req->level;
        $obj->semester=$req->semester;
        $obj->credit_hours=$req->credit_hours;
        $obj->session=$req->session;
        $obj->contact_hours=$req->contact_hours;
        $obj->type=$req->type;
        $obj->counseling_time=$req->counseling_time;
        $obj->room_no=$req->room_no;
        $obj->rationale=$req->rationale;
        $obj->section=$req->section;
        $obj->teacher_id=$req->instructor;
        $obj->department_id=$req->department;
        $obj->instructors_email=User::find($req->instructor)->email;
        $obj->phone_no=User::find($req->instructor)->contact_no;
        if($obj->save()){
            $courses = Course::all();
            return view('teacher.pages.course.all_courses', compact('courses'))->with('success', 'Course has been added successfully.');
        }
        return redirect()->back()->with('error', 'Failed to add the course!');
        
    }
    public function all_courses(){
        $courses = Course::all();
        return view('teacher.pages.course.all_courses', compact('courses'));
    }

    public function delete_course($id){
        Course::find($id)->delete();
        return redirect()->back()->with('success', 'Course has been deleted!');
        
    }
}