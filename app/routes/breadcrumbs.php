<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('top'));
});

Breadcrumbs::for('user_timeline', function ($trail) {
    $trail->parent('home');
    $trail->push('Timeline', route('user_timeline'));
});

Breadcrumbs::for('user_mypage', function ($trail, $user_info) {
    $trail->parent('user_timeline');
    $trail->push($user_info->name, route('mypage', $user_info->id));
});

Breadcrumbs::for('user_detail', function ($trail, $post, $user_info) {
    $trail->parent('user_mypage',$user_info);
    $trail->push($post->title, route('user_postdetail', $post->id));
});

Breadcrumbs::for('postedit', function ($trail, $post, $user_info, $edit_post) {
    $trail->parent('user_detail',$post, $user_info);
    $trail->push('Edit', route('post_edit', $edit_post->id));
});

Breadcrumbs::for('search', function ($trail, $user_info) {
    $trail->parent('user_mypage',$user_info);
    $trail->push('Search', route('search'));
});

Breadcrumbs::for('useredit', function ($trail, $login_user, $user_info) {
    $trail->parent('user_mypage', $user_info);
    $trail->push('Edit', route('mypage_edit', $login_user->id));
});

Breadcrumbs::for('user_followings', function ($trail, $following_user, $user_info) {
    $trail->parent('user_mypage',$user_info);
    $trail->push('Following', route('followings', $following_user->id));
});

Breadcrumbs::for('user_followers', function ($trail, $follower, $user_info) {
    $trail->parent('user_mypage',$user_info);
    $trail->push('Follower', route('followers', $follower->id));
});

Breadcrumbs::for('followrequests', function ($trail, $follow_requesting_user, $user_info) {
    $trail->parent('user_mypage',$user_info);
    $trail->push('FollowRequest', route('followrequests', $follow_requesting_user->id));
});

Breadcrumbs::for('guest_timeline', function ($trail) {
    $trail->parent('home');
    $trail->push('Timeline', route('guest_timeline'));
});

Breadcrumbs::for('guest_mypage', function ($trail, $user_info) {
    $trail->parent('guest_timeline');
    $trail->push($user_info->name, route('guest_mypage', $user_info->id));
});

Breadcrumbs::for('guest_detail', function ($trail, $post, $user_info) {
    $trail->parent('guest_mypage', $user_info);
    $trail->push($post->title, route('guest_postdetail', $post->id));
});

Breadcrumbs::for('guest_followings', function ($trail, $following_user, $user_info) {
    $trail->parent('guest_mypage',$user_info);
    $trail->push('Following', route('guest_followings', $following_user->id));
});

Breadcrumbs::for('guest_followers', function ($trail, $follower, $user_info) {
    $trail->parent('guest_mypage',$user_info);
    $trail->push('Follower', route('guest_followers', $follower->id));
});