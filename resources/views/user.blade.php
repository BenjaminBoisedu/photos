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
        <div class="photos">
            @foreach($photo as $img)
            <div class="photo">
                <a href="{{route('photo', ['id' => $img->id])}}">
                    <img src="{{$img->url}}" alt="">
                </a>
                <h1>
                    {{$img->titre}}
                </h1>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    @endsection
</body>

</html>