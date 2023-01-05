<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\State;
use App\Models\Country;
use App\Models\Resource;
use App\Models\Language;

use App\Http\Resources\ResourceResource;
class ResourceController extends Controller
{
    public function index()
    {
        return Inertia::render('Resource/Add');
    }


    public function store(Request $request)
    {
        $resource=Resource::create($request->only('name', 'clas','address','country_id', 'state_id','dob','gender','text'));
        return response()->json(200);

    }

    public function list()
    {
        return Inertia::render('Resource/List');
    }

    public function lists()
    {
        return ResourceResource::collection(
            Resource::get()
        );
        
        return response()->json(['data'=> $data],200);
    }

    public function edit($id)
    {
        
        $data= Resource::where('id',$id)->with('language')->first();
        // dd($data);
        return Inertia::render('Resource/Edit',['data'=>$data]);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Resource $resource)
    {
        dd($request);
        // $resource = Resource::where('id',$id)->first();

        $resource->update($request->only('name','clas','address', 'country_id','state_id','dob','gender','text'));
        // $resource->language()->sync(collect(request('language')));

        return response()->json(['data' => 'Updated'], 200);
    }

    public function destroy($id)
    {
        $resource = Resource::find($id);
        $resource->delete();
        $resource->language()->detach();

        return response()->json('project deleted!');
    }
}
