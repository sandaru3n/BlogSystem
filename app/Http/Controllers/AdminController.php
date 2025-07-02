<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function dashboard() {
        $posts = Post::count();
        $comments = Comment::count();
        return view('admin.dashboard', compact('posts', 'comments'));
    }
}