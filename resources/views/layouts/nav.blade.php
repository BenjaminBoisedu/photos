<html>

<head>
    <title>App Name</title>
    <link rel="stylesheet" href="../../../css/nav.css">
    <script></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>

<body>
    <div class="global-container">
        <main>
            <header class="top">
                <div class="logo-nom">
                    <a href="{{route('index')}}">
                        <h1>Rquim</h1>
                    </a>

                </div>
                <div class="menu">
                    <nav>
                        <ul>
                            @guest
                            <li><a href="{{ route('login') }}">Se connecter</a></li>
                            <li><a href="{{route('register')}}">S'inscrire</a></li>
                            @endguest
                            @auth
                            <li><a href="{{route('albums')}}">Albums</a></li>
                            <li><a href="{{route('NewAlbum')}}">Ajouter un album</a></li>
                            <li><a href="{{route('NewPhoto')}}">Ajouter une photo</a></li>
                            <li><a href="{{route('user', ['id' => session('user')->id])}}">
                                    {{session('user')->name}}
                                </a></li>
                            </li>
                            <li><a href=" {{route('logout')}}">Déconnexion</a></li>
                            @endauth
                        </ul>
                    </nav>
            </header>
            @section('content')
            @show
        </main>
    </div>
</body>

</html>