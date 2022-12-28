<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Student;
class StudentController extends Controller
{
    //

    public function store(Request $request)
    {
        Student::create($request->all());
  
        return redirect()->back()
                    ->with('message', 'Student Added Successfully.');
    }



    public function list(Student $student)
    {
        // return Inertia::render('Student/List');
       $student= Student::all();
    //    dd($student);
        return Inertia::render(
            'Student/List', 
            [
                'data' => $student  ]
                
        );
    }

    public function edit($id)
    {

        $student = Student::find($id);
        return Inertia::render(
                'Student/Edit', 
                [
                    'data' => $student  ]
                    
                );
    }

    public function update(Request $request)
    {
        if ($request->has('id')) {
            Article::find($request->input('id'))->update($request->all());
            return redirect()->back()
                    ->with('message', 'Post Updated Successfully.');
        }
    }


    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json('student deleted!');
    }
}
