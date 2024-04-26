<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\EditBookRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(SearchRequest $request)
    {
        $search = $request->input('search');

        $query = Book::query();

        if (!empty($search)) {
            $query->where('title', 'like', "%$search%");
        }

        $books = $query->paginate(3);

        return view('books.index', ['books' => $books]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create')->with('authors', $authors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBookRequest $request)
    {
        $book = new Book;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->publication_year = $request->publication_year;
        $book->save();
        $authors = Author::find($request->authors);
        $book->authors()->attach($authors);

        return redirect()->route('books.index')->with('message', 'Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $book = Book::find($id);
        return view('books.show')->with('book' , $book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $authors = Author::all();
        $book = Book::find($id);
        return view('books.edit')->with(['book' => $book,'authors'=>$authors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditBookRequest $request, string $id)
    {
        $book = Book::find($id);
        $book->title = $request->title;
        $book->description = $request->description;
        $book->publication_year = $request->publication_year;
        $book->save();
        $authors = Author::find($request->authors);
        $book->authors()->attach($authors);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }

}
