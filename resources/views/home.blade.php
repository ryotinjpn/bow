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
                        <textarea name="content" placeholder="キャプションを書く">{{ old('content') }}</textarea>
                        <textarea name="picture" placeholder="picture">{{ old('picture') }}</textarea>
                        @if ($errors->has('content'))
                            <span class="error">{{ $errors->first('content') }}</span>
                        @endif
                    </p>
                    <input type="submit" value="投稿する">
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
