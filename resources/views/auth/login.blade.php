@extends('layouts.app')

@section('title', 'Login')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
    <h1>Login</h1>

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div>
            <label>Email:</label>
            <input type="email" name="email" required autofocus>
        </div>
        <div>
            <label>Senha:</label>
            <input type="password" name="password" required>
        </div>
        <button class="button" type="submit">Entrar</button>
    </form>

    <p>Não tem uma conta? <a href="{{ route('register') }}">Cadastrar</a></p>

    @if($errors->any())
        <div>
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif
@endsection
