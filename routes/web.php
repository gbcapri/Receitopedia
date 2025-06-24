<?php
use App\Http\Middleware\IsAdmin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UsuarioLikeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

// Autenticação
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Área autenticada
Route::middleware('auth')->group(function () {
// CRUD de receitas
Route::resource('receitas', ReceitaController::class);

// Comentários nas receitas
Route::post('/receitas/{id}/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::delete('/comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');

// Likes e Dislikes nas receitas
Route::post('/receitas/{id}/like', [UsuarioLikeController::class, 'like'])->name('receitas.like');
Route::post('/receitas/{id}/dislike', [UsuarioLikeController::class, 'dislike'])->name('receitas.dislike');
});

// Área administrativa
Route::middleware(['auth', IsAdmin::class])->group(function () {
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/usuarios', [AdminController::class, 'gerenciarUsuarios'])->name('admin.usuarios');
Route::delete('/admin/usuarios/{id}', [AdminController::class, 'excluirUsuario'])->name('admin.usuarios.excluir');

Route::get('/admin/comentarios', [AdminController::class, 'gerenciarComentarios'])->name('admin.comentarios');
Route::delete('/admin/comentarios/{id}', [AdminController::class, 'excluirComentario'])->name('admin.comentarios.excluir');
});
