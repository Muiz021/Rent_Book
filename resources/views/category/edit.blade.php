@extends('layouts.mainlayouts')

@section('title', 'Edit Categories')

@section('content')
    <h1>Edit Category</h1>

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
        <form action="{{$category->slug}}" method="POST">
            @csrf
            @method('put')
            <div> 
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" value="{{$category->name}}" required>
            </div>
            <div class="mt-3">
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection
