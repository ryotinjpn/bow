@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="form-wrapper">
            <h1>{{ __('Login') }}</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-item">
                    <input id="email" type="email" class="form-control 
                            @error('email') is-invalid @enderror" name="email" placeholder="Email Address"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-item">
                    <input id="password" type="password" class="form-control" placeholder="Password" @error('password')
                        is-invalid @enderror name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="button-panel">
                    <button type="submit" class="button">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
            <div class="form-footer">
                <p><a href="#">Create an account</a></p>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
