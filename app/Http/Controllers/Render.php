<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Render extends UserController
{
    function index()
    {
        return view('index');
    }

    function displayPhotos()
    {
        $photos = Photo::all();
        return view('index', ['photos' => $photos]);
    }
}
