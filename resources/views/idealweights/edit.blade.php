@extends('layouts.app')
@section('title', '')
@section('content')

<div class="container">
    <h4>目標を修正する</h4>
    <div class="border rounded p-5">
        <form method="post" action="{{ route('idealweights.update', $idealWeight->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- CSRF対策 -->
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Height</label>
                <div class="col-sm-10">
                    <input type="number" name="height" class="form-control" value="{{ old('height', $idealWeight->height)}}" placeholder="身長を入力ください" min="0">
                    @error('height')
                        <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Weight</label>
                <div class="col-sm-10">
                    <input type="number" name="weight" class="form-control" value="{{ old('weight', $idealWeight->weight)}}" placeholder="体重を入力ください" min="0">
                    @error('weight')
                        <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">TargetWeight</label>
                <div class="col-sm-10">
                    <input type="number" name="target_weight" class="form-control" value="{{ old('target_weight', $idealWeight->target_weight)}}" placeholder="目標体重を入力ください" min="0">
                    @error('target_weight')
                        <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">ExerciseLevel</label>
                <div class="col-sm-10">
                    <select class="form-control" id="exercise_level" name="exercise_level">
                        @foreach(config('pulldown.exercise_level') as $key => $name)
                            <option value="{{ $key }}" @selected(old('exercise_level', $idealWeight->exercise_level) == $key)>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">StartDay</label>
                <div class="col-sm-10">
                    <input type="date" name="start_day" class="form-control" value="{{ old('start_day', $idealWeight->start_day)}}">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">LastDay</label>
                <div class="col-sm-10">
                    <input type="date" name="last_day" class="form-control" value="{{ old('last_day', $idealWeight->last_day)}}">
                </div>
            </div>
            <input class="btn btn-info btn-sm" type="submit" value="送信">
            @can('update', $idealWeight)
                <a class="btn btn-success btn-sm" href="{{ url('idealweights/'.$idealWeight->id) }}">詳細</a>
            @endcan

        </form>
    </div>
</div>

@endsection
