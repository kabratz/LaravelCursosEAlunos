@extends('layouts.app')

@section('content')

<form action="{{ route('turmas.store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
        <input type="text"
            id="nome"
            name="nome"
            value="{{ old('nome') }}"
            min="3"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div class="mb-4">
        <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
        <textarea id="descricao"
            name="descricao"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('descricao') }}</textarea>
    </div>

    <div class="mb-4">
        <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo</label>
        <select id="tipo" name="tipo" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="presencial" {{ old('tipo') == 'presencial' ? 'selected' : '' }}>Presencial</option>
            <option value="online" {{ old('tipo') == 'online' ? 'selected' : '' }}>Online</option>
        </select>
    </div>

    <div class="flex justify-end mt-6">
        <button type="submit"
            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Criar turma
        </button>
    </div>
</form>

@endsection