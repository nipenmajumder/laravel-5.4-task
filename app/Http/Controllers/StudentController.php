<?php

namespace App\Http\Controllers;

use App\Student;
use App\Blood;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['blood'] = Blood::get();
        $data['dept'] = Department::get();
        return view('Student.addstudent',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  
        $student = Student::where(function($query) use($request){
            if ($request->dept) {
                $query->where('dept_name', $request->dept);
            }
            if ($request->bg) {
                $query->where('blood_group', $request->bg);
            }
        })
        ->orderBy('id', 'asc')->get();
        $blood = Blood::get();
        $department = Department::get();
        return view('Student.student',[
            'student'=>$student,
            'blood'=>$blood,
            'department'=>$department,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {   
        $student = new Student;
        $student->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $student
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    public function studentShow($id)
    {
        $data['blood'] = Blood::get();
        $data['dept'] = Department::get();
        $data['student_show'] = Student::findOrFail($id);
        return response()->json($data, 201);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data['blood'] = Blood::get();
        $data['dept'] = Department::get();
        $student_edit = Student::findOrFail($id);
        return response()->json($student_edit, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $student
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return response()->json(null, 200);
    }
}
