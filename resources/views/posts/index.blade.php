@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    @auth
        <div class="container">
            <div class="main_view">
                <form method="post" action="{{ url('/posts') }}">
                    {{ csrf_field() }}
                    <p>
                        <textarea name="content" placeholder="キャプションを書く">{{ old('content') }}</textarea>
                        <input accept="image/jpeg,image/gif,image/png,video/*" type="file" name="picture" id="post_picture">
                        @if ($errors->has('content'))
                            <span class="error">{{ $errors->first('content') }}</span>
                        @endif
                    </p>
                    <input type="submit" value="投稿する">
                </form>
                <ul>
                    @forelse ($posts as $post)
                        <li>
                            {{ $post->content }}
                        </li>
                    @empty
                        <li>No posts yet</li>
                    @endforelse
                </ul>
            </div>
        </div>
    @endauth
@endsection
