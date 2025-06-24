<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    public function index()
    {
        $receitas = Receita::all();
        return view('receitas.index', compact('receitas'));
    }

    public function create()
    {
        return view('receitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required',
            'titulo_receita' => 'required',
            'texto_receita' => 'required',
            'foto_receita' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['usuario_id'] = auth()->id();

        if ($request->hasFile('foto_receita')) {
            $file = $request->file('foto_receita');
            $path = $file->store('receitas', 'public');
            $data['foto_receita'] = $path;
        }

        Receita::create($data);

        return redirect()->route('receitas.index')
                        ->with('success', 'Receita criada com sucesso!');
    }

    public function show(Receita $receita)
    {
        return view('receitas.show', compact('receita'));
    }

    public function edit(Receita $receita)
    {
        if (auth()->user()->id !== $receita->usuario_id && !auth()->user()->isAdmin) {
            abort(403, 'Você não tem permissão para editar esta receita.');
        }

        return view('receitas.edit', compact('receita'));
    }

    public function update(Request $request, Receita $receita)
    {
        if (auth()->user()->id !== $receita->usuario_id && !auth()->user()->isAdmin) {
            abort(403, 'Você não tem permissão para atualizar esta receita.');
        }

        $request->validate([
            'categoria' => 'required',
            'titulo_receita' => 'required',
            'texto_receita' => 'required',
            'foto_receita' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_receita')) {
            $file = $request->file('foto_receita');
            $path = $file->store('receitas', 'public');
            $data['foto_receita'] = $path;
        }

        $receita->update($data);

        return redirect()->route('receitas.index')
                        ->with('success', 'Receita atualizada com sucesso!');
    }

    public function destroy(Receita $receita)
    {
        if (auth()->user()->id !== $receita->usuario_id && !auth()->user()->isAdmin) {
            abort(403, 'Você não tem permissão para excluir esta receita.');
        }

        $receita->delete();

        return redirect()->route('receitas.index')
                        ->with('success', 'Receita excluída com sucesso!');
    }


}
