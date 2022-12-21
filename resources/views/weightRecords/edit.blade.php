@extends('layouts.app')
@section('title', 'index画面')
@section('content')

<div class="container">
    <h4>本日の体重を設定する</h4>
    <div class="border rounded p-5">
        <form method="post" action="{{ route('weightrecords.update', $weightRecord->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- CSRF対策 -->
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">日付</label>
                <div class="col-sm-10">
                    <input type="date" name="date" class="form-control" value="{{ old('tr_date', $weightRecord->date) }}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">体重</label>
                <div class="col-sm-10">
                    <input type="number" name="today_weight" class="form-control" value="{{ old('today_weight', $weightRecord->today_weight)}}" placeholder="体重を入力ください" min="0" step="0.01">
                    @error('today_weight')
                        <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <input class="btn btn-info btn-sm" type="submit" value="送信">
            <a class="btn btn-success btn-sm" href="/weightrecords">戻る</a>
        </form>
    </div>
</div>

@endsection
