@extends('layouts.main')

@section('content')
    <div class="card mb-2 shadow-lg">
        <div class="card-header">
            {{ $blog->title }}
        </div>
        <img class="card-img-top" src="{{ $blog->image }}" alt="Card image cap">
        <div class="card-body">
            <div class="card-text">{!!  $blog->content  !!}</div>
            <small class="text-muted"> {{ $blog->author->name }}</small>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center">
            <small class="text-muted">{{ $blog->created_at }}</small>
        </div>
    </div>
@endsection
