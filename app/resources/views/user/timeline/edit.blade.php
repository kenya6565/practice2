@extends('layouts.app')
@section('title','edit')
@section('breadcrumbs', Breadcrumbs::render('postedit', $post, $user_info, $edit_post))
@section('content')
    <div class="container">
        <div class="pb20 row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        投稿編集
                    </div>
                    <div class="card-body">
                        <form action="{{ action('User\TimelineController@update') }}" method="post" enctype="multipart/form-data">
                            @if (count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group">
                                <label for="title-name" class="col-form-label">名所の名前:</label>
                                <input type="text" name="title" class="form-control" id="title-name" value="{{ $edit_post->title }}" placeholder="名所の名前" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">紹介文:</label>
                                <textarea class="form-control" style=" height:220px; resize: none;" name="post" id="message-text" placeholder="紹介文"> {{ $edit_post->post }}</textarea>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10">
                                   <input type="hidden" name="id" value="{{ $edit_post->id }}">
                                   <!--これでコントローラのfindでとった特定のidを呼び出している-->
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary" value="更新">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection