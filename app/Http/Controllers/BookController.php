<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.book', ['books' => $books]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('book.add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255'
        ]);

        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $books = Book::create($request->all());
        $books->categories()->sync($request->categories);
        return redirect('books')->with('status', 'Book Added Successfully');
    }

    public function edit($slug)
    {
        $books = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('book.edit', compact('books', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $books = Book::where('slug', $slug)->first();
        $books->update($request->all());

        if ($request->categories) {
            $books->categories()->sync($request->categories);
        }

        return redirect('books')->with('status', 'Book Updated Successfully');
    }

    public function delete(Request $request,$slug)
    {
        $books = Book::where('slug', $slug)->first();
        return view('book.delete',compact('books'));
    }

    public function destroy($slug)
    {
        $books = Book::where('slug', $slug)->first();
        $books->delete();
        return redirect('books')->with('status', 'Book Deleted Successfully');
    }

    public function deletedBook()
    {
        $deleteBooks = Book::onlyTrashed()->get();
        return view('book.delete-list',compact('deleteBooks'));
    }

    public function restore($slug)
    {
        $books = Book::withTrashed()->where('slug', $slug)->first();
        $books->restore();
        return redirect('books')->with('status','Book Restored Successfully');
    }
}
