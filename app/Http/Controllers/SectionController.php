<?php

namespace App\Http\Controllers;
use App\Models\Section;

use Illuminate\Http\Request;

class SectionController extends Controller
{
    
    public function add_section(){
        return view('teacher.pages.add_section');
    }
    public function store_section(Request $req){
        $obj = new Section();
        $obj->name = $req->section_name;
        $obj->session_id = $req->session_id;
        $obj->department_id = $req->department_id;
        $obj->semester = $req->semester;
        if($obj->save()){
            return redirect()->back();
        }
        dd($req);
    }
    
}
