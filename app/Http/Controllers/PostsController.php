<?php

namespace App\Http\Controllers;

use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts/create');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function store()
        
    {

        request()->validate([
            'caption' => 'required', 'unique',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');      // saves image to my local folder 'uploads'
        $image = Image::make(public_path("storage/" . $imagePath))->fit(1200, 1200);    // resize
        $image->save();

        auth()->user()->posts()->create([
            'caption' => request('caption'),
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show($postId){

        $post = Post::findOrFail($postId);

        return view("/posts/show", [
            "post" => $post,
        ]);
    }
}
