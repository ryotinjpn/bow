@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    <div class="center">
        <div class="form-wrapper">
            <h1>{{ __('ユーザー情報編集') }}</h1>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            <form method="post" action="{{ url('/users/edit') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-item">
                    <div style="text-align: left">ユーザー名</div>
                    <input id="name" type="text" placeholder="{{ $user->name }}"
                        class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}"
                        required autocomplete="name" autofocus>
                </div>
                <div class="form-item">
                    <div style="text-align: left">メールアドレス</div>
                    <input id="email" type="email" placeholder="{{ $user->email }}"
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"
                        required autocomplete="email">
                </div>
                <div class="form-item">
                    <div style="text-align: left">プロフィール</div>
                    <textarea id="profile" type="text" placeholder="{{ $user->profile }}" name="profile"
                        value="{{ $user->profile }}"></textarea>
                </div>
                <div class="form-item">
                    <div style="text-align: left">プロフィール画像</div>
                    <input type="file" name="image" id="image">
                </div>
                <div class="form-item">
                    <div style="text-align: left">YouTubeチャンネル</div>
                    <input id="youtube" type="text" placeholder="{{ $user->youtube }}" name="youtube"
                        value="{{ $user->youtube }}">
                </div>
                <div class="button-panel">
                    <button type="submit" class="button">
                        {{ __('変更') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
