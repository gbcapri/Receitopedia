<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'texto_comentario' => 'required|string',
        ]);

        Comentario::create([
            'texto_comentario' => $request->input('texto_comentario'),
            'receita_id' => $id,
            'usuario_id' => Auth::id(),
        ]);

        return back()->with('success', 'Comentário adicionado com sucesso!');
    }

    public function destroy(Comentario $comentario)
    {
        if (auth()->user()->id !== $comentario->usuario_id && !auth()->user()->isAdmin) {
            abort(403, 'Você não tem permissão para excluir este comentário.');
        }

        $comentario->delete();

        return back()->with('success', 'Comentário deletado!');
    }

}
