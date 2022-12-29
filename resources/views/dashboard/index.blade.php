@extends('layouts.app')
@section('title', 'Dashboard画面')
@section('content')

    <div class="container">
        <h2>Dashboard</h2>
        <a class="btn btn-primary btn-sm" href="{{ url('users/'.$user_id) }}">ユーザー詳細</a>
        <a class="btn btn-primary btn-sm" href="{{ url('idealweights/'.$idealWeightId) }}">idealWeight詳細</a>
        <a class="btn btn-primary btn-sm" href="{{ url('usermotivations/'.$userMotivationId) }}">userMotivation詳細</a>
    </div>

@endsection
