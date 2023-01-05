<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\State;
use App\Models\Country;
use App\Models\Project;
use App\Models\Language;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Http\Requests\UpdateProjectRequest;


class ProjectController extends Controller
{
    public function index()
    {
        return Inertia::render('Project/Add');
    }

    public function store(CreateProjectRequest $request)
    {
        $project=Project::create($request->only('name', 'clas','address','country_id', 'state_id','dob','gender','text'));
        return response()->json(200);
        // return Redirect ('/list');

    }
    public function languageGet()
    {
        $data = Language::all();
        return response()->json(['data'=>$data],200);
    }

    public function list()
    {
        return Inertia::render('Project/List');
    }

    public function lists()
    {
        return ProjectResource::collection(
            Project::get()
        );
        return response()->json(['data'=> $data],200);
    }
    public function edit($id)
    {
        
        $data= Project::where('id',$id)->with('language')->first();
        // dd($data);
        return Inertia::render('Project/Edit',['data'=>$data]);
    }

    public function update(UpdateProjectRequest $request,Project $project,$id)
    {
        $project = Project::where('id',$id)->first();
        $project->update($request->only('name', 'clas','address', 'country_id', 'state_id','dob','gender','text'));
        // dd($project);
        $project->language()->sync(collect(request('language')));

        return response()->json('Project updated!');
    }



    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        $project->language()->detach();

        return response()->json('project deleted!');
    }

    public function getCountries()
    {
        $data = Country::get();
        // dd($data);
        return response()->json($data);
    }
    public function state($id)
    {
        $data = State::where('country_id',$id)->get();

        return response()->json(['data'=> $data]);
        //

    }
}
