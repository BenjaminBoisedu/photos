<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/NewAlbum.css">
    <title>Document</title>
</head>

<body>
    @extends('layouts.nav')
    @section('content')
    <div class="container-form">
        <div class="form">
            <h1>Ajouter un album</h1>
            <form action="{{route('NewAlbumT')}}" method="POST">
                @csrf
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre">
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
    @endsection
</body>

</html>