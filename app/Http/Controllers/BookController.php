<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Retrieve the list show value from the input
        $list_show = $request->input('list_show', 10);

        // Retrieve the search text from the input
        $search_text = $request->input('search_text', '');

        // Query the books table, order by average rating from the highest value to the lowest
        $book = Book::with(['author', 'category'])
            ->withCount('ratings')
            ->where(function ($query) use ($search_text) {
                $query->where('title', 'LIKE', '%'.$search_text.'%')
                    ->orWhereHas('author', function ($query) use ($search_text) {
                        $query->where('name', 'LIKE', '%'.$search_text.'%');
                    });
            })
            ->orderByDesc('avgRating')
            ->paginate($list_show);

        return view('book.index', compact('book', 'list_show', 'search_text'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
