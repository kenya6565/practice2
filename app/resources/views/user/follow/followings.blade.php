@extends('layouts.app')
@section('title', 'followings')
@section('content')
    @foreach($following_users as $following_user)
        @section('breadcrumbs', Breadcrumbs::render('user_followings',$following_user,$user_info))
        <div class="col-12 pt20" style="margin:auto;">
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="card">
                <div class="card-haeder p-3 w-100 d-flex">
                    @if(isset($following_user->user_icon_image))
                   　    <img src="{{ $following_user->user_icon_image }}" class="img-fluid rounded-circle" width="50" height="50">
                    @else
                        <img class="rounded-circle img-fluid" src="{{ asset('images/nonuser.png') }}"  width="50" height="50">
                    @endif
                    <div class="ml-2 d-flex flex-column">
                        <a href="{{ action('User\PagesController@show', ['id' => $following_user->id] )}}" class="text-secondary">{{ $following_user->id }}</a>
                        @if(Auth::user()->is_locked($following_user->id))
                             <p class="mb-0"><i class="fas fa-lock"></i> {{ $following_user->name }}</p>
                        @else
                            <p class="mb-0">{{ $following_user->name }}</p>
                        @endif
                    </div>
                    @if (Auth::user()->is_following($following_user->id))
                        <div class="px-2">
                            <span class="px-1 bg-secondary text-light">フォローされています</span>
                        </div>
                    @endif
                    <div class="d-flex justify-content-end flex-grow-1">
                        @if (Auth::user()->is_following($following_user->id))
                            <form action="{{ route('unfollow', ['id' => $following_user->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">フォロー解除</button>
                            </form>
                        @elseif(Auth::id() == $following_user->id)
                        
                        @else
                            <form action="{{ route('follow', ['id' => $following_user->id]) }}" method="POST">
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
       {{ $following_users->links() }}
    </div>
@endsection