@extends('layouts.app')

@section('content')

    <div class="container">

        <form action="{{url('post')}}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-8 offset-1">

                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>

                    <div class="col-md-6">
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                               name="caption"
                               value="{{ old('caption') }}" autocomplete="caption" autofocus>

                        @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="pt-3">
                        <label for="image" class="col-md-4 col-form-label">Post Image</label>
                    </div>
                    <div class="pl-3">
                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                            <strong>{{ $message }}</strong>
                        @enderror
                        <div class="pt-3">
                            <button class="btn btn-outline-primary">Add new post</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

@endsection
