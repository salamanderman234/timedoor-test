<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use App\Models\Rating;
use App\Models\Author;
use App\Models\Book;
use Illuminate\View\View;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        $authorIdQuery = request()->query("id");
        $authorId = (int)$authorIdQuery;
        $books = [];
        $authors = Author::where('id',"!=",0)->get();
        if(count($authors) > 0) {
            $isValid = Author::find($authorId);
            if($isValid != null) {
                $books = Book::whereRelation('author',"id","=", $authorId)->get();
            } else {
                $books = Book::whereRelation('author',"id","=", $authors[0]->id)->get();
            }
        }
        return view('insert',compact('authors',"authorId","books"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        request()->validate([
            'rate'=> 'required|numeric|min:1|max:10',
            'author_id'=>'required|numeric',
            'book_id'=>'required|numeric',
        ]);
        Rating::create([
            'rate' => request()->rate,
            'author_id' => request()->author_id,
            'book_id' => request()->book_id
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
