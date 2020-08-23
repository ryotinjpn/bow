@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    <div class="container">
        <div class="main_view">
            <div class="post_view">
                <div>
                    <div class="user_timeline">
                        @if (empty($post->user->image))
                            <a href="{{ action('UsersController@show', $post->user_id) }}"><img src="/images/usericon.png"
                                    class="icon_image_feed"></a>
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
                </div>
                <div>
                    <form method="post" action="{{ action('CommentsController@store', $post) }}">
                        {{ csrf_field() }}
                        <p>
                            <input type="text" name="text" placeholder="enter comment" value="{{ old('text') }}">
                        </p>
                        <p>
                            <input type="submit" value="Add Comment">
                        </p>
                    </form>
                </div>
                <div>
                    <ul>
                        @forelse ($post->comments as $comment)
                            <li>
                                {{ $comment->text }}
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <script src="/js/main.js"></script>
    @endsection
