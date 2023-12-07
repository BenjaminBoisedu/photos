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
        <div class="form-photos">
            <h1>Ajouter une photo</h1>
            <div class="error">
                @if($errors->any())
                @foreach($errors->all() as $error)
                <p>{{$error}}</p>
                @endforeach
                @endif
            </div>
            <div class="success">
                @if(session('success'))
                <p>{{session('success')}}</p>
                @endif
            </div>
            <form action="{{route('NewPhotoT')}}" method="POST">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre">
                <label for="url">Url</label>
                <input type="text" name="url" id="url">
                @csrf
                <label for="file">Ajouter votre photo</label>
                <input type="file" name="file" id="file">
                @csrf
                <input type="submit" value="Envoyer">

            </form>
        </div>
    </div>
    @endsection

</body>

</html>