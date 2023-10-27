<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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


    public function create()
    {
        return Inertia::render('AddBook');//pending to create page
    }


    public function store(Request $request)
    {
       $valid = Validator::make($request->all(),[
            'title' =>'required|string|max:255',
            'author' => 'required|string|',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'isbn' => 'required|numeric',
            'image' => 'required',
            'published' => 'required',
            'publisher' => 'required|string|max:255'
       ]);
        if($valid->fails())
            return json_encode(["errors" =>$valid->errors()]);
        else
        {
            Book::insert($request->all());
            return json_encode([
                "status_code" => 201,
                "message" => "Book add successfully."
            ]);
        }
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
        return Inertia::render('Editbook', [
            'book' => $book,
        ]);//pending edit  page
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $valid = Validator::make($request->all(),[
            'title' =>'required|string|max:255',
            'author' => 'required|string|',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'isbn' => 'required|numeric',
            'image' => 'required',
            'published' => 'required',
            'publisher' => 'required|string|max:255'
       ]);
        if($valid->fails())
            return json_encode(["errors" =>$valid->errors()]);
        else
        {
            Book::where('id',$book->id)->update($request->all());
            return json_encode([
                "status_code" => 204,
                "message" => "Book add successfully."
            ]);
        }
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return json_encode([
            "status_code" => 204,
            "message" => "Book deleted successfully."
        ]);
    }
}
