<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Render extends UserController
{
    function displayPhotos()
    {
        // Random
        $photos = Photo::inRandomOrder()->get();
        return view('index', ['photos' => $photos]);
    }

    function displayPhoto($id)
    {
        $photo = Photo::find($id);
        return view('photo', ['photo' => $photo]);
    }

    function search(Request $request)
    {
        $search = $request->input('search');
        $photos = Photo::query()
            ->where('titre', 'LIKE', "%{$search}%")
            ->get();
        return view('index', ['photos' => $photos]);
    }

    function NewPhoto()
    {
        $albums = User::find(session('user')->id)->albums;
        return view('NewPhoto');
    }

    function NewPhotoT(Request $request)
    {
        $titre = $request->input('titre');
        $url = $request->input('url');
        $photo = new Photo();
        $photo->titre = $titre;
        $photo->url = $url;
        $photo->album()->associate($request->user());
        $photo->save();
        return redirect()->route('index');
    }

    function explorer()
    {
        $photos = Photo::all();
        return view('explorer', ['photos' => $photos]);
    }

    function explorerT(Request $request)
    {
        $search = $request->input('search');
        $photos = Photo::query()
            ->where('note', 'LIKE', "%{$search}%")
            ->get();
        return view('explorer', ['photos' => $photos]);
    }
}