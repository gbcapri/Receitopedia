@extends('layouts.app')

@section('title', 'Cadastro')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <h1>Cadastro</h1>

    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Senha:</label>
            <input type="password" name="senha" required>
        </div>
        <div>
            <label>Confirme a Senha:</label>
            <input type="password" name="senha_confirmation" required>
        </div>
        <button class="button" type="submit">Cadastrar</button>
    </form>

    <p>Já tem uma conta? <a href="{{ route('login') }}">Entrar</a></p>

    @if($errors->any())
        <div>
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif
@endsection
