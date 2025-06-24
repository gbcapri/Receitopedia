<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->id();
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');            $table->string('categoria', 50);
            $table->string('titulo_receita', 255)->default('');
            $table->text('texto_receita');
            $table->mediumText('foto_receita')->nullable();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('receitas');
    }
};
