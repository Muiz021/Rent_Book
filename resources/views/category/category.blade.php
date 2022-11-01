@extends('layouts.mainlayouts')

@section('title', 'Categories')

@section('content')
    <h1>Category List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="category-deleted" class="btn btn-primary me-2">View Deleted Date</a>
        <a href="category-add" class="btn btn-secondary">Add Date</a>
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
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="/category-edit/{{$item->slug}}" class="btn btn-success">Edit</a>
                            <a href="/category-delete/{{$item->slug}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

