@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    <div class="center">
        <div class="form-wrapper">
            <h1>{{ __('ユーザー情報編集') }}</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-item">
                    <input id="name" type="text" placeholder="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-item">
                    <input id="email" type="email" placeholder="{{ $user->email }}"
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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
