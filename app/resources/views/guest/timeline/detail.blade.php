@extends('layouts.app')
@section('title', 'postdetail')
     <style>
        .btn-open {
          display: inline-block;
          width: 180px;
          height:50px;
          text-align: center;
          background-color: #444444	;
          font-size: 16px;
          line-height: 52px;
          color: #FFF;
          text-decoration: none;
          font-weight: bold;
          border: 2px solid #666666	;
          position: relative;
          overflow: hidden;
          z-index: 1;
        }
        .btn-open:after{
          width: 100%;
          height: 0;
          content:"";
          position: absolute;
          top: 50%;
          left: 50%;
          background : #FFF;
          opacity: 0;
          transform: translateX(-50%) translateY(-50%) rotate(45deg);
          transition: .2s;
          z-index: -1;
        }
        .btn-open:hover{
          color: #444444;
        }
        .btn-open:hover:after{
          height: 240%;
          opacity: 1;
        }
        .btn-open:active:after{
          height: 340%;
          opacity: 1;
        }
    </style>
@section('breadcrumbs', Breadcrumbs::render('guest_detail',$post, $user_info))
@section('content')
    <div class="container">
        <div class="row justify-content-center font-italic font-weight-bold">
            <h4 style=" font-family: 'Kosugi Maru', sans-serif;" class="text-white">{{ $post->title }}</h4>
        </div>
        <div class="row justify-content-center pt20" style="margin: auto;">
            @if($images->count())
                @foreach($images as $image)
                    @if(isset($image->image))
                        <div class="col-lg-3 col-12 mb20">
                            <img class="img-thumbnail img-responsive  d-block w-100 shadow-lg bg-dark rounded" src="{{ Storage::disk('s3')->url('public/images/' . $image->image) }}">
                        </div>
                    @endif
                @endforeach
            @else
                <div class="col-lg-3 col-12 mb20">
                   <img src="{{ asset('images/'.'noimageavailable.png') }}" class="img-thumbnail img-responsive d-block w-100 shadow-lg bg-white rounded">
                </div>
            @endif
            <div class="col-12">
                <div class="card border-dark">
                    <div class="card">
                        <div class="card-header">
                          紹介文
                        </div>
                        <div class="card-body">
                           {{ $post->post }}</a>
                        </div>
                    </div>
                    <div id="tabMenu" class="row mb20 pt20">
                        <div class="col-9">
                            <div class="card">
                                <ul class="list-group list-group-horizontal">
                                   <li class="col-6 list-group-item text-dark"><a href="#tabBox1"><div class="text-dark"><i class="fas fa-map-marked-alt text-dark"></i>地図</div></a></li>
                                   <li class="col-6 list-group-item text-dark"><a href="#tabBox2"><div class="text-dark">{{$post->user->name}}の最近の投稿</div></a></li>
                                </ul>
                                <div class="card-body">
                                    <div id="tabBoxes" >
                                      　<div id="tabBox1"><iframe id="iframe" class="col-12" src="https://maps.google.co.jp/maps?output=embed&q={{ $post->title }}"></iframe></div>
                                    　　<div class="overflow-auto"   style= "height:100px;" id="tabBox2">
                                    　　      @foreach($recent_posts as $recent_post)
                                    　　          @if(isset($recent_post->firstPhoto()->image))
                                                    <p>
                                                        <img class="img-fluid" width="50" height="50" src="{{ Storage::disk('s3')->url('public/images/' . $recent_post->firstPhoto()->image) }}">
                                                        <a href="{{ action('User\TimelineController@show',  $recent_post->id )}}" class="text-dark">{{$recent_post->title}}</a>
                                                        {{ $recent_post->created_at }}
                                                    </p>
                                                @else
                                                    <p>
                                                        <img class="img-fluid" width="50" height="50" src="{{ asset('images/'.'noimageavailable.png') }}">
                                                        <a href="{{ action('Guest\TimelineController@show',  $recent_post->id )}}" class="text-dark">{{$recent_post->title}}</a>
                                                        {{ $recent_post->created_at }}
                                                    </p>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center container pt20 pb20" style="margin: auto;">
            <button type="button" id="comment" class="btn-open justify-content-center col-12">コメントを表示</button>
            <div class="row justify-content-center" id="comment_content" style="margin: auto;">
                @foreach($post->comments as $comment)
                    <div class="col-9 p20">
                        <div class="media">
                            <img class="rounded-circle img-fluid" src="{{ asset('images/nonuser.png') }}"  width="50" height="50">
                            <h5 class="mt-0 pl20"><a href="{{ action('Guest\PagesController@show', ['id' => $comment->user->id] )}}" class="text-white">{{ $comment->user->name }}</a></h5>
                            <h5 class="pl20 text-white pt20">{{ $comment->comment }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
