<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;

    protected $table = 'receitas';
    public $timestamps = false;

    protected $fillable = [
        'categoria',
        'titulo_receita',
        'texto_receita',
        'foto_receita',
        'likes',
        'dislikes',
        'usuario_id'
    ];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'receita_id');
    }

    public function likes()
    {
        return $this->hasMany(UsuarioLike::class, 'receita_id');
    }
}
