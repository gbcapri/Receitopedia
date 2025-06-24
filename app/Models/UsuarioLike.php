<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'receita_id',
        'like',
    ];

    public $timestamps = false;
    //protected $table = 'usuario_likes';
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function receita()
    {
        return $this->belongsTo(Receita::class);
    }
}
