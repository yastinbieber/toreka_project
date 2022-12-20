@extends('layouts.app')
@section('title', '')
@section('content')
<div class="container">
    <h2>ボディメイク目標</h2>
    <p>{{$userMotivation->training_frequency}}</p>
    <p>{{$userMotivation->purpose}}</p>
    <a class="btn btn-success btn-sm" href="/usermotivations">戻る</a>
    @can('update', $userMotivation)
        <a class="btn btn-info btn-sm" href="{{ url('usermotivations/'.$userMotivation->id .'/' .'edit') }}">編集</a>
    @endcan
</div>

@endsection
