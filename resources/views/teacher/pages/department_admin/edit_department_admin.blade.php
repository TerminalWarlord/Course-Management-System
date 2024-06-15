@extends('teacher.layouts.two_col')
@section('main')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <h2>Edit Department Admin</h2>
        <form action="{{ url("/admin/dept-admin/update/{$user['id']}") }} " method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="text" name="first_name" placeholder="First Name" class="form-control" id="first_name"
                    value="{{$user['first_name']}}">
            </div>
            <div class="form-group">
                <input type="text" name="last_name" placeholder="Last Name" class="form-control" id="last_name"
                    value="{{$user['last_name']}}">
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control" id="email"
                    value="{{$user['email']}}">
            </div>
            <div class="form-group">
                <input type="text" name="contact_no" placeholder="Contact No." class="form-control" id="contact_no"
                    value="{{$user['contact_no']}}">
            </div>
            <div class="form-group">
                <select name="role" id="" class="form-control">
                    <option value="">Select Role</option>
                    <option value="student" {{$user['role']=='student'?'selected':'' }}>Student</option>
                    <option value="teacher" {{$user['role']=='teacher'?'selected':'' }}>Teacher</option>
                    <option value="department_admin" {{$user['role']=='department_admin'?'selected':'' }}>Department
                        Admin</option>
                    <option value="super_admin" {{$user['role']=='super_admin'?'selected':'' }}>Super Admin</option>
                </select>
            </div>
            <div class="form-group">
                <input type="date" name="dob" placeholder="Date of Birth" id="dob" class="form-control"
                    value="{{$user['dob']}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class=" footer">
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