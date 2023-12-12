<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <title>Document</title>
</head>

<body>
    @extends('layouts.nav')
    @section('content')
    <div class="container">
        <div class="infos-user">
            <div class="user"></div>
            <div class="avatar">
                <img src="{{$user->avatar}}" alt="">
            </div>
            <div class="infos">
                <h1>{{$user->name}}</h1>
            </div>
        </div>
        <div class="search">
            <form action="{{route('search')}}" method="post">
                @csrf
                <input type="text" name="search" id="search" placeholder="Rechercher">
                <button type="submit">Rechercher</button>
            </form>
        </div>
        <div class="Photo-container">
            @foreach ($photos as $img)
            <div class="photo">
                <div class="description">
                    <a href="{{route('photo', ['id' => $img->id])}}"><img src="{{$img->url}}" alt="{{$img->titre}}"></a>
                    <h2>{{$img->titre}}</h2>
                    @foreach ($img->tags as $tag)
                    <p>{{$tag->nom}}</p>
                    @endforeach
                </div>
                <div class="deleteAlbum">
                    <form action="{{route('deletePhoto', ['id' => $img->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Supprimer">
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>
    </div>
    @endsection
</body>

</html>