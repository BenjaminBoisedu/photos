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

    @foreach ($photos as $img)
    <div class="photo">
        <div class="description">
            <img src="{{$img->url}}" alt="{{$img->titre}}">
            <h2>{{$img->titre}}</h2>
        </div>
    </div>

    @endforeach
    @endsection


</body>

</html>