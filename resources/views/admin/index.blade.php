@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route("admin.blog.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column mb-2">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" placeholder="title" id="title">
        </div>
        <div class="d-flex flex-column mb-2">
            <label for="file">Image</label>
            <input type="file" name="image" class="form-control" id="file">
        </div>
        <div class="mb-2">
            <label for="content">Content</label>
            <textarea name="content" id="content" ></textarea>
        </div>
        <div class="d-flex flex-column ">
            <label for="category">Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button class=" btn btn-primary mt-3">
            submit
        </button>
    </form>
    <script src="/ckeditor/ckeditor.js"></script>
    <script>

        CKEDITOR.replace( 'content' ,
            {
                allowedContent:
                    'h1 h2 h3 p blockquote strong em;' +
                    'a[!href];' +
                    'table tr th td caption;' +
                    'span{!font-family};' +
                    'span{!color};' +
                    'span(!marker);'
            });
    </script>
@endsection
