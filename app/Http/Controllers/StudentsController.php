<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Student;
use App\Models\State;
use App\Models\Country;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Resources\StudentResource;

class StudentsController extends Controller
{
    public function index()
    {
        return Inertia::render('Students/AddStudent');
    }

    public function store(CreateStudentRequest $request)
    {
        Student::create($request->only('fname', 'lname', 'clas','zip', 'country_id', 'state_id'));
       
        return response()->json(200);
    }

    public function getCountries()
    {
        $data = Country::get();

        return response()->json($data);
    }
    public function state($id)
    {
        $data = State::where('country_id',$id)->get();

        return response()->json(['data'=> $data]);
        //

    }


    public function list()
    {
        return Inertia::render(
            'Students/ListStudent', 
            
                
        );
    }

    public function lists()
    {
        return StudentResource::collection(
            Student::get()
        );
    // $data= ::Studentwith('country','state')->get();
        return response()->json(['data'=> $data],200);
    }

    public function edit($id)
    {
        
        $data= Student::where('id',$id)->first();
        // dd($data);
        return Inertia::render('Students/EditStudent',['data'=>$data]);
    }

    public function update( $id,UpdateStudentRequest $request)
    {
        $student = Student::where('id',$id)->first();
        // dd($student);
        $student->update($request->all());
        return response()->json('Student updated!');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json('student deleted!');
    }
}

