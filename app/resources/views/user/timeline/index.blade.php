@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/utility.css') }}" rel="stylesheet">
@endsection
@section('title', 'timeline')
@section('content')
    <div class="row justify-content-center container pt20" style="margin: auto;">
        @foreach($all_posts as $post)
            <div class="col-lg-4 col-12 mb50">
                <div class="card shadow-lg rounded">
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
                        <a href="{{ action('User\TimelineController@show',  $post->id )}}" class="btn btn-secondary"><i class="fas fa-info-circle"></i> {{ __('messages.detail') }}</a>
                        <div class="d-flex justify-content-end flex-grow-1">
                            @if (Auth::user()->is_liking($post->id))
                                <div class="unlike">
                                    <span id="count_{{$post->id}}" class="badge badge-pill badge-success">{{  $post->liking_users()->count() }}</span>
                                    <i class="fav far fa-heart fa-3x" data-id="{{$post->id}}" data-name="unlike" style="cursor:pointer; color:red"></i>
                                </div>
                            @else
                                <div class="like">
                                    <span id="count_{{$post->id}}" class="badge badge-pill badge-success">{{  $post->liking_users()->count() }}</span>
                                    <i class="fav far fa-heart fa-3x" data-id="{{$post->id}}" data-name="like" style="cursor:pointer;"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
         {{ $all_posts->appends(request()->input())->links() }}
    </div>

@endsection


