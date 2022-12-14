@extends('layouts.app')
@section('title', 'ユーザー情報詳細画面')
@section('content')

<div class="container">
    <h4>ユーザー情報</h4>
    <p>{{$user->name}}</p>
    <p>{{$user->area}}</p>
    <p>{{$user->birthday}}</p>
    <p>{{$user->text}}</p>
    <p>{{$user->age}}</p>
    <a class="btn btn-success btn-sm" href="/trrecords">戻る</a>
    <a class="btn btn-info btn-sm" href="{{ url('users/'.$user->id .'/' .'edit') }}">編集</a>
</div>

@endsection
