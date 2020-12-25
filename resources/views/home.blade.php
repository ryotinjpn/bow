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

                    <div>
                        <form method="post" action="{{ url('/posts') }}" enctype="multipart/form-data" class="post_form">
                            {{ csrf_field() }}
                            <div class="form-item">
                                <textarea id="form_caption" name="content"
                                    placeholder="キャプションを書く">{{ old('content') }}</textarea>
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
                    </div>
                    <div class="home_view">
                        <div>
                            <ul>
                                @forelse ($posts as $post)
                                    <li>
                                        <div class="user_timeline">
                                            <div>
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
                                            <div>
                                                @if ($post->isFavoritedByAuthUser())
                                                    <a href="{{ route('posts.unfavorite', ['id' => $post->id]) }}"
                                                        class="fas fa-bookmark"></a>
                                                @else
                                                    <a href="{{ route('posts.favorite', ['id' => $post->id]) }}"
                                                        class="far fa-bookmark fav"></a>
                                                @endif
                                            </div>
                                        </div>
                                        @if (File::extension($post->picture) == 'jpeg' || File::extension($post->picture) == 'jpg' || File::extension($post->picture) == 'png' || File::extension($post->picture) == 'gif')
                                            <a href="{{ action('PostsController@show', $post->id) }}"><img
                                                    src="{{ $post->picture }}" width="100%" height="100%"></a>
                                        @else
                                            <video src="{{ $post->picture }}" width="100%" height="100%"
                                                controls="controls"></video>
                                        @endif
                                        <div>{{ $post->content }}</div>
                                        <div>
                                            @if ($post->isLikedByAuthUser())
                                                <a href="{{ route('posts.unlike', ['id' => $post->id]) }}"
                                                    class="glyphicon glyphicon-heart">{{ $post->likes->count() }}</a>
                                            @else
                                                <a href="{{ route('posts.like', ['id' => $post->id]) }}"
                                                    class="glyphicon glyphicon-heart-empty">{{ $post->likes->count() }}</a>
                                            @endif
                                        </div>
                                        <a class="" href="{{ action('PostsController@show', $post->id) }}">コメントを見る</a>
                                        <div>{{ $post->created_at->diffForHumans() }}</div>
                                    </li>
                                @empty
                                    <li>投稿はまだありません</li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="user_home">
                            <div class="user_home_info">
                                @if (empty($user->image))
                                    <a href="{{ action('UsersController@show', $user->id) }}"><img src="/images/usericon.png"
                                            class="icon_image_feed"></a>
                                @else
                                    <a href="{{ action('UsersController@show', $user->id) }}"><img src="{{ $user->image }}"
                                            class="icon_image_feed"></a>
                                @endif
                                <a href="{{ action('UsersController@show', $user->id) }}"
                                    class="user_name">{{ $user->name }}</a>
                            </div>
                            <div class="user_home_index">
                                <h5>おすすめ</h5>
                                <a href="{{ action('UsersController@index') }}">すべてを見る</a>
                            </div>
                            <div class="user_home_user">
                                <ul>
                                    @foreach ($users as $user)
                                        <li>
                                            <div class="user_home_info">
                                                @unless($user == Auth::user())
                                                    @if (empty($user->image))
                                                        <a href="{{ action('UsersController@show', $user->id) }}"><img
                                                                src="/images/usericon.png" class="icon_image_feed"></a>
                                                    @else
                                                        <a href="{{ action('UsersController@show', $user->id) }}"><img
                                                                src="{{ $user->image }}" class="icon_image_feed"></a>
                                                    @endif
                                                    <a href="{{ action('UsersController@show', $user->id) }}"
                                                        class="user_name">{{ $user->name }}</a>
                                                @endunless
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
