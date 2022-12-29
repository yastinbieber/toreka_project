@extends('layouts.app')
@section('title', '')
@section('content')

<div class="container">
    <div class="row">
        @foreach ($howtovideos as $howtovideo)
            <div class="col-md-4 col-lg-4">
                <div class="card rounded-0 p-0 shadow-sm">
                    <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $howtovideo->url }}" allowfullscreen></iframe>
                        </div>
                        <h5 class="card-title pt-3">{{ $howtovideo->menu }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $howtovideo->part }}</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
