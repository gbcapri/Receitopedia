<?php

namespace App\Http\Controllers;

use App\Models\UsuarioLike;
use App\Models\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioLikeController extends Controller
{
    public function like($id)
    {
        // Cria ou atualiza o like do usuário
        UsuarioLike::updateOrCreate(
            ['usuario_id' => Auth::id(), 'receita_id' => $id],
            ['like' => true]
        );

        // Atualiza contagem de likes e dislikes
        $this->atualizarContagem($id);

        return back();
    }

    public function dislike($id)
    {
        UsuarioLike::updateOrCreate(
            ['usuario_id' => Auth::id(), 'receita_id' => $id],
            ['like' => false]
        );

        // Atualiza contagem de likes e dislikes
        $this->atualizarContagem($id);

        return back();
    }

    private function atualizarContagem($receitaId)
    {
        $likes = UsuarioLike::where('receita_id', $receitaId)->where('like', true)->count();
        $dislikes = UsuarioLike::where('receita_id', $receitaId)->where('like', false)->count();

        Receita::where('id', $receitaId)->update([
            'likes' => $likes,
            'dislikes' => $dislikes
        ]);
    }
}
