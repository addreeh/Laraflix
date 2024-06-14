<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\APIRequest;
use App\Models\Movie;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        //se devulve en JSON por que es una API
        return response()->json([
            'movies' => $movies,
            'status' => 'true'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(APIRequest $request)
    {
        $movie = Movie::create($request->all());
        return response()->json([
            'status' => true,
            'movie' => $movie,
            'mesage' => 'Todo canela'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Movie::find($id);
        //se devulve en JSON por que es una API
        return response()->json([
            'movies' => $movie,
            'status' => 'true'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::find($id);
        $movie->update($request->all());
        return response()->json([
            'status' => true,
            'movie' => $movie,
            'mesage' => 'Todo canela'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return response()->json([
            'status' => true,
            'mesage' => 'Todo canela'
        ], 200);
    }
}
