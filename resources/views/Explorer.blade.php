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
        <div class="Photo-container">
            <div class="notes">
                <h1>Les plus populaires</h1>
                <form action="{{route('explorerT')}}" method="POST">
                    @csrf
                    <select name="search" id="">
                        <option value="1">1 étoile</option>
                        <option value=" 2">2 étoiles</option>
                        <option value="3">3 étoiles</option>
                        <option value="4">4 étoiles</option>
                        <option value="5">5 étoiles</option>
                    </select>
                    <input type="submit" value="Rechercher">
                </form>
            </div>
            @foreach ($photos as $img)
            <div class="photo">
                <div class="description">
                    <a href="{{route('photo', ['id' => $img->id])}}"><img src="{{$img->url}}" alt="{{$img->titre}}"></a>
                    <h2>{{$img->titre}}</h2>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
</body>

</html>