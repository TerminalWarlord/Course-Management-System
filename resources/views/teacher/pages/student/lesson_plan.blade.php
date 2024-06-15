@extends('teacher.layouts.two_col')
@section('main')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="text-center">
            <h2>Department of Computer Science and Engineering</h2>
            <h3>Lesson Plan</h3>
        </div>
        <div class="row">
            <div class="col">
                <b>Course Title:</b> {{$obj['course_title']}}
            </div>
            <div class="col"><b>Course Code:</b> {{$obj['course_code']}} <br></div>
        </div>
        <div class="row">
            <div class="col">
                <b>Level/Term:</b> {{$obj['level']}}
            </div>
            <div class="col"><b>Section:</b> {{$obj['section']}}</div>
        </div>
        <div class="row">
            <div class="col">
                <b>Credit: </b> {{$obj['credit_hours']}}
            </div>
            <div class="col"><b>Contact Hours:</b> {{$obj['contact_hours']}}</div>
        </div>
        <div class="row">
            <div class="col">
                <b>Prerequisite:</b> N/A
            </div>
            <div class="col">
                <b>Type: Core/Major:</b> {{$obj['type']}}
            </div>
        </div>


        <div class="row">
            <div class="col"><b>Session:</b> {{$obj['session']}}</div>
        </div>
        <div class="row">
            <div class="col"><b>Instructor:</b> {{$instructor}}</div>
        </div>
        <div class="row">
            <div class="col">
                <b>Class schedule:</b> {{$obj['counseling_time']}}
            </div>
        </div>

        <div class="row">
            <div class="col">
                <b>Counseling Time:</b> {{$obj['counseling_time']}}
            </div>
            <div class="col">
                <b>Room No:</b> {{$obj['room_no']}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                <b>Email address:</b> {{$obj['instructors_email']}}
            </div>
            <div class="col">
                <b>Phone No:</b> {{$phone_no}}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <b>Rationale:</b> {{$obj['rationale']}}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <b>Course Outcomes (COs):</b>
                Upon successful completion of this course, student will be able to:
                <table class="table">
                    <tbody>
                        @foreach($cos as $co)
                            <tr>
                                <td>{{$co['co_name']}}</td>
                                <td>{{$co['details']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>

        <!-- COPO MAPPING -->
        <div class="row">
            <div class="col">
                
                <table class="table-bordered">
                    <thead>
                        <tr><th colspan="20" class="text-center">CO/PO mapping</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <tr>
                                <th rowspan="2">COs</th>
                            </tr>
                            <tr>
                                @for($j = 1; $j < 13; $j++)
                                    <th>PO{{$j}}</th>
                                @endfor
                            </tr>
                        </tr>
                        @foreach($cos as $co)
                        <tr>
                            <tr>
                                <td rowspan="2">{{$co['co_name']}}</td>
                            </tr>
                            <tr>
                                @foreach(str_split($co['po_string']) as $co)
                                    <td>
                                        @if($co=='1')
                                            ✓
                                        @endif
                                        @if($co=='0')
                                            ⨯
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <!-- @foreach ($schedules as $key => $value)
                    <p>{{ $key }}: {{ $value }}</p>
                @endforeach -->
                <b>Weekly Schedule:</b>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Week/Class</th>
                            <th>Topic</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- @foreach($schedules as $s)
                            <tr><td>{{$s}}</td></tr>
                        @endforeach -->
                        @if($schedules)

                        <tr>
                            <td>Class 1</td>
                            <td>{{$schedules->class1}}</td>
                        </tr>
                        <tr>
                            <td>Class 2</td>
                            <td>{{$schedules->class2}}</td>
                        </tr>
                        <tr>
                            <td>Class 3</td>
                            <td>{{$schedules->class3}}</td>
                        </tr>
                        <tr>
                            <td>Class 4</td>
                            <td>{{$schedules->class4}}</td>
                        </tr>
                        <tr>
                            <td>Class 5</td>
                            <td>{{$schedules->class5}}</td>
                        </tr>
                        <tr>
                            <td>Class 5</td>
                            <td>{{$schedules->class5}}</td>
                        </tr>
                        <tr>
                            <td>Class 6</td>
                            <td>{{$schedules->class6}}</td>
                        </tr>
                        <tr>
                            <td>Class 7</td>
                            <td>{{$schedules->class7}}</td>
                        </tr>
                        <tr>
                            <td>Class 8</td>
                            <td>{{$schedules->class8}}</td>
                        </tr>
                        <tr>
                            <td>Class 9</td>
                            <td>{{$schedules->class9}}</td>
                        </tr>
                        <tr>
                            <td>Class 10</td>
                            <td>{{$schedules->class10}}</td>
                        </tr>
                        <tr>
                            <td>Class 11</td>
                            <td>{{$schedules->class11}}</td>
                        </tr>
                        <tr>
                            <td>Class 12</td>
                            <td>{{$schedules->class12}}</td>
                        </tr>
                        <tr>
                            <td>Class 13</td>
                            <td>{{$schedules->class13}}<td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>


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