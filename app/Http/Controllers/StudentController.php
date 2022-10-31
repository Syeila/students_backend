<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::orderBy('created_at','DESC')->get();
        $response = [
            'message' => 'List of student orderby created_at',
            'student' => $student
        ];

        return $response;
    }

    public function store(Request $request)
    {
        try{
            $student = Student::create($request->all());
            $response = [
                'message' => 'Student Created',
                'student' => $student
            ];
            return $response;
        }catch(QueryException $e){
             $response = [
                'message' => 'Failed' . $e->errorInfo
            ];
            return $response;
        }
    }

    public function show($id)
    {
        $student = Student::where('idstudents', $id)
        ->orderBy('created_at','DESC')
        ->get();
        $response = [
            'message' => 'Detail Student',
            'student' => $student
        ];

        return $response;
    }

    public function update(Request $request, Student $student)
    {   
        try{
            $student->avatar = $request->avatar;
            $student->name = $request->name;
            $student->gender = $request->gender;
            $student->dob = $request->dob;
            $student->save();
            $response = [
                'message' => 'Student Update',
                'student' => $student
            ];
            return $response;
        }catch(QueryException $e){
             $response = [
                'message' => 'Failed' . $e->errorInfo
            ];
            return $response;
        }

    }

    public function destroy($id)
    {
        try{
            $student=Student::where('idstudents',$id)->delete();
            $response = [
                'message' => 'Student deleted',
                'student' => $student
            ];
            return $response;
        }catch(QueryException $e){
             $response = [
                'message' => 'Failed' . $e->errorInfo
            ];
            return $response;
        }
    }
}
