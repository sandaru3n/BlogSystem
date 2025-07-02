<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Show the admin user's profile edit form.
     */
    public function editProfile()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Update the admin user's profile.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ]);
        $user->update($request->only('name', 'bio'));
        return redirect()->back()->with('status', 'Profile updated successfully!');
    }
}