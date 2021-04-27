<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>@yield('title')</title>
    <!-- Fonte do Google-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <!-- CSS da aplicação-->
    <link rel="stylesheet" href="/css/styles.css">

</head>

<body>
    <header>
        <nav id="navvar" class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="/img/logo.jpg" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/events/create">Criar eventos</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard">Meus eventos</a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a href="/logout" class="nav-link"
                                        onclick="event.preventDefault();this.closest('form').submit()">Sair</a>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Cadastrar</a>
                            </li>
                        @endguest
                    </ul>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="row">
                @if (session('msg'))
                    <p class="msg alert alert-success">{{ session('msg') }}</p>
                @endif
                @yield('content')
            </div>
        </div>

    </main>

    <footer>@php echo date("Y") @endphp &copy; Todos os direitos reservados</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>

</html>
