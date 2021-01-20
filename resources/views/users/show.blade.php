@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    <div class="container">
        <div class="main_view">
            <div class="user_top">
                @if (empty($user->image))
                    <img src="/images/usericon.png" class="icon_image_prof">
                @else
                    <img src="{{ $user->image }}" class="icon_image_prof">
                @endif

                <span class="user_name">{{ $user->name }}<span>
            </div>
            <div>{{ $user->profile }}</div>

            <a href="{{ $user->youtube }}">YouTubeチャンネル</a>

            <ul>
                @forelse ($posts as $post)
                    <li>
                        <div class="user_timeline">
                            <div class="user_image_name">
                                @if (empty($post->user->image))
                                    <a href="{{ url('users/' . $post->user_id) }}"><img src="/images/usericon.png" class="icon_image_feed"></a>
                                @else
                                    <a href="{{ url('users/' . $post->user_id) }}"><img src="{{ $post->user->image }}" class="icon_image_feed"></a>
                                @endif

                                <a href="{{ url('users/' . $post->user_id) }}" class="user_name">{{ $post->user->name }}</a>
                            </div>
                        </div>

                        @if (File::extension($post->picture) == 'jpeg'
                            || File::extension($post->picture) == 'jpg'
                            || File::extension($post->picture) == 'png'
                            || File::extension($post->picture) == 'gif')
                            <img src="{{ $post->picture }}" width="100%" height="100%">
                        @else
                            <video src="{{ $post->picture }}" width="100%" height="100%" controls="controls"></video>
                        @endif

                        <div>
                            @if ($post->isLikedByAuthUser())
                                <a href="{{ url('posts/unlike/' . $post->id) }}" class="glyphicon glyphicon-heart">{{ $post->likes->count() }}</a>
                            @else
                                <a href="{{ url('posts/like/' . $post->id) }}" class="glyphicon glyphicon-heart-empty">{{ $post->likes->count() }}</a>
                            @endif
                        </div>
                        <div>{{ $post->content }}</div>
                        <div>{{ $post->created_at->diffForHumans() }}</div>
                    </li>
                @empty
                    <li>投稿はまだありません</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
