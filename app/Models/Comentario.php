<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'comentarios';

    protected $fillable = [
        'receita_id',
        'usuario_id',
        'texto_comentario',
    ];

    public function receita()
    {
        return $this->belongsTo(Receita::class, 'receita_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    
}
