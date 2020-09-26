@extends('layouts.app')
@section('title', 'followings')
@section('content')
    @foreach($following_users as $following_user)
    @section('breadcrumbs', Breadcrumbs::render('guest_followings',$following_user,$user_info))
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
                    @if(isset($following_user->user_icon_image))
                        <img src="{{ $following_user->user_icon_image }}" class="img-fluid rounded-circle" width="50" height="50">
                    @else
                        <img class="rounded-circle img-fluid" src="{{ asset('images/nonuser.png') }}"  width="50" height="50">
                    @endif
                    <div class="ml-2 d-flex flex-column">
                        <a href="{{ action('Guest\PagesController@show', ['id' => $following_user->id] )}}" class="text-secondary">{{ $following_user->id }}</a>
                        <p class="mb-0">{{ $following_user->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center pt20">
        {{ $following_users->links() }}
    </div>
    
@endsection