@extends('layouts.app')
@section('title', 'edit')
@section('breadcrumbs', Breadcrumbs::render('useredit',$login_user,$user_info))
@section('content')
    <div class="container">
        <div class="pb20 row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        ユーザ編集
                    </div>
                    <div class="card-body">
                        <form action="{{ action('User\PagesController@update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2" for="title">名前</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" value="{{ $login_user->name }}" autofocus>
                                </div>   
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="title">E-mail</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="email" value="{{ $login_user->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="title">現在のパスワード</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="current-password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="title">新しいパスワード</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="new-password" required>
                                     @if ($errors->has('new-password'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                      </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="title">新しいパスワード（確認用）</label>
                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="new-password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="image">マイアイコン</label>
                                <div class="col-md-10">
                                    <input id="image" type="file" class="form-control-file" name="user_icon_image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="profile" class="col-md-2">プロフィール</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" style=" height:220px; resize: none;" name="profile" id="profile" value="{{ $login_user->profile }}"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-10">
                                   <input type="hidden" name="id" value="{{ $login_user->id }}">
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