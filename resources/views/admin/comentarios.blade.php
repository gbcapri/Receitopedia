@extends('layouts.app')

@section('title', 'Gerenciar Comentários')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <h1>Gerenciar Comentários</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Receita</th>
                <th>Comentário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comentarios as $comentario)
                <tr>
                    <td>{{ $comentario->id }}</td>
                    <td>{{ $comentario->usuario->nome }}</td>
                    <td>{{ $comentario->receita->titulo_receita }}</td>
                    <td>{{ $comentario->texto_comentario }}</td>
                    <td>
                        <form action="{{ route('admin.comentarios.excluir', $comentario->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="button button-danger" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a class="button" href="{{ route('admin.dashboard') }}">Voltar ao Dashboard</a>
@endsection
