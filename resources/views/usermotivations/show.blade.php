@extends('layouts.app')
@section('title', '')
@section('content')

<div class="container">
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <h2>ボディメイク目標</h2>
    <p>{{$userMotivation->training_frequency}}</p>
    <p>{{$userMotivation->purpose}}</p>
    @can('update', $userMotivation)
        <a class="btn btn-info btn-sm" href="{{ url('usermotivations/'.$userMotivation->id .'/' .'edit') }}">編集</a>
    @endcan
    @can('delete', $userMotivation)
        <form action="{{ route('usermotivations.destroy', $userMotivation->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">削除</button>
        </form>
    @endcan
</div>

@endsection
