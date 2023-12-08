<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/register.css">
    <title>Document</title>
</head>

<body>
    @extends('layouts.nav')
    <div class="register-form">
        <form action="{{route('registerT')}}" method="post">
            @csrf
            <h1>S'inscrire</h1>
            <div class="txtb">
                <input type="text" name="name" id="name" placeholder="Name">
                <span data-placeholder="Name"></span>
            </div>
            <div class="txtb">
                <input type="email" name="email" id="email" placeholder="Email">
                <span data-placeholder="Email"></span>
            </div>
            <div class="txtb">
                <input type="password" name="password" id="password" placeholder="Password">
                <span data-placeholder="Mot de passe"></span>
            </div>
            <input type="submit" class="logbtn" value="S'inscrire">
            <div class="bottom-text">
                <a href="#">Mot de passe oublié ?</a>
            </div>
        </form>
    </div>
</body>

</html>