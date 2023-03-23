<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anime = Anime::all();

        return response()->json($anime);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // La validation de données
    $this->validate($request, [
        'title' => 'required|max:100',
        'content' => 'required|max:1024',
        'release_date' => 'required|min:8'
    ]);

    // On crée un nouvel utilisateur
    $anime = Anime::create([
        'title' => $request->title,
        'content' => $request->content,
        'release_date' =>$request->release_date
    ]);
    return response()->json($anime, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime $anime)
    {
        return $anime;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anime $anime)
    {
        // La validation de données
    $this->validate($request, [
        'title' => 'required|max:100',
        'content' => 'required|max:1024',
        'release_date' => 'required|min:8'
    ]);

    // On modifie les informations de l'utilisateur
    $anime->update([
        "title" => $request->title,
        "content" => $request->content,
        "release_date" =>$request->release_date
    ]);

        return response()->json($anime);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime $anime)
    {
        $anime->delete();

        return response()->json();
    }
}
