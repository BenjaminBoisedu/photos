<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Tag;
use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Render extends UserController
{
    function displayPhotos()
    {
        $photos = Photo::all();
        $albums = Album::all();
        $tags = Tag::all();
        // random
        $photos = Photo::inRandomOrder()->get();
        return view('index', ['photos' => $photos, 'albums' => $albums, 'tags' => $tags]);
    }

    function displayPhoto($id)
    {
        $photo = Photo::find($id);
        return view('photo', ['photo' => $photo]);
    }

    function NewPhoto()
    {
        $albums = Album::all();
        $tags = Tag::all(
            'id',
            'nom'
        );
        return view('NewPhoto', ['tags' => $tags], ['albums' => $albums]);
    }

    function NewTag(Request $request)
    {
        $nom = $request->input('NewTag');
        $tag = new Tag();
        $tag->nom = $nom;
        $tag->save();
        return redirect()->route('NewPhoto');
    }

    function showByTag($id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            // Handle the case where the tag is not found
            abort(404);
        }

        // Get photos associated with the clicked tag
        $photos = $tag->photos;

        $albums = Album::all();
        $tags = Tag::all();

        return view('index', ['photos' => $photos, 'albums' => $albums, 'tags' => $tags, 'tag' => $tag]);
    }

    function NewPhotoT(Request $request)
    {
        $titre = $request->input('titre');
        $url = $request->input('url');
        $tags = $request->input('tags');
        $albums = $request->input('album');
        $photo = new Photo();
        $photo->titre = $titre;
        $photo->id = count(Photo::all()) + 1;
        $photo->url = $url;
        $photo->note = 0;
        $photo->album_id = $albums;
        $photo->tags()->attach($tags);
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
        $albums = Album::all();
        $tags = Tag::all();
        $photos = Photo::query()
            ->where('titre', 'LIKE', "%{$search}%")
            ->get();
        return view('index', ['photos' => $photos, 'albums' => $albums, 'tags' => $tags]);
    }

    function searchAlbumsDate(Request $request)
    {
        $order = $request->input('order', 'asc');

        $albums = Album::orderBy('creation', $order)->get();

        return view('albums', ['albums' => $albums]);
    }

    function displayAlbums()
    {
        $photos = Photo::all();
        $albums = Album::all();
        return view('albums', ['albums' => $albums]);
    }

    function displayAlbum($id)
    {
        $album = Album::find($id);
        $photos = $album->photos;
        return view('album', ['album' => $album, 'photos' => $photos]);
    }

    function deletePhoto($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        return redirect()->route('index');
    }
}
