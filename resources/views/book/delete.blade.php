@extends('layouts.mainlayouts')

@section('title', 'Delete Book')

@section('content')
    <h2>Are you sure to delete book {{$books->name}} ?</h2>
    <div class="mt-4">
        <a href="/book-destroy/{{$books->slug}}" class="btn btn-danger">Sure</a>
        <a href="/books" class="btn btn-info">Cancel</a>
    </div>
@endsection

