<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $receitas = Receita::orderBy('titulo_receita')->get();
        return view('home', compact('receitas'));
    }
}
