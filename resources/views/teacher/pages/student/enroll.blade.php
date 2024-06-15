@extends('teacher.layouts.two_col')
@section('main')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <h2>Enrollment</h2>
        <form action="{{url('/student/store-enrollment')}}" method="post">
            @csrf
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
            <table class="table striped">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Credit Hours</th>
                        <th>Exam Type</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($courses as $item)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="{{$item['course_code']}}"
                                    name="course_code[]">[{{$item['course_code']}}] {{$item['course_title']}} -
                                {{$item['section']}}
                                <input type="hidden" value="{{$item['course_title']}}" name="course_title[]">
                                <input type="hidden" value="{{$item['section']}}" name="section[]">
                            </div>
                        </td>
                        <td>{{$item['credit_hours']}}</td>
                        <td>
                            <select name="exam_type[]" id="" class="form-control">
                                <option value="regular">Regular</option>
                                <option value="retake">Retake</option>
                                <option value="recourse">Recourse</option>
                            </select>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Submit</button>
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