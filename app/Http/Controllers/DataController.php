<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Inertia\Inertia;
class DataController extends Controller
{
    public function getCountries()
    {
        $data = Country::get();
   
        return Inertia::render('Data',compact('data'));
    }


    public function getStates(Request $request)
    {
        $data = State::where('country_id', $request->country_id)->get();
   
        return response()->json($data);
    }


    public function index(){
        // $country = Country::with('state')->first();
        // return $country->state;

        // $country = State::with('country')->first();
        // dd($country);
        // return( $country->toArray());

        // $user = User::with('contact')->first();
        // return $user->contact;

        $user = User::with(['contact','posts'])->find(1);
        // $user =User::find(1);
        return $user->toArray();


        //many to Many relationship

        // $categories=Category::all();
        // $test = Post::with('categories')->first();
        // $test ->categories()->attach($categories);

        // dd($test->toArray());
       
    }

    public function getCities(){
        $cities = State::with('cities',)
                      ->orderBy('id','desc')
                      ->get();
    
        return response()->json($cities);

        // $data = State::where('country_id', $request->country_id)->get();

        // return response()->json($data);
    }
}
