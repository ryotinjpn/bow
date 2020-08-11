@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    @auth
    <div>
        <div class="container">
            <div class="main_view">
                <form method="post" action="{{ url('/posts') }}" enctype="multipart/form-data" class="post_form">
                    {{ csrf_field() }}
                    <div class="form-item">
                        <textarea id="form_caption" name="content" placeholder="キャプションを書く">{{ old('content') }}</textarea>
                        <span class="picture">
                            <label class="picture_label" for="post_picture"><i class="far fa-image picture_icon fa_icon"></i>
                                <div id="picture_file">
                                    <input accept="image/jpeg,image/gif,image/png,video/*" type="file" name="picture" id="post_picture">
                                </div>
                            </label>
                        </span>
                    </div>
                    <input type="submit" value="投稿する" class="btn_post">
                </form>
                <ul>
                    @forelse ($posts as $post)
                        <li>
                            <div>
                                <img src="/storage/{{ $post->picture }}" width="100%" height="100%">
                                <div>{{ $post->content }}</div>
                            </div>
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
