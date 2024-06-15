@extends('teacher.layouts.two_col')
@section('main')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <h2>Add Course</h2>
        <form action="/store-course" method="post">
            @csrf
            <div id="po-box">
                <div class="form-group">
                    <input type="text" name="title" id="title" placeholder="Course Title" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <input type="text" name="course_code" placeholder="Course Code"  id="course_code" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="department" placeholder="Department"  id="department" class="form-control">
                </div>
                <div class="form-group">
                    <input type="number" name="total_po" placeholder="Total PO" class="form-control" id="total_po">
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary" id="po_next">Next</button>
                    </div>
                    
                </div>
            </div>
            
            <div class="co-box">
                <div class="form-group">
                    <input type="text" name="details" placeholder="Total PO" class="form-control" id="total_po">
                </div>
                <div id="po-checkbox">
                    <!-- <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value="">Option 2
                        </label>
                    </div> -->
                </div>
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
        $(document).ready(function(){
            $('#po_next').click(function(e){
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
                    'success': function(res){
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