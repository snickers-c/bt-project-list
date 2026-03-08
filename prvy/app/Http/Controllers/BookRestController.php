<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookRestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = [
            ['id' => 1, 'title' => 'Kniha1', 'author' => 'Autor1'],
            ['id' => 2, 'title' => 'Kniha2', 'author' => 'Autor2'],
            ['id' => 3, 'title' => 'Kniha3', 'author' => 'Autor3'],
        ];

        return response(['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo "Zobrazujem formulár pre pridanie novej knihy.";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $author = $request->input('author');

        return response("kniha s názvom $title bola vytvorená. autor: $author");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response("zobrazuje sa kniha s ID = $id");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        echo "Zobrazujem formulár pre úpravu knihy s ID = $id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newTitle = $request->input('title');
        $autor = $request->input('autor');
        
        return response("Kniha s ID = $id bola upravená na '$newTitle' - '$autor'");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response("Kniha s ID = $id bola vymazaná");
    }
}