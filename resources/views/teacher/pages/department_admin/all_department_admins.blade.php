@extends('teacher.layouts.two_col')
@section('main')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <h2>All Department</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Department</th>
                    <th>Contact No</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr>
                    <td>{{$item['id']}}</td>
                    <td>{{$item['first_name']}} {{$item['last_name']}}</td>
                    <td>{{$item['email']}}</td>
                    <td>{{$item['role']}}</td>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['contact_no']}}</td>
                    <td>
                        <a href="{{ url("/admin/dept-admin/edit/{$item['id']}") }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <a href="{{ url("/admin/dept-admin/delete/{$item['id']}") }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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