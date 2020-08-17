@extends('layouts.app')

@section('title', 'BOW')

@section('content')
    <div class="container">
        <div class="main_view">
            <div class="user_top">
                @forelse ($users as $user)
                    @if (empty($user->image))
                        <img src="/images/usericon.png" class="icon_image_prof">
                    @else
                        <img src="{{ $user->image }}" class="icon_image_prof">
                    @endif
                    <span class="user_name">{{ $user->name }}<span>
                        @endforelse
            </div>
        </div>
    </div>
@endsection
