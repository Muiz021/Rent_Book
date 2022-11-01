@extends('layouts.mainlayouts')

@section('title', 'Edit Book')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <h1>Edit Book</h1>

    <div class="mt-5 w-50">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{$books->slug}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div>
                <label for="code" class="form-label">Code</label>
                <input type="text" name="book_code" id="book_code" class="form-control" placeholder="Book's Code"
                    value="{{ $books->book_code }}">
            </div>
            <div class="mt-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Book's Title"
                    value="{{ $books->title }}">
            </div>
            <div class="mt-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mt-3">
                <label for="currentImage" class="form-label" style="display: block">Current Image</label>
                @if ($books->cover != '')
                <img src="{{asset('storage/cover/'.$books->cover)}}" alt="" width="300px">
                @else
                    <img src="{{asset('img/cover-not-found.png')}}" alt="" width="90px">
                @endif
            </div>
            <div class="mt-3">
                <label for="category" class="form-label">Category</label>
                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <label for="currentCategory" class="form-label">Current Category</label>
                <ul>
                    @foreach ($books->categories as $category)
                        <li>{{$category->name}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-3">
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>
@endsection
