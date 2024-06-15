@extends('teacher.layouts.two_col')
@section('main')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <h2>Create Lesson Plan</h2>
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error')}}
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
        @endif
        <form action="{{url('/teacher/store-lesson-plan')}}" method="post">
            @csrf
            <div class="form-group">
                <select name="course_id" id="course_id" class="form-control">
                    <option value="">Select A Course</option>
                    @foreach($obj as $item)
                    <option value="{{$item['id']}}">{{$item['course_title']}} [{{$item['course_code']}}] -
                        {{$item['section']}}</option>
                    {{$item}}
                    @endforeach
                </select>
            </div>
            @for($j = 1; $j < 14; $j++) <div class="form-group">
                <input type="text" name="class{{$j}}" id="class{{$j}}" placeholder="Class {{$j}}" class="form-control">
    </div>
    @endfor


    <div class="row">
        <div class="col">
            <button class="btn btn-primary">Create Schedule</button>
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
    // courses = '<option value="">Select Course</option>'
    // $.ajax({
    //     url: 'http://127.0.0.1:8000/api/get_courses/' + email,
    //     type: 'get',
    //     dataType: 'json',
    //     'success': function(res) {
    //         res['data'].forEach(element => {
    //             courses += '<option value="' + element['id'] + '">' + element[
    //                     'course_title'] +
    //                 ' ' + element['course_code'] + ' ' + element['section'] +
    //                 '</option>'
    //             console.log(courses)
    //         });
    //         $("#course_id").value(courses);
    //         // $("#po-checkbox").
    //     }

    // });

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