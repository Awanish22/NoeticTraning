<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ArticleController extends Controller
{
    public function index(Article $article)
    {
        return Inertia::render(
            'Article', 
            [
                'data' => $article->get()
            ]
        );
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
        ])->validate();
  
        Article::create($request->all());
  
        return redirect()->back()
                    ->with('message', 'Article Created Successfully.');
    }

    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'title' => ['required'],
        ])->validate();
  
        if ($request->has('id')) {
            Article::find($request->input('id'))->update($request->all());
            return redirect()->back()
                    ->with('message', 'Post Updated Successfully.');
        }
    }

    public function delete(Request $request)
    {
     
        $request->has('id') ? 
                Article::find($request->input('id'))->delete() :
                redirect()->back()
                    ->with('errors', 'Somethings goes wrong.');
        
        return redirect()->back()
                    ->with('message', 'Article deleted successfully.');
    }
}
