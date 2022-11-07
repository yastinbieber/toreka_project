@extends('layouts.app')
@section('title', '詳細画面')
@section('content')

<div class="container">
    <h4>トレーニング内容</h4>
    <p>{{$trRecord->tr_date}}</p>
    <p>{{$trRecord->part}}</p>
    <p>{{$trRecord->menu}}</p>
    <p>{{$trRecord->set_type}}</p>
    <p>{{$trRecord->weight_first}} Kg</p>
    <p>{{$trRecord->reps_first}} reps</p>
    <p>{{$trRecord->weight_second}} Kg</p>
    <p>{{$trRecord->reps_second}} reps</p>
    <p>{{$trRecord->weight_third}} Kg</p>
    <p>{{$trRecord->reps_third}} reps</p>
    <p>{{$trRecord->weight_fourth}} Kg</p>
    <p>{{$trRecord->reps_fourth}} reps</p>
    <p>{{$trRecord->weight_fifth}} Kg</p>
    <p>{{$trRecord->reps_fifth}} reps</p>
    <p>{{$trRecord->memo}}</p>
    <a class="btn btn-success btn-sm" href="/trrecords">戻る</a>
</div>

@endsection
