<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();

        return response()->json($category);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // La validation de données
    $this->validate($request, [
        'title' => 'required|max:100',
        'animes_id' => 'required|max:1024'
    ]);

    // On crée un nouvel utilisateur
    $category = Category::create([
        'title' => $request->title,
        'animes_id' => $request->animes_id,
    ]);
    return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'animes_id' => 'required|max:1024'
        ]);
    
        // On crée un nouvel utilisateur
        $category->update([
            'title' => $request->title,
            'animes_id' => $request->animes_id,
        ]);
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json();
    }
}
