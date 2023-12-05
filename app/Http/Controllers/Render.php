<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Render extends UserController
{
    function index()
    {
        return view('index');
    }
}
