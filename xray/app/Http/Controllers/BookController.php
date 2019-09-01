<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $author = Input::query('author');
        $title = Input::query('title');

        $books = DB::table('books')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->select('books.title', 'authors.author_name as author')
            ->get();
//        foreach($bookList as $book) {
//            $bookAuthor = DB::table('authors')->where('id', $book->author_id)->first();
//            $books[] = [
//                'author' => $bookAuthor->author_name,
//                'title' => $book->title,
//            ];
//        }

        return view('header', ['author' => $author, 'title' => $title, 'books' => $books]);
    }
}
