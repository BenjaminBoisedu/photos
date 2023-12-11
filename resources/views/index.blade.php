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
        <div class="title">
            <h1>Explorer</h1>
        </div>
        <div class="Container-tag">

            @foreach ($tags as $tag)
            <div class="tag">
                <a href="{{route('tag', ['id' => $tag->id])}}">{{$tag->nom}}</a>
            </div>
            @endforeach
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
                <div class="addAlbums">
                    <form action="{{route('index')}}" method="POST">
                        @csrf
                        <select name="album" id="">
                            @foreach ($albums as $a)
                            <option value="{{$a->id}}">{{$a->titre}}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="Ajouter à l'album">
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection


</body>

</html>