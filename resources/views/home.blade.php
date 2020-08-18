@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    @guest
        <div class="center">
            <div class="top_image">
                <img class="top_dog" src="images/dogtop.jpg">
                <div class="top_image2">
                    <img class="top_logo" src="images/logo.png">
                    <a class="top_btn" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                </div>
            </div>
        </div>
    @endguest

    @auth
        <div>
            <div class="container">
                <div class="main_view">
                    <form method="post" action="{{ url('/posts') }}" enctype="multipart/form-data" class="post_form">
                        {{ csrf_field() }}
                        <div class="form-item">
                            <textarea id="form_caption" name="content" placeholder="キャプションを書く">{{ old('content') }}</textarea>
                            <span class="picture">
                                <label class="picture_label" for="post_picture"><i
                                        class="far fa-image picture_icon fa_icon"></i>
                                    <div id="picture_file">
                                        <input type="file" id="post_picture" name="picture" class="form-control">
                                    </div>
                                </label>
                            </span>

                        </div>
                        <input type="submit" value="投稿する" class="btn_post">
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <ul>
                        @forelse ($posts as $post)
                            <li>
                                <div class="user_timeline">
                                    @if (empty($post->user->image))
                                        <a href="{{ action('UsersController@show', $post->user_id) }}"><img
                                                src="/images/usericon.png" class="icon_image_feed"></a>
                                    @else
                                        <a href="{{ action('UsersController@show', $post->user_id) }}"><img
                                                src="{{ $post->user->image }}" class="icon_image_feed"></a>
                                    @endif
                                    <a href="{{ action('UsersController@show', $post->user_id) }}"
                                        class="user_name">{{ $post->user->name }}</a>
                                </div>
                                @if (File::extension($post->picture) == 'jpeg' || File::extension($post->picture) == 'jpg' || File::extension($post->picture) == 'png' || File::extension($post->picture) == 'gif')
                                    <img src="{{ $post->picture }}" width="100%" height="100%">
                                @else
                                    <video src="{{ $post->picture }}" width="100%" height="100%" controls="controls"></video>
                                @endif
                                <div>{{ $post->content }}</div>
                                <div>{{ $post->created_at->diffForHumans() }}</div>
                            </li>
                        @empty
                            <li>投稿はまだありません</li>
                        @endforelse
                    </ul>
                    
                </div>
            </div>
        </div>
    @endauth
@endsection
