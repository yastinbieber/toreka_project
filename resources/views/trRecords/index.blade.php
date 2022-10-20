@extends('layouts.app')
@section('title', 'index画面')
@section('content')

<section class="content">
    <a class="btn btn-info btn-sm" href="">追加</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>Date</td>
                <td>Part</td>
                <td>menu</td>
                <td>set_type</td>
                <td>weight_first</td>
                <td>reps_first</td>
                <td>weight_second</td>
                <td>reps_second</td>
                <td>weight_third</td>
                <td>reps_third</td>
                <td>weight_fourth</td>
                <td>reps_fourth</td>
                <td>weight_fifth</td>
                <td>reps_fifth</td>
                <td>詳細</td>
                <td>編集</td>
                <td>削除</td>
            </tr>
        </thead>
        <tbody>
            @foreach($trRecords as $trRecord)
            <tr>
                <td>{{$trRecord->tr_date}}</td>
                <td>{{$trRecord->part}}</td>
                <td>{{$trRecord->menu}}</td>
                <td>{{$trRecord->set_type}}</td>
                <td>{{$trRecord->weight_first}}</td>
                <td>{{$trRecord->reps_first}}</td>
                <td>{{$trRecord->weight_second}}</td>
                <td>{{$trRecord->reps_second}}</td>
                <td>{{$trRecord->weight_third}}</td>
                <td>{{$trRecord->reps_third}}</td>
                <td>{{$trRecord->weight_fourth}}</td>
                <td>{{$trRecord->reps_fourth}}</td>
                <td>{{$trRecord->weight_fifth}}</td>
                <td>{{$trRecord->reps_fifth}}</td>
                <td><a class="btn btn-primary btn-sm" href="">詳細</a></td>
                <td><a class="btn btn-info btn-sm" href="">編集</a></td>
                <td><button class="btn btn-danger btn-sm delete-post" data-route="">削除</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection

