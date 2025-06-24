@extends('layouts.app')

@section('title', 'Página não encontrada')

@section('content')
    <h1>404 - Página não encontrada</h1>
    <p>A página que você tentou acessar não existe.</p>
    <a href="{{ route('home') }}" class="button">Voltar para Home</a>
@endsection
