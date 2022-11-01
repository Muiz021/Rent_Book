@extends('layouts.mainlayouts')

@section('title', 'Books')

@section('content')
    <h1>Books List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/book-deleted" class="btn btn-primary me-2">View Deleted Date</a>
        <a href="book-add" class="btn btn-secondary">Add Date</a>
    </div>
    <div class="mt-4">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="my-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Code</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            @foreach ($item->categories as $category)
                            {{$category->name}} <br>
                            @endforeach
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/book-edit/{{$item->slug}}" class="btn btn-success">Edit</a>
                            <a href="/book-delete/{{$item->slug}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

