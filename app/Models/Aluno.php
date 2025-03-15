<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aluno extends Model
{
    use HasUuids;
    protected $table = 'alunos';
    protected $fillable = [
        'nome',
        'usuario',
        'data_nascimento',
    ];
    
    protected $casts = [
        'data_nascimento' => 'date',
    ];

    /**
     * Pega as matriculas associadas ao aluno.
     */
    public function matriculas(): HasMany
    {
        return $this->hasMany(Matricula::class);
    }

    /**
     * Pega as turmas associadas ao aluno.
     */
    public function turmas(): BelongsToMany
    {
        return $this->belongsToMany(Turma::class, 'matriculas', 'aluno_id', 'turma_id');
    }
}
