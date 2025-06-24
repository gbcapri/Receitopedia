@extends('layouts.app')

@section('title', 'Editar Receita')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
@endsection

@section('content')
    <h1>Editar Receita</h1>

    <form method="POST" action="{{ route('receitas.update', $receita) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label>Categoria:</label>
            <input type="text" name="categoria" value="{{ $receita->categoria }}" required>
        </div>
        <div>
            <label>Título:</label>
            <input type="text" name="titulo_receita" value="{{ $receita->titulo_receita }}" required>
        </div>
        <div>
            <label>Texto da Receita:</label>
            <textarea name="texto_receita" required>{{ $receita->texto_receita }}</textarea>
        </div>
        <div>
            <label>Foto da Receita:</label><br>
            <input type="file" name="foto_receita" accept="image/*"><br><br>
        </div>
        <button type="submit" class="button">Atualizar</button>
    </form>
@endsection
