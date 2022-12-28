<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\View;
class ViewController extends Controller
{
    public function index()
    {
        return Inertia::render('Student/Add');
    }

    public function edit()
    {
        return Inertia::render('Student/Edit');
    }

    // public function list(Student $student)
    // {
    //     // return Inertia::render('Student/List');

    //     return Inertia::render(
    //         'Student/List', 
    //         [
    //             'data' => $student->get()
    //         ]
    //     );
    // }
}
