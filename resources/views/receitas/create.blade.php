@extends('layouts.app')

@section('title', 'Criar Receita')

@section('content')
    <h1>Criar Receita</h1>

    <form method="POST" action="{{ route('receitas.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Categoria:</label>
            <input type="text" name="categoria" required>
        </div>
        <div>
            <label>Título:</label>
            <input type="text" name="titulo_receita" required>
        </div>
        <div>
            <label>Texto da Receita:</label>
            <textarea name="texto_receita" required></textarea>
        </div>
        <div>
            <label>Foto da Receita:</label><br>
            <input type="file" name="foto_receita" accept="image/*"><br><br>
        </div>
        <button type="submit" class="button">Salvar</button>
    </form>
@endsection
