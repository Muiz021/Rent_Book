@extends('layouts.mainlayouts')

@section('title', 'Users')

@section('content')

    <h1>New Registered User List</h1>

    <div class="mt-5 d-flex justify-content-end">
        {{-- <a href="#" class="btn btn-primary me-2">View Banned User</a> --}}
        <a href="/users" class="btn btn-secondary">Approved User List</a>
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
                    <th scope="col">Username</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registeredUser as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->username }}</td>
                    <td>
                        @if ($item->phone)
                            {{ $item->phone }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="/user-detail/{{$item->slug}}" class="btn btn-success">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
