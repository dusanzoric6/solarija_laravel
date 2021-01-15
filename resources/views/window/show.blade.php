@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$post->image}}" class="w-100">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div>
                        <img src="/storage/{{$post->user->profile->image}}" class="w-100 rounded-circle"
                             style="max-width: 50px">
                    </div>
                    <div class="pl-3">
                        <a href="/profile/{{$post->user->id}}">
                            <h7 class="font-weight-bold pr-3">
                                <span class="text-dark">
                                    {{$post->user->username}}
                                </span>
                            </h7></a>
                        <a href="#" class="pl-2">Follow</a>
                    </div>
                </div>

                    <hr>

                <div>
                    <span class="d-flex pt-3">
                        <a href="/profile/{{$post->user->id}}">
                            <h7 class="font-weight-bold pr-3">
                                <span class="text-dark">
                                    {{$post->user->username}}
                                </span>
                            </h7></a>
                        <p>{{$post->caption}}</p>
                    </span>
                </div>

            </div>
        </div>

    </div>

@endsection
