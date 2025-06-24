<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Receitopedia')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body>

    <header class="navbar">
        <h2 style="color:white;">Receitopedia</h2>
        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('receitas.index') }}">Receitas</a>
            @auth
                @if(Auth::user()->isAdmin)
                    <a href="{{ route('admin.dashboard') }}">Admin</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button class="button button-danger" type="submit">Sair</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Cadastrar</a>
            @endauth
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer class="footer">
        <p>&copy; 2025 Receitopedia</p>
    </footer>

</body>
</html>