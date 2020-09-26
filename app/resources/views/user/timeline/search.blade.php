@extends('layouts.app')
@section('css')
    <link href="{{ asset('css/top.css') }}" rel="stylesheet">
    <link href="{{ asset('css/utility.css') }}" rel="stylesheet">
@endsection
@section('title', 'search')
@section('breadcrumbs', Breadcrumbs::render('search',$user_info))
@section('content')
    @if(isset($results))
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">検索成功！</h4>
            <strong>{{ count($results) }}</strong> 件ヒットしました
        </div>
        <div class="row justify-content-center container" style="margin: auto;">
            @foreach($results as $result)
                <div class="col-4 mb50">
                    <div class="card">
                        @if(isset($result->firstPhoto()->image))
                            <img class="card-img-top" src="{{ Storage::disk('s3')->url('public/images/' . $result->firstPhoto()->image) }}">
                        @else
                            <img class="card-img-top" src="{{ asset('images/'.'noimageavailable.png') }}">
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">{{ $result->title }}</h4>
                            <p class="card-text">
                                <div>{{ $result->post }}</div>
                            </p>
                            <a href="{{ action('User\TimelineController@show',  $result->id )}}" class="btn btn-secondary">詳細</a>
                            <div class="d-flex justify-content-end flex-grow-1">
                                @if (Auth::user()->is_liking($result->id))
                                    <form action="{{ route('unlike', ['id' => $result->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <span class="badge badge-pill badge-success">{{  $result->liking_users()->count() }}</span>
                                        <button type="submit" class="fas fa-heart"></button>
                                    </form>
                                @else
                                    <form action="{{ route('like', ['id' => $result->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        <span class="badge badge-pill badge-success">{{  $result->liking_users()->count() }}</span>
                                        <button type="submit" class="far fa-heart "></button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @elseif($results == null)
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">検索に失敗しました</h4>
            <strong>{{ $keyword }}</strong> は見つかりませんでした。
        </div>
    @endif
    @if(isset($results))
        <div class="d-flex justify-content-center mt40">
            {{ $results->appends(request()->input())->links() }}
        </div>
    @endif
@endsection
