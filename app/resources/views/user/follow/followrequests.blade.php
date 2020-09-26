@extends('layouts.app')
@section('title', 'followingrequest')
@section('content')
    @foreach($follow_requesting_users as $follow_requesting_user)
        @section('breadcrumbs', Breadcrumbs::render('followrequests',$follow_requesting_user,$user_info))
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
                    @if(isset($follow_requesting_user->user_icon_image))
                        <img src="{{ $follow_requesting_user->user_icon_image }}" class="img-fluid rounded-circle" width="50" height="50">
                    @else
                        <img class="rounded-circle img-fluid" src="{{ asset('images/nonuser.png') }}"  width="50" height="50">
                    @endif
                    <div class="ml-2 d-flex flex-column">
                        <a href="{{ action('User\PagesController@show', ['id' => $follow_requesting_user->id] )}}" class="text-secondary">{{ $follow_requesting_user->id }}</a>
                        @if(Auth::user()->is_locked($follow_requesting_user->id))
                             <p class="mb-0"><i class="fas fa-lock"></i> {{ $follow_requesting_user->name }}</p>
                        @else
                            <p class="mb-0">{{ $follow_requesting_user->name }}</p>
                        @endif
                    </div>
                    <div class="d-flex justify-content-end flex-grow-1">
                        <form action="{{ route('approve', ['id' => $follow_requesting_user->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">承認</button>
                        </form>
                        <form action="{{ route('decline', ['id' => $follow_requesting_user->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger ml10">拒否</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center pt20">
       {{ $follow_requesting_users->links() }}
    </div>
@endsection