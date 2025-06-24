<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('email')->unique();
            $table->string('senha');
            $table->boolean('isAdmin')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
