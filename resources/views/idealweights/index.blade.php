@extends('layouts.app')
@section('title', '')
@section('content')
<div class="container">
    @if (session('msg'))
        <div class="alert alert-danger">
            {{ session('msg') }}
            <a class="btn btn-success btn-sm" href="/idealweights">戻る</a>
        </div>
    @endif
</div>
@endsection
