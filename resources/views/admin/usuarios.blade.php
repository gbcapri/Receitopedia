@extends('layouts.app')

@section('title', 'Gerenciar Usuários')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <h1>Gerenciar Usuários</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->isAdmin ? 'Sim' : 'Não' }}</td>
                    <td>
                        @if(!$usuario->isAdmin)
                            <form action="{{ route('admin.usuarios.excluir', $usuario->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="button button-danger" type="submit">Excluir</button>
                            </form>
                        @else
                            <span>Administrador</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a class="button" href="{{ route('admin.dashboard') }}">Voltar ao Dashboard</a>
@endsection
