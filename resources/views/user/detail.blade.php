@extends('layouts.mainlayouts')

@section('title', 'Users')

@section('content')

    <h1>Detail User</h1>

    <div class="mt-5 d-flex justify-content-end">
        @if ($users->status == 'inactive')
        <a href="/user-approve/{{$users->slug}}" class="btn btn-primary me-2">Approve User</a>
        @endif
        <a href="/users" class="btn btn-outline-primary fw-semibold">Back</a>
    </div>
    <div class="mt-4">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="my-3 w-25">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" readonly value="{{$users->username}}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" readonly value="{{$users->phone}}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" cols="30" rows="5" style="resize:none" readonly>{{$users->address}}</textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" name="status" id="status" class="form-control" readonly value="{{$users->status}}">
        </div>
    </div>

    <div class="mt-5">
        <h2>User's Rent Log</h2>
        <x-rent-log-table :rentlog='$rentLogs'/>
    </div>
@endsection
