@extends('teacher.layouts.two_col')
@section('main')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <h2>Add Section</h2>
        <form action="{{url('/teacher/store-section')}}" method="post">
            @csrf
            <div id="po-box">
                <div class="form-group">
                    <input type="text" name="section_name" id="section_name" placeholder="Section Name"
                        class="form-control" id="section_name">
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
                    <select class="form-control" id="session" name="session_id">

                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="department" name="department_id">

                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
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
        // FETCH DEPART
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



    });
    </script>
</div>
<!-- main-panel ends -->
@endsection