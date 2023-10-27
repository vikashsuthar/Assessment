<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::query();
        if ($request->has('search')) {
            $search =  $request->search;
            switch ($request->search_option) {
                case 'title':
                    $books = $books->where('title', "Like", "%" . $search . "%");
                    break;
                case 'author':
                    $books = $books->where('author', "Like", "%" . $search . "%");
                    break;
                case 'published':
                    $books = $books->whereDate('published', date("Y-m-d", strtotime($request->published)));
                    break;
                case 'genre':
                    $books = $books->where('genre', "Like", "%" . $search . "%");
                    break;
                case 'isbn':
                    $books = $books->where('isbn', "Like", "%" . $search . "%");
                    break;
                default:
                    # code...
                    break;
            }
        }
        $books = $books->paginate("12");
        return Inertia::render('Welcome', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return Inertia::render('Detail', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
