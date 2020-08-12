@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="form-wrapper">
            <h1>{{ __('新規登録') }}</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-item">
                    <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-item">
                    <input id="email" type="email" placeholder="Email Address"
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-item">
                    <input id="password" type="password" placeholder="Password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-item">
                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control"
                        name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="button-panel">
                    <button type="submit" class="button">
                        {{ __('登録') }}
                    </button>
                </div>
            </form>
            <div class="form-footer">
                <p><a href="{{ route('login') }}">ログイン</a></p>
            </div>
        </div>
    </div>
@endsection
