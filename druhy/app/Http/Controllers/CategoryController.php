<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')
            ->orderBy('name', 'asc')
            ->get();
 
        return response()->json(['categories' => $categories], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = DB::table('categories')
            ->where('name', $request->name)
            ->exists();
 
        if ($category) {
            return response()->json([
                'message' => 'Kategória s týmto názvom už existuje'
            ], Response::HTTP_CONFLICT);
        }
 
        DB::table('categories')->insert([
            'name'       => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
 
        return response()->json([
            'message' => 'Kategória bola vytvorená'
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = DB::table('categories')
            ->where('id', $id)
            ->first();
 
        if (!$category) {
            return response()->json([
                'message' => 'Kategória nenájdená'
            ], Response::HTTP_NOT_FOUND);
        }
 
        return response()->json(['category' => $category], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = DB::table('categories')
            ->where('id', $id)
            ->first();
 
        if (!$category) {
            return response()->json([
                'message' => 'Kategória nenájdená'
            ], Response::HTTP_NOT_FOUND);
        }
 
        $exists = DB::table('categories')
            ->where('name', $request->name)
            ->where('id', '!=', $id)
            ->exists();
 
        if ($exists) {
            return response()->json([
                'message' => 'Kategória s týmto názvom už existuje'
            ], Response::HTTP_CONFLICT);
        }
 
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name'       => $request->name,
                'updated_at' => now(),
            ]);
 
        return response()->json([
            'message' => 'Kategória bola aktualizovaná'
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = DB::table('categories')
            ->where('id', $id)
            ->first();
 
        if (!$category) {
            return response()->json([
                'message' => 'Kategória nenájdená'
            ], Response::HTTP_NOT_FOUND);
        }
 
        $usedInNotes = DB::table('note_category')
            ->where('category_id', $id)
            ->exists();
 
        if ($usedInNotes) {
            return response()->json([
                'message' => 'Kategóriu nie je možné vymazať, pretože je priradená k poznámkam'
            ], Response::HTTP_CONFLICT);
        }
 
        DB::table('categories')->where('id', $id)->delete();
 
        return response()->json([
            'message' => 'Kategória bola vymazaná'
        ], Response::HTTP_OK);
    }
}