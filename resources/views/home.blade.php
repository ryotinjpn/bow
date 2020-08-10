@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    @auth
        <div class="container">
            <div class="main_view">
                <h1>Hello</h1>
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
