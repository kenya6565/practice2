@extends('layouts.app')
@section('title', 'followers')
@section('content')
    @foreach($followers as $follower)
        @section('breadcrumbs', Breadcrumbs::render('user_followers',$follower,$user_info))
        <div class="col-12 pt20" style="margin: auto;">
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="card">
                <div class="card-haeder p-3 w-100 d-flex">
                    @if(isset($follower->user_icon_image))
                        <img src="{{ $follwer->user_icon_image }}" class="img-fluid rounded-circle" width="50" height="50">
                    @else
                        <img class="rounded-circle img-fluid" src="{{ asset('images/nonuser.png') }}"  width="50" height="50">
                    @endif
                    <div class="ml-2 d-flex flex-column">
                        <a href="{{ action('User\PagesController@show', ['id' => $follower->id] )}}" class="text-secondary">{{ $follower->id }}</a>
                        @if(Auth::user()->is_locked($follower->id))
                             <p class="mb-0"><i class="fas fa-lock"></i> {{ $follower->name }}</p>
                        @else
                            <p class="mb-0">{{ $follower->name }}</p>
                        @endif
                    </div>
                    @if (Auth::user()->is_following($follower->id))
                        <div class="px-2">
                            <span class="px-1 bg-secondary text-light">フォローされています</span>
                        </div>
                    @endif
                    <div class="d-flex justify-content-end flex-grow-1">
                        @if(Auth::user()->is_following($follower->id))
                            <form action="{{ route('unfollow', ['id' => $follower->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">フォロー解除</button>
                            </form>
                        @elseif(Auth::user()->is_follow_requesting($follower->id))
                            <form action="" method="POST">
                                <button type="button" class="btn btn-warning text-white">フォローリクエスト中</button>
                            </form>
                        @elseif(Auth::user()->is_locked($follower->id))
                            <form action="{{ route('followRequest', ['id' => $follower->id]) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">フォローリクエスト</button>
                            </form>
                        @elseif(Auth::id() == $follower->id)
                        
                        @else
                            <form action="{{ route('follow', ['id' => $follower->id]) }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">フォローする</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center pt20">
         {{ $followers->links() }}
    </div>
@endsection