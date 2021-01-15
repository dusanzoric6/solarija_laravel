<?php

namespace App\Http\Controllers;

use App\User;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($userId)
    {
        $user = User::findOrFail($userId);

        return auth()->user()->following()->toggle($user->profile);
    }
}
