@extends('layouts.app')
@section('content')

<form action="{{ route('matriculas.store') }}" method="POST" class="space-y-6">
    @csrf

    <div class="form-group">
        <label for="aluno_id" class="block text-sm font-medium text-gray-700">Escolha o aluno:</label>
        <select class="form-control mt-1 block w-full" name="aluno_id" id="aluno_id" required>
            <option value="">Selecione um aluno</option>
            @foreach($alunos as $aluno)
            <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="turma_id" class="block text-sm font-medium text-gray-700">Escolha a Turma:</label>
        <select class="form-control mt-1 block w-full" name="turma_id" id="turma_id" required>
            <option value="">Selecione uma turma</option>
            @foreach($turmas as $turma)
            <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="btn btn-primary bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
            Matricular aluno
        </button>
    </div>
</form>
@endsection