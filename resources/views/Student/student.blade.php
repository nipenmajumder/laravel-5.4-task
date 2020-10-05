<table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Student Father Name</th>
            <th>Student Mother Name</th>
            <th>Department</th>
            <th>Blood Group</th>
            <th>Birth Date</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>

    <tbody>
         @foreach($student as $key => $value)
            <tr>
                <td>{{$value->std_name}}</td>
                <td>{{$value->std_father_name}}</td>
                <td>{{$value->std_mother_name}}</td>
                <td>{{$value->dept->dept_name}}</td>
                <td>{{$value->blood->blood_group}}</td>
                <td>{{$value->std_birth_date}}</td>
                <td class="text-center">                               
                    <button data="{{$value->id}}" class="btn btn-rounded btn-outline-info mb-2 mr-2 show" data-toggle="modal" data-target="#show_student">Show</button>
                    <button data="{{$value->id}}" class="btn btn-rounded btn-outline-info mb-2 mr-2 edit" data-toggle="modal" data-target="#edit_student">Edit</button>
                    <button type="submit" class="btn btn-rounded btn-outline-danger mb-2 mr-2 delete" data="{{ $value->id }}">Delete<i class="fas fa-trash"></i></button>
                </td>
            </tr>
        @endforeach 
    </tbody>
</table>



