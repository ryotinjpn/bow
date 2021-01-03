@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    <div class="container">
        <div class="main_view">
            <div class="post_view">
                <div>
                    <div class="user_timeline">
                        <div class="user_image_name">
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
                            <a href="{{ route('posts.unlike', ['id' => $post->id]) }}" class="glyphicon glyphicon-heart">{{ $post->likes->count() }}</a>
                        @else
                            <a href="{{ route('posts.like', ['id' => $post->id]) }}" class="glyphicon glyphicon-heart-empty">{{ $post->likes->count() }}</a>
                        @endif
                    </div>
                    <div>{{ $post->content }}</div>
                    <div>{{ $post->created_at->diffForHumans() }}</div>
                </div>
                <div>
                    <form method="post" action="{{ action('CommentsController@store', $post) }}">
                        {{ csrf_field() }}
                        <div class="comment_form">
                            <div class="form-item">
                                <textarea placeholder="コメントを書く" name="text" id="comment_text" value="{{ old('text') }}"></textarea>
                            </div>

                            <input type="submit" name="commit" value="投稿" class="btn_comment" data-disable-with="投稿">
                        </div>
                    </form>
                </div>
                <div>
                    @foreach ($post->comments as $comment)
                        <div class="user_timeline">
                            @if (empty($comment->user->image))
                                <a href="{{ action('UsersController@show', $comment->user_id) }}">
                                    <img src="/images/usericon.png" class="icon_image_feed">
                                </a>
                            @else
                                <a href="{{ action('UsersController@show', $comment->user_id) }}">
                                    <img src="{{ $comment->user->image }}" class="icon_image_feed">
                                </a>
                            @endif

                            <a href="{{ action('UsersController@show', $comment->user_id) }}"
                                class="user_name">{{ $comment->user->name }}
                            </a>
                            {{ $comment->text }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <script src="/js/main.js"></script>
@endsection
