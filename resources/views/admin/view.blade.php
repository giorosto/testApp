@extends('layouts.admin')

@section('content')
    <div class="card">
        <table class="table table table-dark">
            <tr>
                <th>#</th>
                <th>title</th>
                <th>image</th>
                <th>action</th>
            </tr>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td><img src="{{ $blog->image }}" width="150px" alt=""></td>
                    <td>
                        @if(Auth::user()->hasRole('admin') || $blog->user_id === Auth::user()->id)
                            <div class="row justify-content-around">
                                <div>
                                    <a class="btn btn-warning text-white" href="{{ route("admin.blog.edit", $blog->id) }}">
                                        <i class="fa fa-pencil"></i> edit
                                    </a>
                                </div>
                                <div>
                                    <form action="{{ route("admin.blog.delete") }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $blog->id }}">
                                        <button class="btn btn-danger text-white">
                                            <i class="fa fa-trash"></i> delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
