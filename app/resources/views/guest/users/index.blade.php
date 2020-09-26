@extends('layouts.app')
@section('title', 'users')
@section('breadcrumbs', Breadcrumbs::render('guest_mypage',$user_info))
@section('content')
    <div class="container">
        <div class="row justify-content-center mb50">
            <div class=" col-12">
                <div class="card">
                    <h3 class="card-header">
                        {{ $user_info->name }}
                    </h3>
                    <div class="card-body">
                        <h6 class="float-right">
                            <p class="font-weight-bolder">フォロワー</p>
                            <a class="text-secondary" href="{{ action('Guest\FollowsController@showFollowers', ['id' => $user_info->id] )}}">{{ $counts['count_followers'] }}</a>
                        </h6>
                        <h6 class="float-right mr20">
                            <p class="font-weight-bolder">フォロー</p>
                            <a class="text-secondary" href="{{ action('Guest\FollowsController@showFollowings',  ['id' => $user_info->id] )}}">{{ $counts['count_followings'] }}</a>
                        </h6> 
                        <p class="card-text">{{ $user_info->profile }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center container">
            @foreach($posts as $post)
                <div class="col-lg-4 col-12 mb50">
                    <div class="card">
                        @if(isset($post->firstPhoto()->image))
                            <img class="card-img-top" src="{{ Storage::disk('s3')->url('public/images/' . $post->firstPhoto()->image) }}">
                        @else
                            <img class="card-img-top" src="{{ asset('images/'.'noimageavailable.png') }}">
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="card-text">
                                <div>{{ $post->post }}</div>
                            </p>
                            <a href="{{ action('Guest\TimelineController@show',  $post->id )}}" class="btn btn-secondary">詳細</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection