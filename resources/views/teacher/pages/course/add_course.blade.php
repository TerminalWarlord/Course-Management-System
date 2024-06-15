@extends('teacher.layouts.two_col')
@section('main')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <h2>Add Course</h2>
        <form action="{{url('/department-admin/store-course')}}" method="post">
            @csrf
            <div id="po-box">
                <div class="form-group">
                    <input type="text" name="course_title" id="course_title" placeholder="Course Title"
                        class="form-control" id="title">
                </div>
                <div class="form-group">
                    <input type="text" name="course_code" placeholder="Course Code" id="course_code"
                        class="form-control">
                </div>
                <div class="form-group">
                    <select name="version" id="version" class="form-control">
                        <option>Select Version</option>
                        <option value="V1">V1</option>
                        <option value="V2">V2</option>
                        <option value="V3">V3</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="level" placeholder="Level" id="version" class="form-control">
                </div>
                <div class="form-group">
                    <select name="session" id="session" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <select name="department" id="department" class="form-control">
                    </select>
                </div>

                <div class="form-group">
                    <select name="instructor" id="instructor" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <select name="semester" id="semester" class="form-control">
                        <option>Select Semester</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                        <option value="6th">6th</option>
                        <option value="7th">7th</option>
                        <option value="8th">8th</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="section" id="section" class="form-control">
                        <option>Select Section</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        <option value="G">G</option>
                        <option value="H">H</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="type" id="type" class="form-control">
                        <option>Select Type</option>
                        <option value="Major">Major</option>
                        <option value="Core">Core</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="contact_hours" placeholder="Contact Hours" id="contact_hours"
                        class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="credit_hours" placeholder="Credit Hours" id="credit_hours"
                        class="form-control">
                </div>

                <div class="form-group">
                    <input type="text" name="room_no" placeholder="Room No" id="room_no" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="counseling_time" placeholder="Counseling Time" id="counseling_time"
                        class="form-control">
                </div>

                <div class="form-group">
                    <input type="textarea" name="rationale" placeholder="Rationale" id="rationale" class="form-control">
                </div>
                <div class="row">
                    <div class="col">
                        @for($j = 1; $j < 4; $j++) <div class="form-group">
                            <input type="text" name="clo{{$j}}_name" placeholder="CLO{{$j}}" id="clo{{$j}}_name"
                                class="form-control">
                    </div>
                    <div class="form-group">
                        CLO{{$j}} Falls into:<br>
                        @for ($i = 1; $i < 13; $i++) <label>
                            <input type="checkbox" name="clo{{$j}}{{$i}}[]" value="{{$i}}"> PO{{$i}}
                            </label>
                            @endfor
                            @endfor

                    </div>
                </div>



            </div>

            <div class="row">
                <div class="col">
                    <button class="btn btn-primary">Add</button>
                </div>

            </div>
    </div>

    <!-- <div class="co-box">
                <div class="form-group">
                    <input type="text" name="details" placeholder="Total PO" class="form-control" id="total_po">
                </div>
                <div id="po-checkbox">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value="">Option 2
                        </label>
                    </div>
                </div>
            </div> -->

    </form>
</div>

<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
            Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                template</a> from BootstrapDash. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
            with <i class="ti-heart text-danger ml-1"></i></span>
    </div>
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a
                href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
    </div>
</footer>
<!-- partial -->

<script>
$(document).ready(function() {
    dept = '<option value="">Select Department</option>'
    $.ajax({
        url: 'http://127.0.0.1:8000/api/get_departments',
        type: 'get',
        dataType: 'json',
        'success': function(res) {
            res['data'].forEach(element => {
                dept += '<option value="' + element['id'] + '">' + element['name'] +
                    '</option>'
                console.log(dept)
            });
            $("#department").html(dept);
            // $("#po-checkbox").
        }

    });

    // FETCH SESSION
    sess = '<option value="">Select Session</option>'
    $.ajax({
        url: 'http://127.0.0.1:8000/api/get_sessions',
        type: 'get',
        dataType: 'json',
        'success': function(res) {
            res['data'].forEach(element => {
                sess += '<option value="' + element['id'] + '">' + element[
                    'session_name'] + '</option>'
                console.log(sess)
            });
            $("#session").html(sess);
            // $("#po-checkbox").
        }

    });

    // FETCH Teachers
    teacher = '<option value="">Assign Teacher</option>'
    $.ajax({
        url: 'http://127.0.0.1:8000/api/get_teachers',
        type: 'get',
        dataType: 'json',
        'success': function(res) {
            res['data'].forEach(element => {
                teacher += '<option value="' + element['id'] + '">' + element[
                    'first_name'] + ' ' + element[
                    'last_name'] + '</option>'
                console.log(teacher)
            });
            $("#instructor").html(teacher);
            // $("#po-checkbox").
        }

    });

    $('#po_next').click(function(e) {
        e.preventDefault();
        course_code = $('#course_code').val();
        title = $('#title').val();
        department = $('#department').val();
        total_po = $('#total_po').val();
        $.ajax({
            url: 'http://127.0.0.1:8000/api/set_po',
            type: 'post',
            dataType: 'json',
            data: {
                course_code: course_code,
                department: department,
                total_po: total_po,
            },
            'success': function(res) {
                console.log(res);
                // $("#po-checkbox").
            }
        });
        $("#po-box").addClass("d-none");
        console.log('ready');
    });
});
</script>
</div>
<!-- main-panel ends -->
@endsection