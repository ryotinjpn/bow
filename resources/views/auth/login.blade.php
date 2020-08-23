@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="form-wrapper">
            <h1>{{ __('ログイン') }}</h1>
            <form method="POST" action="{{ route('login') }}" class="form-auth">
                @csrf
                <div class="form-item">
                    <input id="email" type="email" placeholder="Email Address" class="form-control 
                                    @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                        autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-item">
                    <input id="password" type="password" placeholder="Password" class="form-control  @error('password')
                                is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="button-panel">
                    <button type="submit" class="button">
                        {{ __('ログイン') }}
                    </button>
                </div>
            </form>
            <div class="form-footer">
                <p><a href="{{ route('register') }}">新規登録</a></p>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input value="guest@example.com" type="hidden" name="email" id="email">
                    <input value="guestguest" type="hidden" name="password" id="password">
                    <div class="button-panel">
                        <button type="submit" class="button_guest">
                            {{ __('ゲストユーザーログイン') }}
                        </button>
                    </div>
                </form>
                {{-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif --}}
            </div>
        </div>
    </div>
@endsection
