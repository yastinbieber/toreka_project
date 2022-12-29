@extends('layouts.app')
@section('title', '作成画面')
@section('content')
<div class="container">
    <h4>トレーニングメニューを追加する</h4>
    <div class="border rounded p-5">
        <form method="post" action="{{ url('/trmenus') }}">
            {{ csrf_field() }} <!-- CSRF対策 -->
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Part</label>
                <div class="col-sm-10">
                    <select class="form-control" id="tr_part_id" name="tr_part_id">
                        <option value="" style="display: none;">選択してください</option>
                        @foreach ($trParts as $index => $name)
                            <option value="{{ $index }}">{{ $name }}</option>
                        @endforeach
                    </select>
                    @error('tr_part_id')
                        <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">トレーニングメニュー</label>
                <div class="col-sm-10">
                    <input type="text" name="menu" class="form-control" value="{{ old('menu')}}" placeholder="menu">
                    @error('menu')
                        <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <input class="btn btn-info btn-sm" type="submit" value="送信">
            <a class="btn btn-success btn-sm" href="/usermotivations">戻る</a>
        </form>
    </div>
</div>
@endsection
