@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    @auth
        <div class="container">
            <div class="main_view">
                <h1>Hello</h1>
                <form method="post" action="{{ url('/posts') }}">
                    {{ csrf_field() }}
                    <p>
                        <input type="text" name="title" placeholder="enter title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <span class="error">{{ $errors->first('title') }}</span>
                        @endif
                    </p>
                    <p>
                        <textarea name="body" placeholder="enter body">{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <span class="error">{{ $errors->first('body') }}</span>
                        @endif
                    </p>
                    <input type="submit" value="Add">
                    <p>
                    </p>

                </form>
            </div>
        </div>
    @else
        <div class="center">
            <div class="top_image">
                <img class="top_dog" src="images/dogtop.jpg">
                <div class="top_image2">
                    <img class="top_logo" src="images/logo.png">
                    <a class="top_btn" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                </div>
            </div>
        </div>
    @endauth
@endsection
