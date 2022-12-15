@extends('layouts.app')
@section('title', 'ユーザー情報編集画面')
@section('content')

<div class="container">
    <h4>ユーザー情報</h4>
    <div class="border rounded p-5">
        <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- CSRF対策 -->
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name)}}" placeholder="ユーザー名" min="0">
                    @error('name')
                        <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Area</label>
                <div class="col-sm-10">
                    <select class="form-control" id="area" name="area">
                        @foreach(config('pulldown.area') as $key => $name)
                            <option value="{{ $name }}" @if(old('area', $user->area ?? '') == $name) selected @endif>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Birthday</label>
                <div class="col-sm-10">
                    <input type="date" name="birthday" class="form-control" value="{{ old('birthday', $user->birthday) }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-form-label">Gender</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="gender" class="form-check-input" id="gender1" value="男性" {{ old ('gender', $user->gender) == '男性' ? 'checked' : '' }}>
                        <label for="gender1" class="form-check-label">男性</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="gender" class="form-check-input" id="gender2" value="女性" {{ old ('gender', $user->gender) == '女性' ? 'checked' : '' }}>
                        <label for="gender2" class="form-check-label">女性</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="gender" class="form-check-input" id="gender3" value="回答しない" {{ old ('gender', $user->gender) == '回答しない' ? 'checked' : '' }}>
                        <label for="gender3" class="form-check-label">回答しない</label>
                    </div>
                </label>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Text</label>
                <div class="col-sm-10">
                    <input type="text" name="text" class="form-control" value="{{ old('text', $user->text)}}" placeholder="メモ" min="0">
                    @error('gender')
                        <li>{{$message}}</li>
                    @enderror
                </div>
            </div>
            <input class="btn btn-info btn-sm" type="submit" value="送信">
            <a class="btn btn-success btn-sm" href="/trrecords">戻る</a>
        </form>
    </div>
</div>

@endsection
