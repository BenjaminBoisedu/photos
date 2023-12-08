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
        <div class="Photo-container">
            @foreach ($photos as $img)
            <div class="photo">
                <div class="description">
                    <a href="{{route('photo', ['id' => $img->id])}}"><img src="{{$img->url}}" alt="{{$img->titre}}"></a>
                    <h2>{{$img->titre}}</h2>
                </div>
                <div class="addAlbums">
                    <form action="{{route('addAlbums')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$img->id}}">
                        <select name="album" id="">

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