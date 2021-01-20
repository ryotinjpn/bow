@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    <div class="container">
        <div class="main_view">
            <h1>ユーザー一覧</h1>

            <div class="all_user">
                <ul>
                    @foreach ($users as $user)
                        <li>
                            <div class="users">
                                @unless($user == Auth::user())
                                    @if (empty($user->image))
                                        <a href="{{ url('users/' . $user->id) }}"><img src="/images/usericon.png" class="icon_image_feed"></a>
                                    @else
                                        <a href="{{ url('users/' . $user->id) }}"><img src="{{ $user->image }}" class="icon_image_feed"></a>
                                    @endif

                                    <a href="{{ url('users/' . $user->id) }}" class="user_name">{{ $user->name }}</a>
                                @endunless
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
