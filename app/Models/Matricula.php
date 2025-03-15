<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Matricula extends Model
{
    use HasUuids;
    protected $table = 'matriculas';

    protected $fillable = [
        'aluno_id',
        'turma_id',
    ];

    /**
     * Pega o aluno associado à matricula.
     */
    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }

    /**
     * Pega a turma associada à matricula.
     */
    public function turma(): BelongsTo
    {
        return $this->belongsTo(Turma::class);
    }
}
