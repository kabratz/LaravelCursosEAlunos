<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMatriculaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function messages(): array
    {
        return [
            'aluno_id.required' => 'O aluno é obrigatório.',
            'aluno_id.exists' => 'O aluno selecionado não existe no sistema.',

            'turma_id.required' => 'A turma é obrigatória.',
            'turma_id.exists' => 'A turma selecionada não existe no sistema.',

            'aluno_id.unique' => 'Este aluno já está matriculado nesta turma.',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'aluno_id' => 'required|exists:alunos,id',
            'turma_id' => 'required|exists:turmas,id',
            'aluno_id' => 'unique:matriculas,aluno_id,NULL,id,turma_id,' . $this->turma_id,
        ];
    }
}
