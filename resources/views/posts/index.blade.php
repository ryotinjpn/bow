@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    @auth
        <div class="container">
            <div class="main_view">
                <form method="post" action="{{ url('/posts') }}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <p>
                        <textarea name="content" placeholder="キャプションを書く">{{ old('content') }}</textarea>
                        <input type="file" id="file" name="picture" class="form-control">
                    </p>
                    <input type="submit" value="投稿する">
                </form>
                <ul>
                    @forelse ($posts as $post)
                        <li>
                            <img src="/storage/{{ $post->picture }}" width="100px" height="100px">
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
