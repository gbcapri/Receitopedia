@extends('layouts.app')

@section('title', 'Receitas')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/receitas.css') }}">
@endsection

@section('content')
    <h1>Receitas</h1>

    <a class="button" href="{{ route('receitas.create') }}">Nova Receita</a> |
    <a class="button button-secondary" href="{{ route('home') }}">Voltar</a>

    <div class="receitas-grid">
        @forelse ($receitas as $receita)
            <div class="card receita-card">
                <h2>{{ $receita->titulo_receita }}</h2>
                <p><strong>Categoria:</strong> {{ $receita->categoria }}</p>

                {{-- Imagem da receita --}}
                @if ($receita->foto_receita)
                    <img src="{{ asset('storage/' . $receita->foto_receita) }}" alt="Foto da Receita" width="300">
                @endif

                <div class="receita-info">
                    <a class="button" href="{{ route('receitas.show', $receita) }}">Ver</a>

                    @auth
                        @if(Auth::id() === $receita->usuario_id || Auth::user()->isAdmin)
                            <a class="button" href="{{ route('receitas.edit', $receita) }}">Editar</a>

                            <form action="{{ route('receitas.destroy', $receita) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="button button-danger" type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        @empty
            <p>Não há receitas cadastradas.</p>
        @endforelse
    </div>
@endsection
