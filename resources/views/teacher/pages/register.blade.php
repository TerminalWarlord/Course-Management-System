@extends('teacher.layouts.single_col')
@section('title')
<title>Register - Premier University</title>
@endsection
@section('contents')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="{{asset('assets/images/logo.svg')}}" alt="logo">
                        </div>
                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                        <form class="pt-3" action="{{url('/register-confirm')}}" enctype="multipart/form-data"
                            method="post">
                            @csrf
                            @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="first_name"
                                    placeholder="First Name" name="first_name">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="last_name"
                                    placeholder="Last Name" name="last_name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="email" placeholder="Email"
                                    name="email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="student_id"
                                    placeholder="Student ID" name="student_id">
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control form-control-lg" id="contact_no"
                                    placeholder="Contact No." name="contact_no">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-lg" id="dob"
                                    placeholder="Date of Birth" name="dob">
                            </div>
                            
                            <div class="form-group">
                                <select class="form-control form-control-lg"
                                    name="department" id="department">
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control form-control-lg" id="exampleFormControlSelect2"
                                    name="batch">
                                    <option value="36th">36th</option>
                                    <option value="37th">37th</option>
                                    <option value="38th">38th</option>
                                    <option value="39th">39th</option>
                                    <option value="40th">40th</option>
                                    <option value="41th">41th</option>
                                    <option value="42th">42th</option>
                                    <option value="43th">43th</option>
                                    <option value="44th">44th</option>
                                    <option value="45th">45th</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                    placeholder="Enter Password" name="password1">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                    placeholder="Password" name="password2">
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        I agree to all Terms & Conditions
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" class="form-control form-control-lg" id="image"
                                    placeholder="Contact No." name="image">
                            </div>
                            
                            <div class="mt-3">
                                <button type="submit"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                    UP</button>

                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="{{url('login')}}" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

<script>
$(document).ready(function() {
    console.log(1);
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
})

</script>

@endsection