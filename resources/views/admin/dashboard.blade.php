@extends('layouts.app')

@section('title', 'Painel Administrativo')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <div class="admin-dashboard">
        <aside class="admin-sidebar">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('receitas.index') }}">Gerenciar Receitas</a></li>
                <li><a href="{{ route('admin.usuarios') }}">Gerenciar Usuários</a></li>
                <li><a href="{{ route('admin.comentarios') }}">Gerenciar Comentários</a></li>
            </ul>
        </aside>

        <section class="admin-content">
            <h1>Painel Administrativo</h1>

            <div>
                <p><strong>Total de Receitas:</strong> {{ $totalReceitas }}</p>
                <p><strong>Total de Usuários:</strong> {{ $totalUsuarios }}</p>
                <p><strong>Total de Comentários:</strong> {{ $totalComentarios }}</p>
            </div>

            <h2>Receitas</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($receitas as $receita)
                        <tr>
                            <td>{{ $receita->id }}</td>
                            <td>{{ $receita->titulo_receita }}</td>
                            <td>
                                <a class="button" href="{{ route('receitas.edit', $receita) }}">Editar</a>
                                <form action="{{ route('receitas.destroy', $receita) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button button-danger" type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
