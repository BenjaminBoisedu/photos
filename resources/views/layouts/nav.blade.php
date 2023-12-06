<html>

<head>
    <title>App Name</title>
    <link rel="stylesheet" href="../../../css/nav.css">
    <script></script>
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
                <div class="search">
                    <form action="">
                        <input type="text" name="search" id="search" placeholder="Rechercher">
                        <button type="submit">Rechercher</button>
                    </form>
                </div>
                <div class="menu">
                    <nav>
                        <ul>
                            @guest
                            <li><a href="{{ route('login') }}">Se connecter</a></li>
                            <li><a href="{{route('register')}}">S'inscrire</a></li>
                            @endguest
                            @auth
                            <li><a href="#">Ajouter une photo</a></li>
                            <li><a href="#">Explorer</a></li>
                            <li><a href="#">
                                    {{session('user')->name}}
                                </a></li>
                            </li>
                            <li><a href="{{route('logout')}}">Déconnexion</a></li>
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