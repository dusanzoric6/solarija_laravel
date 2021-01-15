<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index($userId)
    {
        $user = User::findOrFail($userId);

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            });

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });

        return view('profiles/index', [
            "user" => $user,
            "follows" => $follows,
            "postCount" => $postCount,
            "followersCount" => $followersCount,
            "followingCount" => $followingCount,
        ]);
    }

    public function edit($userId)
    {
        $user = User::findOrFail($userId);

//        this edit view is now protected however is described in 'update' method in ProfilePolicy
        $this->authorize('update', $user->profile);

        return view('profiles/edit', [
            "user" => $user,
        ]);
    }

    public function update($userId)
    {

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')) {

            $imagePath = request('image')->store('profile', 'public');      // saves image to my local folder 'uploads'
            $image = Image::make(public_path("storage/" . $imagePath))->fit(1200, 1200);    // resize
            $image->save();
            $image_array = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
                $data,
                $image_array ?? []
            )
        );

        return redirect("profile/{$userId}");
    }
}
