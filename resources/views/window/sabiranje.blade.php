@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="text-center">
            <h1>sabiranje</h1>
        </div>

        <form action="{{url('sabiranje')}}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-8 offset-1">

                    <label for="first-number" class="col-md-4 col-form-label">first number</label>

                    <div class="col-md-2">
                        <input id="first-number" type="text"
                               class="form-control @error('first-number') is-invalid @enderror"
                               name="first-number"
                               value="{{ old('first-number') }}" autocomplete="first-number" autofocus>

                        @error('first-number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label for="operation" class="col-md-4 col-form-label">operation</label>
                    <div class="col-md-2">
                        <input id="operation" type="text"
                               class="form-control @error('operation') is-invalid @enderror"
                               name="operation"
                               value="{{ old('operation') }}" autocomplete="operation" autofocus>

                        @error('operation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label for="first-number" class="col-md-4 col-form-label">second number</label>

                    <div class="col-md-2">
                        <input id="second-number" type="text"
                               class="form-control @error('second-number') is-invalid @enderror"
                               name="second-number"
                               value="{{ old('second-number') }}" autocomplete="second-number" autofocus>

                        @error('second-number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="pt-3 offset-md-1">
                        <button class="btn btn-outline-primary">Add</button>
                    </div>

                    <br>

                    <label for="first-number" class="col-md-4 col-form-label">result</label>

                    <div class="col-md-2">
                        <input id="result" type="text"
                               class="form-control @error('result') is-invalid @enderror"
                               name="result"
                               value="{{ $result ?? '' }}" autocomplete="result" autofocus>

                        @error('result')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
            </div>
    </form>


    </div>
@endsection