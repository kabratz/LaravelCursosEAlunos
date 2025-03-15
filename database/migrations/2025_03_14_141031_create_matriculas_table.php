<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('aluno_id')->constrained('alunos');
            $table->foreignUuid('turma_id')->constrained('turmas');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['aluno_id', 'turma_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
