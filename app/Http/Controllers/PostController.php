<?php
namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('post.index', compact('posts'));
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
    }
}