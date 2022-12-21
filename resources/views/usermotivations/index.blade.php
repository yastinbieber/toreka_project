@extends('layouts.app')
@section('title', '')
@section('content')
<div class="container">
    @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
            <a class="btn btn-success btn-sm" href="/usermotivations">戻る</a>
        </div>
    @endif

    @if (Auth::check())
        <p>ようこそ、{{ Auth::user()->name }}さん</p>
    @endif



</div>
@endsection
