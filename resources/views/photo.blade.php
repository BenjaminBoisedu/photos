<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <div class="info-photo">
            <div class="photo">
                <img src="{{$photo->url}}" alt="{{$photo->titre}}">
            </div>
            <div class="description">
                <h2>{{$photo->titre}}</h2>
                <p>{{$photo->description}}</p>
            </div>
        </div>
    </div>

</body>

</html>