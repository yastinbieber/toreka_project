@extends('layouts.app')
@section('title', '')
@section('content')
<div class="container">
    <h2>ボディメイク目標</h2>
    <p>{{$idealWeight->height}}</p>
    <p>{{$idealWeight->weight}}</p>
    <p>{{$idealWeight->target_weight}}</p>
    @if ($idealWeight->exercise_level === 1.9)
        <p>ほぼ毎日かなり激しい筋トレをする</p>
    @elseif ($idealWeight->exercise_level === 1.73)
        <p>1週間に4～6回は結構激しい筋トレをする</p>
    @elseif ($idealWeight->exercise_level === 1.55)
        <p>1週間に2、3回筋トレをする</p>
    @elseif ($idealWeight->exercise_level === 1.38)
        <p>1週間に1、2回軽い運動をする</p>
    @elseif ($idealWeight->exercise_level === 1.2)
        <p>運動はほとんどしていない</p>
    @endif
    <p>{{$idealWeight->start_day}}</p>
    <p>{{$idealWeight->last_day}}</p>
    <a class="btn btn-success btn-sm" href="/idealweights">戻る</a>
    @can('update', $idealWeight)
        <a class="btn btn-info btn-sm" href="{{ url('idealweights/'.$idealWeight->id .'/' .'edit') }}">編集</a>
    @endcan
    @can('delete', $idealWeight)
        <form action="{{ route('idealweights.destroy', $idealWeight->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">削除</button>
        </form>
    @endcan
</div>

@endsection
