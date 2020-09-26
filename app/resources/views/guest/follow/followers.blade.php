@extends('layouts.app')
@section('title', 'followers')
@section('content')
    @foreach($followers as $follower)
        @section('breadcrumbs', Breadcrumbs::render('guest_followers',$follower,$user_info))
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
                        <a href="{{ action('Guest\PagesController@show', ['id' => $follower->id] )}}" class="text-secondary">{{ $follower->id }}</a>
                        <p class="mb-0">{{ $follower->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center pt20">
        {{ $followers->links() }}
    </div>
@endsection