<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlunoRequest extends FormRequest
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
            'nome.required' => 'O nome completo é obrigatório.',
            'nome.string' => 'O nome deve ser um texto válido.',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',

            'usuario.required' => 'O nome de usuário é obrigatório.',
            'usuario.max' => 'O nome de usuário não pode ter mais de 20 caracteres.',
            'usuario.min' => 'O nome de usuário deve ter pelo menos 5 caracteres.',
            'usuario.unique' => 'Este nome de usuário já está em uso. Escolha outro.',

            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'data_nascimento.date' => 'A data de nascimento deve estar no formato correto (AAAA-MM-DD).',
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
            'usuario' => 'required|max:50|unique:alunos,usuario',
            'data_nascimento' => 'required|date',
        ];
    }
}
