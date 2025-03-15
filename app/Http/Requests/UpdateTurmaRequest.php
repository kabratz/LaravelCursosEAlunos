<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTurmaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome da turma é obrigatório.',
            'nome.string' => 'O nome da turma deve ser um texto válido.',
            'nome.max' => 'O nome da turma não pode ter mais de 255 caracteres.',
            'nome.min' => 'O nome da turma deve ter pelo menos 3 caracteres.',

            'descricao.string' => 'A descrição da turma deve ser um texto válido.',
            'descricao.max' => 'A descrição da turma não pode ter mais de 500 caracteres.',

            'tipo.required' => 'O tipo da turma é obrigatório.',
            'tipo.string' => 'O tipo da turma deve ser um texto válido.',
            'tipo.max' => 'O tipo da turma não pode ter mais de 100 caracteres.',
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
            'nome' => 'required|string|max:255|min:3',
            'descricao' => 'nullable|string|max:500',
            'tipo' => 'required|string|max:100',
        ];
    }
}
