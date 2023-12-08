<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;

class AlbumController extends UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all(
            'id',
            'titre'
        );
        return view('index', ['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('NewAlbum');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $titre = $request->input('titre');
        $album = new Album();
        $album->titre = $titre;
        $album->user()->associate($request->user());
        $album->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
    }
}