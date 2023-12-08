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
        <form action="{{route('search')}}" method="post">
            @csrf
            <input type="text" name="search" id="search" placeholder="Rechercher par nom">
            <button type="submit">Rechercher</button>
        </form>
        @foreach ($tags as $tag)
        <div class="tag">
            <a href="{{route('searchTag', ['id' => $tag->id])}}">{{$tag->nom}}</a>
        </div>
        @endforeach
        <div class="Photo-container">
            @foreach ($photos as $img)
            <div class="photo">
                <div class="description">
                    <a href="{{route('photo', ['id' => $img->id])}}"><img src="{{$img->url}}" alt="{{$img->titre}}"></a>
                    <h2>{{$img->titre}}</h2>
                </div>
                <div class="addAlbums">
                    <form action="{{route('index')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$img->id}}">
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection


</body>

</html>