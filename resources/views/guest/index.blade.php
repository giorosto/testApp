@extends('layouts.main')

@section('content')
    @foreach($blogs as $blog)
        <div class="card mb-2 shadow-lg">
            <div class="card-header">
                {{ $blog->title }}
            </div>
            <img class="card-img-top" src="{{ $blog->image }}" alt="{{ $blog->title }}">
            <div class="card-body">
                <div class="card-text shrink-text">
                    {!! $blog->content !!}
                </div>
                <small class="text-muted"> {{ $blog->author->name }}</small>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <small class="text-muted">{{ $blog->created_at }}</small>
                <a href="{{ route("show",[
    'slug'=>generateSlug($blog->title),
    'id'=>$blog->id
]) }}" class="btn btn-primary">Read more</a>
            </div>
        </div>
    @endforeach
@endsection
