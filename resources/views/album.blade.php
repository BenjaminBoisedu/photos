<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('layouts.nav')
    @section('content')
    <div class="photo-albums">
        <div class="container">
            <div class="title">
                <h1>{{$album->titre}}</h1>
            </div>
            <div class="photos">
                @foreach ($photos as $img)
                <div class="photo">
                    <a href="{{route('photo', ['id' => $img->id])}}"><img src="{{$img->url}}" alt="{{$img->titre}}"></a>
                    <h2>{{$img->titre}}</h2>
                    @foreach ($img->tags as $tag)
                    <p>{{$tag->nom}}</p>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>