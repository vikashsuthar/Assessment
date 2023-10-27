<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\Book;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books_data = Http::get("https://fakerapi.it/api/v1/books?_quantity=100");
        $books_data =json_decode($books_data);
        $books = [];
        foreach($books_data->data as $book)
        {
            $books[] = [
                "title"=> $book->title,
                "author"=> $book->author,
                "genre"=> $book->genre,
                "description"=> $book->description,
                "isbn"=> $book->isbn,
                "image"=> $book->image,
                "published"=> $book->published,
                "publisher"=> $book->publisher,
            ];
        }
        Book::insert($books);
    }
}
