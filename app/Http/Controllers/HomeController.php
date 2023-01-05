<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource;
use Inertia\Inertia;


class HomeController extends Controller
{
    //
    public function edit($id)
    {
        
        $data= Resource::where('id',$id)->with('language')->first();
        // dd($data);
        return Inertia::render('Resource/Edit',['data'=>$data]);
    }
}
