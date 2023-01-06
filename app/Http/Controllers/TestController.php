<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\State;
use App\Models\Country;
use App\Models\Test;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Resources\TestResource;
use App\Http\Observers\TestObserver;
class TestController extends Controller
{
    public function index()
    {
        return Inertia::render('Test/Add');
    }


    public function store(Request $request)
    {
        $test=Test::create($request->only('name', 'clas','address','country_id', 'state_id','dob','gender','text'));
        return response()->json(200);

    }

    public function list()
    {
        return Inertia::render('Test/List');
    }

    public function lists()
    {
        return TestResource::collection(
            Test::get()
        );
        
        return response()->json(['data'=> $data],200);
    }

    public function edit($id)
    {
        
        $data= Test::where('id',$id)->with('language')->first();
        // dd($data);
        return Inertia::render('Test/Edit',['data'=>$data]);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Test $test)
    {
        // dd($request);
        // $test = Test::where('id',$id)->first();

        $test->update($request->only('name','clas','address', 'country_id','state_id','dob','gender','text'));
        // $test->language()->sync(collect(request('language')));

        return response()->json(['data' => 'Updated'], 200);
    }

    public function destroy(Test $test)
    {
        $test = Test::find($id);
        $test->Test::delete();
        $test->language()->detach();

        return response()->json('project deleted!');
    }
}
