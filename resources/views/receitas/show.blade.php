@extends('layouts.app')

@section('title', $receita->titulo_receita)

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/receita.css') }}">
@endsection

@section('content')
    <h1>{{ $receita->titulo_receita }}</h1>

    {{-- Imagem da Receita --}}
    @if ($receita->foto_receita)
        <img src="{{ asset('storage/' . $receita->foto_receita) }}" alt="Foto da Receita" width="400">
    @endif

    <p><strong>Categoria:</strong> {{ $receita->categoria }}</p>
    <p>{{ $receita->texto_receita }}</p>

    <p>
        <strong>Likes:</strong> {{ $receita->likes }} |
        <strong>Dislikes:</strong> {{ $receita->dislikes }}
    </p>

    {{-- Botões de Like e Dislike --}}
    <div class="like-buttons">
        <form method="POST" action="{{ route('receitas.like', $receita->id) }}" style="display:inline;">
            @csrf
            <button class="button button-secondary" type="submit">Like 👍</button>
        </form>

        <form method="POST" action="{{ route('receitas.dislike', $receita->id) }}" style="display:inline;">
            @csrf
            <button class="button button-danger" type="submit">Dislike 👎</button>
        </form>
    </div>

    {{-- Botões de Editar e Excluir --}}
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

    <h2>Comentários</h2>

    <div class="comentarios">
        @forelse($receita->comentarios as $comentario)
            <div class="comentario">
                <strong>{{ $comentario->usuario->nome }}:</strong> {{ $comentario->texto_comentario }}

                @auth
                    @if(Auth::id() === $comentario->usuario_id || Auth::user()->isAdmin)
                        <form method="POST" action="{{ route('comentarios.destroy', $comentario) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="button button-danger" type="submit" onclick="return confirm('Apagar este comentário?')">Apagar</button>
                        </form>
                    @endif
                @endauth
            </div>
        @empty
            <p>Sem comentários ainda.</p>
        @endforelse
    </div>

    {{-- Formulário para novo comentário --}}
    @auth
        <h3>Adicionar Comentário</h3>
        <form method="POST" action="{{ route('comentarios.store', $receita->id) }}">
            @csrf
            <textarea name="texto_comentario" rows="3" required></textarea><br>
            <button class="button" type="submit">Comentar</button>
        </form>
    @else
        <p>Faça <a href="{{ route('login') }}">login</a> para comentar.</p>
    @endauth

    <br>
    <a class="button button-secondary" href="{{ route('receitas.index') }}">Voltar para receitas</a>
@endsection
