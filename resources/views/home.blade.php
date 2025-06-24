@extends('layouts.app')

@section('title', 'Receitopedia - Home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <h1>Bem-vindo ao Receitopedia</h1>

    @auth
        <p>Olá, {{ Auth::user()->nome }}!</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="button button-danger" type="submit">Sair</button>
        </form>
    @else
        <a href="{{ route('login') }}">Login</a> |
        <a href="{{ route('register') }}">Cadastrar</a>
    @endauth

    <h2>Receitas</h2>
    <a class="button" href="{{ route('receitas.create') }}">Criar Nova Receita</a>

    <ul>
        @foreach($receitas as $receita)
            <li>
                <a href="{{ route('receitas.show', $receita) }}">{{ $receita->titulo_receita }}</a>
            </li>
        @endforeach
    </ul>
@endsection
