<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $article = Article::find(1);

        $comments = $article->comments;

        dd($comments);
    }

    public function store(Request $request)
    {
        $article = Article::find(3);

        $comment = new Comment;
        $comment->comment = "Hi third comment";

        $article = $article->comments()->save($comment);

    }
}
