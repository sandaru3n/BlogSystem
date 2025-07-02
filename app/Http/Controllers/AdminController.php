<?php
namespace App\Http\Controllers;

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