@extends('layouts.app')
@section('title', 'index画面')
@section('content')

<div class="container">
    <h4>ユーザー情報</h4>
    <p>{{$weightRecord->date}}</p>
    <p>{{$weightRecord->today_weight}}</p>
    <a class="btn btn-success btn-sm" href="/weightrecords">戻る</a>
    <a class="btn btn-info btn-sm" href="{{ url('weightrecords/'.$weightRecord->id .'/' .'edit') }}">編集</a>
</div>

@endsection
