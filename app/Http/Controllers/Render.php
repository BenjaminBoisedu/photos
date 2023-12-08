<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Render extends UserController
{
    function displayPhotos()
    {
        $photos = Photo::all();
        return view('index', ['photos' => $photos]);
    }

    function displayPhoto($id)
    {
        $photo = Photo::find($id);
        return view('photo', ['photo' => $photo]);
    }

    function NewPhoto()
    {
        $tags = Tag::all(
            'id',
            'nom'
        );
        return view('NewPhoto', ['tags' => $tags]);
    }

    function NewTag(Request $request)
    {
        $nom = $request->input('NewTag');
        $tag = new Tag();
        $tag->nom = $nom;
        $tag->save();
        return redirect()->route('NewPhoto');
    }

    function NewPhotoT(Request $request)
    {
        $titre = $request->input('titre');
        $url = $request->input('url');
        $tags = $request->input('tags');
        $photo = new Photo();
        $photo->titre = $titre;
        $photo->url = $url;
        $photo->tags = $tags;
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

    function search(Request $request)
    {
        $search = $request->input('search');
        $photos = Photo::query()
            ->where('titre', 'LIKE', "%{$search}%")
            ->get();
        return view('index', ['photos' => $photos]);
    }

    function searchTag(Request $request)
    {
        $search = $request->input('search');
        $photos = Photo::query()
            ->where('tags', 'LIKE', "%{$search}%")
            ->get();
        return view('index', ['photos' => $photos]);
    }
}
