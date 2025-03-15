<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turma extends Model
{
    use HasUuids;
    protected $table = 'turmas';

    protected $fillable = [
        'nome',
        'descricao',
        'tipo',
    ];

    /**
     * Pega as matriculas associadas à turma.
     */
    public function maticulas(): HasMany
    {
        return $this->hasMany(Matricula::class);
    }

     /**
     * Pega os alunos associados à turma.
     */
    public function alunos(): BelongsToMany
    {
        return $this->belongsToMany(Aluno::class, 'matriculas');
        return $this->belongsToMany(Turma::class, 'matriculas', 'turma_id', 'aluno_id');

    }
}
