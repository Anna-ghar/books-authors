<?php

namespace App\Http\Controllers;
use App\Http\Requests\EditAuthorRequest;
use App\Http\Requests\CreateAuthorRequest;
use App\Http\Requests\SearchAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    public function index()
//    {
//        $authors = Author::paginate(3);
//        return view('authors.index', ['authors' => $authors]);
//    }
    public function index(SearchAuthorRequest $request)
    {
        $search = $request->input('search');

        $query = Author::query();

        if (!empty($search)) {
            $query->where('first_name', 'like', "%$search%")
                ->orWhere('last_name', 'like', "%$search%")->get();
        }

        $authors = $query->paginate(3);

        return view('authors.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAuthorRequest $request)
    {
        $author = new Author;
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->biography = $request->biography;
        $author->save();
        return redirect()->route('authors.index')->with('message', "Added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::find($id);
        return view('authors.show')->with('author', $author);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = Author::find($id);
        return view('authors.edit')->with('author', $author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditAuthorRequest $request, string $id)
    {
        $author = Author::find($id);
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->biography = $request->biography;
        $author->save();

        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::find($id);
        $author->delete();
        return redirect()->route('authors.index');
    }
}
