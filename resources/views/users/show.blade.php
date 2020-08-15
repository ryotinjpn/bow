@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    <div class="container">
        <div class="main_view">
            <div>{{ $user->name }}</div>
            @forelse ($posts as $post)
                <li>
                    <div>
                        <div>{{ $post->user->name }}</div>
                        @if (File::extension($post->picture) == 'jpeg' || File::extension($post->picture) == 'jpg' || File::extension($post->picture) == 'png' || File::extension($post->picture) == 'gif')
                            <img src="{{ $post->picture }}" width="100%" height="100%">
                        @else
                            <video src="{{ $post->picture }}" width="100%" height="100%" controls="controls"></video>
                        @endif
                        <div>{{ $post->content }}</div>
                        <div>{{ $post->created_at->diffForHumans() }}</div>
                    </div>
                </li>
            @empty
                <li>投稿はまだありません</li>
            @endforelse
            </ul>
        </div>
    </div>
@endsection
