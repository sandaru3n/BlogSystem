<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Slider;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('category')->latest()->paginate(10);
        $sliders = Slider::where('active', 1)->orderBy('order')->get();
        if (request()->routeIs('admin.*')) {
            return view('admin.posts.index', compact('posts'));
        }
        return view('post.index', compact('posts', 'sliders'));
    }

    public function show(Post $post) {
        $latestPosts = Post::where('id', '!=', $post->id)->latest()->take(5)->get();
        return view('post.show', compact('post', 'latestPosts'));
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

    public function create() {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'excerpt' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|max:2048',
        ]);
        $data = $request->only(['title', 'slug', 'excerpt', 'content', 'category_id']);
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }
        $data['user_id'] = Auth::id();
        $post = Post::create($data);
        return redirect()->route('admin.posts.index')->with('status', 'Post created!');
    }

    public function edit(Post $post) {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'excerpt' => 'required|string|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|max:2048',
        ]);
        $data = $request->only(['title', 'slug', 'excerpt', 'content', 'category_id']);
        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }
        $post->update($data);
        return redirect()->route('admin.posts.index')->with('status', 'Post updated!');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('status', 'Post deleted!');
    }

    public function adminIndex() {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function adminShow(Post $post) {
        return view('admin.posts.show', compact('post'));
    }
}