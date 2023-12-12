<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/albums.css">
    <title>Document</title>
</head>

<body>
    @extends('layouts.nav')
    @section('content')
    <div class="container">
        <div class="title">
            <h1>Explorer</h1>
        </div>
        <div class="search">
            <form action="{{route('search')}}" method="post">
                @csrf
                <input type="text" name="search" id="search" placeholder="Rechercher">
                <button type="submit">Rechercher</button>
            </form>
        </div>

        <div class="searchDate">
            <form action="{{ route('searchAlbumsDate') }}" method="post">
                @csrf
                <select name="order" id="">
                    <option value="asc">Du plus ancien au plus récent</option>
                    <option value="desc">Du plus récent au plus ancien</option>
                </select>
                <button type="submit">Rechercher</button>
            </form>
        </div>

        <div class="Photo-container">
            @foreach ($albums as $a)
            <div class="albums">
                <div class="infos">
                    {{-- <a href="{{route('photo', ['id' => $img->id])}}"><img src="{{$img->url}}" alt="{{$img->titre}}"></a> --}}
                    {{-- link a to the album/id --}}
                    <a href="{{route('album', ['id' => $a->id])}}">
                        <img src="{{$a->url}}" alt="{{$a->titre}}">
                        <h2 class="album-title">{{$a->titre}}</h2>
                    </a>
                    <p>{{$a->creation}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    @endsection


</body>

</html>