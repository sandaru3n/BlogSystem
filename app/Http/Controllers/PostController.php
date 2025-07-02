<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('post.index', compact('posts'));
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
    }

    public function storeComment(Request $request, Post $post) {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        $user = Auth::user();
        $comment = new Comment([
            'post_id' => $post->id,
            'name' => $user->name,
            'email' => $user->email,
            'content' => $request->input('content'),
        ]);
        $comment->save();
        return redirect()->route('post.show', $post->slug)->with('status', 'Comment added!');
    }
}