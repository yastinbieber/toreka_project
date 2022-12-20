@extends('layouts.app')
@section('title', '作成画面')
@section('content')

<div class="container">
    <h4>目標を設定する</h4>
    <div class="border rounded p-5">
            <form method="post" action="{{ route('usermotivations.update', $userMotivation->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }} <!-- CSRF対策 -->
                @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">トレーニング頻度(週)</label>
                <div class="col-sm-10">
                    <select class="form-control" id="training_frequency" name="training_frequency">
                        @foreach(config('pulldown.training_frequency') as $key => $name)
                            <option value="{{ $key }}" @selected(old('training_frequency', $userMotivation->training_frequency) == $key)>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">ボディメイク目的</label>
                <div class="col-sm-10">
                    <select class="form-control" id="purpose" name="purpose">
                        @foreach(config('pulldown.purpose') as $key => $name)
                            <option value="{{ $key }}" @selected(old('purpose', $userMotivation->purpose) == $key)>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input class="btn btn-info btn-sm" type="submit" value="送信">
            <a class="btn btn-success btn-sm" href="/usermotivations">戻る</a>
        </form>
    </div>
</div>

@endsection
