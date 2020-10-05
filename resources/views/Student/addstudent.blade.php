@extends('layouts.backend_main')
@section('title') Students | Task @endsection
@section('main_content')
<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Students</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Students</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 box-margin"> 
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-rounded btn-primary mb-2 mr-2 pull-right" data-toggle="modal" data-target="#addModal">Add Students</button>
                            <br />
                            <h4 class="card-title mb-3">Students List</h4>
                            <div class="row d-print-none">
                                <div class="col-12">
                                      <div class="row mt-3">
                                         <div class="col-md-1 mb-1"></div>
                                         <div class="col-md-4 mb-1">
                                            <select name="dept" id="filter_dept" class="form-control select2" data-toggle = "select2" required onchange='loaddata()' >
                                               <option value="">Select A Department</option>
                                               @foreach($dept as $value)
                                                    <option value = "{{$value->id}}">{{$value->dept_name}}</option>
                                                @endforeach
                                            </select>
                                         </div>
                                         <div class="col-md-4 mb-1">
                                            <select name="blood" id="filter_blood" class="form-control select2" data-toggle = "select2" required onchange='loaddata()'>
                                               <option value="">Select Blood Group</option>
                                               @foreach($blood as $value)
                                               <option value = "{{$value->id}}">{{$value->blood_group}}</option>
                                               @endforeach
                                            </select>
                                         </div>
                                      </div>
                                      <div class="card-body">   
                                        <div id="datalist"></div>
                                      </div>
                                </div>
                            </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body">
                <form id="student_save" method="post">
                    {{ csrf_field() }} 
                    <div class="form-group">
                        <label for="exampleInputEmail111">Student Name</label>
                        <input type="text" class="form-control" id="std_name" name="std_name" placeholder="Enter Student Name">
                        <span class="help-block" id="std_name_error" style="color:red;"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Student Father Name</label>
                        <input type="text" class="form-control" id="std_father_name" name="std_father_name" placeholder="Enter Student Father Name">
                        <span class="help-block" id="std_father_name_error" style="color:red;"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Student Mother Name</label>
                        <input type="text" class="form-control" id="std_mother_name" name="std_mother_name" placeholder="Enter Student Mother Name">
                        <span class="help-block" id="std_mother_name_error" style="color:red;"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Department</label>
                        <select class="form-control" id="dept_name" name="dept_name">
                            <option value selected hidden>Select Department</option>
                            @foreach($dept as $value)
                            <option value = "{{$value->id}}">{{$value->dept_name}}</option>
                            @endforeach
                        </select>
                        <span class="help-block" id="dept_name_error" style="color:red;"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Blood Group</label>
                        <select class="form-control" id="blood_group" name="blood_group">
                            <option value selected hidden>Select Blood Group</option>
                            @foreach($blood as $value)
                            <option value = "{{$value->id}}">{{$value->blood_group}}</option>
                            @endforeach
                        </select>
                        <span class="help-block" id="blood_group_error" style="color:red;"></span>
                    </div>

                    <div class="form-row">
                        <label for="exampleInputEmail111">Birth Date</label>
                        <input type="date" class="form-control" id="std_birth_date" name="std_birth_date" placeholder="Enter Birth Date">
                        <span class="help-block" id="std_birth_date_error" style="color:red;"></span>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-success mb-2 mr-2 submit">Submit</button>
                        <button type="button" class="btn btn-rounded btn-secondary mb-2 mr-2" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="show_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Show Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="student_show" >
                    
                    <div class="form-group">
                        <label for="exampleInputEmail111">Student Name</label>
                        <input type="text" class="form-control" id="show_student_name" name="std_name" disabled>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Student Father Name</label>
                        <input type="text" class="form-control" id="show_father_name" name="std_father_name" disabled>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Student Mother Name</label>
                        <input type="text" class="form-control" id="show_mother_name" name="std_mother_name" disabled>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Department</label>
                        <select class="form-control" id="show_department_name" name="dept_name" disabled>
                            <option value="" selected hidden>Select Department</option>
                            @foreach($dept as $value)
                            <option value ="{{$value->id}}">{{$value->dept_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail111">Blood Group</label>
                        <select class="form-control" id="show_blood_group" name="blood_group" disabled>
                            <option selected hidden>Select Blood Group</option>
                            @foreach($blood as $value)
                            <option value = "{{$value->id}}">{{$value->blood_group}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="exampleInputEmail111">Birth Date</label>
                        <input type="date" class="form-control" id="show_birth_date" name="std_birth_date" type="date" disabled>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-secondary mb-2 mr-2" data-dismiss="modal">Close</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="edit_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="student_update" method="PUT">
                    {{ csrf_field() }} 
                    <input type="hidden" id="edit_student_id" name="id">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail111">Student Name</label>
                        <input type="text" class="form-control" id="edit_student_name" name="std_name" placeholder="Enter Student Name">
                        <span class="help-block" id="std_name_edit" style="color:red;"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Student Father Name</label>
                        <input type="text" class="form-control" id="edit_student_father_name" name="std_father_name" placeholder="Enter Student Father Name">
                        <span class="help-block" id="std_father_name_edit" style="color:red;"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Student Mother Name</label>
                        <input type="text" class="form-control" id="edit_student_mother_name" name="std_mother_name" placeholder="Enter Student Mother Name">
                        <span class="help-block" id="std_mother_name_edit" style="color:red;"></span>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Department</label>
                        <select class="form-control" id="edit_department_name" name="dept_name">
                            <option value="" selected hidden>Select Department</option>
                            @foreach($dept as $value)
                            <option value ="{{$value->id}}">{{$value->dept_name}}</option>
                            @endforeach
                        </select>
                        <span class="help-block" id="dept_name_edit" style="color:red;"></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail111">Blood Group</label>
                        <select class="form-control" id="edit_blood_group" name="blood_group">
                            <option selected hidden>Select Blood Group</option>
                            @foreach($blood as $value)
                            <option value = "{{$value->id}}">{{$value->blood_group}}</option>
                            @endforeach
                        </select>
                        <span class="help-block" id="blood_group_edit" style="color:red;"></span>
                    </div>

                    <div class="form-row">
                        <label for="exampleInputEmail111">Birth Date</label>
                        <input type="date" class="form-control" id="edit_birth_date" name="std_birth_date" type="number" placeholder="Enter Birth Daye ">
                        <span class="help-block" id="std_birth_date_edit" style="color:red;"></span>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-success mb-2 mr-2 update">Update</button>
                        <button type="button" class="btn btn-rounded btn-secondary mb-2 mr-2" data-dismiss="modal">Close</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

@endsection @section('script')
<script type="text/javascript" src="{{asset('ajax/student.js')}}"></script>
@endsection
