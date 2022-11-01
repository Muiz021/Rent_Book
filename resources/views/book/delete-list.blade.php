@extends('layouts.mainlayouts')

@section('title', 'Deleted Book')

@section('content')
    <h1>Deleted Book List</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/books" class="btn btn-primary">Back</a>
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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deleteBooks as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <a href="/book-restore/{{$item->slug}}" class="btn btn-success">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

