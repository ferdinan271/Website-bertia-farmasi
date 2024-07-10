<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $slug)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required'
        ]);

        $post_id = Post::where('slug', $slug)->get()->first();

        $validateData['post_id'] = $post_id->id;

        Comment::create($validateData);

        return back();
    }
}
