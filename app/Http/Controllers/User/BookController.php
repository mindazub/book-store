<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserBookStoreRequest;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BookController extends Controller
{

    const COVER_DIRECTORY = 'books';

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        $books = Book::paginate(10);

        return view('user.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        $genres = Genre::all();

        return view('user.book.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserBookStoreRequest $request
     * @return Response
     */
    public function store(UserBookStoreRequest $request)
    {


        $data = [
            'title' => $request->getTitle(),
            'description' => $request->getDescription(),
            'price'=> $request->getPrice(),
            'discount' => $request->getDiscount(),
            'cover' => $request->getCover() ? $request->getCover()->store(self::COVER_DIRECTORY) : null,
        ];

        try {
            $book = Book::create($data);

            return redirect()
                ->route('user.book.index')
                ->with('status', 'Book created successfully!');
        } catch (\Throwable $exception) {
            return redirect()
                ->back()
                ->with('error', $exception->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return View
     */
    public function show(Book $book):View
    {
        return view('user.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return View
     */
    public function edit(Book $book):View
    {
        $genres = Genre::all();

        return view('user.book.edit', compact('genres', 'book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserBookStoreRequest $request
     * @param Book $book
     * @return Response
     */
    public function update(UserBookStoreRequest $request, Book $book, $id)
    {

        $data = [
            'title' => $request->getTitle(),
            'description' => $request->getDescription(),
            'price' => $request->getPrice(),
            'discount' => $request->getDiscount(),
            'email'=> $request->getEmail(),
            'genre_id' => $request->getGenreId(),
        ];

        if($request->getCover()) {
            $data['cover'] = $request->getCover()->store(self::COVER_DIRECTORY);
        }

        $book->update($data, [$book->id]);

        return redirect()
            ->route('user.book.index')
            ->with('status', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return Response
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();
            return redirect()
                ->route('user.book.index')
                ->with('status', 'Book deleted successfully!');
        } catch (\Throwable $exception) {
            return redirect()
                ->route('user.book.index.index')
                ->with('error', $exception->getMessage());
        }
    }
}
