<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BookService $bookService)
    {
        $books = $bookService->getAllBooks();
        // $books = [
        //     ['id' => 1, 'title' => 'Kniha1', 'author' => 'Autor1'],
        //     ['id' => 2, 'title' => 'Kniha2', 'author' => 'Autor2'],
        //     ['id' => 3, 'title' => 'Kniha3', 'author' => 'Autor3'],
        // ];

        return response()->json(['books' => $books], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = [
            'title' => $request->input('title'),
            'author' => $request->input('author'),
        ];

        return response()->json(['message' => "kniha bola vytvorená", 'data' => $book], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = [
            'id' => $id,
            'title' => 'Nazov knihy',
            'author' => 'Meno autora'
        ];

        return response()->json(['data' => $book], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = [
            'id' => $id,
            'title' => $request->input('title'),
            'author' => $request->input('author')
        ];

        return response()->json(['message' => 'kniha bola upravená', 'data' => $book], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json(['message' => "kniha s ID $id bola zmazaná."], Response::HTTP_OK);
    }
}