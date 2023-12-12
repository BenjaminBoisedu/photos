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
        <div class="album">
            <div class="title">
                <h1>Albums</h1>
            </div>
            <div class="albums">
                @foreach ($albums as $album)
                <div class="album">
                    <a href="{{route('album', ['id' => $album->id])}}">
                        <h2>{{$album->titre}}</h2>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
</body>

</html>