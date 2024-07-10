<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {  
        $title = '';

        // return $post;
        return view('home', [
            "title" => "All Post" . $title,
            "active" => "posts",
            "posts" => Post::latest()->orderBy('created_at', 'desc')->paginate(10),
            "trending" => Post::orderBy('view', 'desc')->get(),
            "categories" => Category::all(),
        ]);
    }
    public function posts()
    {    
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        // return $post;
        return view('posts', [
            "title" => "All Post" . $title,
            "active" => "posts",
            "posts" => Post::latest()->orderBy('created_at', 'desc')->filter(request(['category']))->get(),
            "trending" => Post::orderBy('view', 'desc')->get(),
            "recent" => Post::orderBy('created_at', 'desc')->get(),
            "categories" => Category::all(),
        ]);
    }

    public function show(Post $post)
    {

        $comment = Comment::with('post')->where('post_id', $post->id)->get();

        $commentCount = Comment::with('post')->where('post_id', $post->id)->count();

        $likeCount = Like::with('post')->where('post_id', $post->id)->count();

        // Untuk menambah total view dari setiap orang membuka halaman blognya
        $view = $post->view + 1;

        Post::where('id', $post->id)
            ->update(['view' => $view]);

        return view('post', [
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post,
            "recent" => Post::orderBy('created_at', 'desc')->get(),
            "trending" => Post::orderBy('view', 'desc')->get(),
            "categories" => Category::all(),
            "comment" => $comment,
            "commentCount" => $commentCount,
            "likeCount" => $likeCount,
        ]);
    }

    public function like(Request $request, Post $post)
    {
        $user = auth()->user();

        // Cek apakah user sudah like atau belum
        $isLiked = $post->likes()->where('user_id', $user->id)->exists();

        // Jika belum, tambahkan like
        if (!$isLiked) {
            $post->likes()->create(['user_id' => $user->id]);
        } else {
            // Jika sudah, hapus like
            $post->likes()->where('user_id', $user->id)->delete();
        }

        return redirect()->back();
    }
}
