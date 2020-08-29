@extends('layouts.app')

@section('content')
@guest
    @include('commons.guest_toppage')
@endguest

    @if(Auth::check())
        {{-- 投稿切り替えボタン --}}
        @include('commons.posts_sort_button')
    @endif

    {{-- 投稿一覧(新着投稿順) --}}
    @include('posts.posts')

@endsection