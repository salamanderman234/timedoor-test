<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index():View {
        $keyword = request()->query("keyword", "");
        $max = request()->query("max", "10");   
        $intMax = (int)$max % 10 == 0 ? (int)$max : 10;
        $query = Book::select("books.*",\DB::raw('AVG(ratings.rate) AS avg_rate'), \DB::raw('COUNT(ratings.id) AS voter'))
            ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
            ->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
            ->where("books.id", "!=", 0);
        if(!empty($keyword)) {
            $query->where("books.name", "LIKE", "%{$keyword}%")
                ->orWhere("authors.name", "LIKE", "%{$keyword}%");
        }
        $books = $query->groupBy('books.id')
            ->orderBy('avg_rate',"desc")
            ->take($intMax)
            ->get();
        return view("index", compact('books', 'intMax', "keyword"));
    }

    public function getBooksByAuthor() {
        $authorId = request()->query("id",1);
        $books = Book::whereRelation('author',"id","=", (int)$authorId)
            ->get();
        return response()->json(['data' => $books]);
    }
}
