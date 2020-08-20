@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    <div class="home_view">
        <div>
            <ul>
                <li>
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
                </li>
            </ul>
        </div>
    </div>
    {{-- <p>{!! nl2br(e($post->body)) !!}</p> --}}

    {{-- <h2>Comments</h2>
    <ul>
        @forelse ($post->comments as $comment)
        <li>
            {{ $comment->body }}
            <a href="#" class="del" data-id="{{ $comment->id }}">[x]</a>
            <form method="post" action="{{ action('CommentsController@destroy', [$post, $comment]) }}"
                id="form_{{ $comment->id }}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
            </form>
        </li>
        @empty
        <li>No comments yet</li>
        @endforelse
    </ul>
    <form method="post" action="{{ action('CommentsController@store', $post) }}">
        {{ csrf_field() }}
        <p>
            <input type="text" name="body" placeholder="enter comment" value="{{ old('body') }}">
            @if ($errors->has('body'))
                <span class="error">{{ $errors->first('body') }}</span>
            @endif
        </p>
        <p>
            <input type="submit" value="Add Comment">
        </p>
    </form> --}}
    <script src="/js/main.js"></script>
@endsection
