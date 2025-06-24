<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receita;
use App\Models\Usuario;
use App\Models\Comentario;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalReceitas' => Receita::count(),
            'totalUsuarios' => Usuario::count(),
            'totalComentarios' => Comentario::count(),
            'receitas' => Receita::all()
        ]);
    }

    public function gerenciarUsuarios()
    {
        $usuarios = Usuario::all();
        return view('admin.usuarios', compact('usuarios'));
    }

    public function excluirUsuario($id)
    {
        $usuario = Usuario::findOrFail($id);

        if ($usuario->isAdmin) {
            return back()->with('error', 'Não é possível excluir um administrador.');
        }

        $usuario->delete();

        return back()->with('success', 'Usuário excluído com sucesso!');
    }

    public function gerenciarComentarios()
    {
        $comentarios = Comentario::with('receita', 'usuario')->get();
        return view('admin.comentarios', compact('comentarios'));
    }

    public function excluirComentario($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();

        return back()->with('success', 'Comentário excluído com sucesso!');
    }
}
