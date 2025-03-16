@extends('layouts.app')

@section('content')

<div class="mb-4">
    <strong class="text-gray-700">Descrição:</strong>
    <p class="text-gray-600">{{ $turma->descricao ?? 'Não Informada' }}</p>
</div>

<div class="mb-4">
    <strong class="text-gray-700">Tipo:</strong>
    <p class="text-gray-600">{{ $turma->tipo }}</p>
</div>

<div class="mb-4">
    <strong class="text-gray-700">Alunos: </strong>
    @if($turma->matriculas->count() > 0)
        <p class="text-gray-600">Total de matrículas: {{ $turma->matriculas->count() }}</p>
        <ul class="list-disc pl-5 text-gray-600">
            @foreach($turma->matriculas as $matricula)
            <li class="flex items-center justify-between bg-gray-50 border-b p-4 rounded mb-2">
                <span>{{ $matricula->aluno->nome }}</span>
                <form action="{{ route('matriculas.destroy', $matricula->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja desmatricular {{ $matricula->aluno->nome }}?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">
                        Desmatricular
                    </button>
                </form>
            </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-600">Não há alunos matriculados nesta turma.</p>
    @endif
</div>

<!-- Botão para abrir a modal -->
<div class="mt-6">
    <button id="openModal" class="inline-block bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Matricular aluno</button>
</div>

<!-- Modal para Matricular -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-6 w-1/3">
        <h3 class="text-2xl font-semibold mb-4">Matricular aluno na Turma</h3>
        <form action="{{ route('matriculas.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="aluno_id" class="block text-sm font-medium text-gray-700">Escolha o aluno:</label>
                <select class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                    name="aluno_id" id="aluno_id" required>
                    <option value="">Selecione um aluno</option>
                    @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="turma_id" value="{{ $turma->id }}">

            <button type="submit" class="mt-4 w-full p-2 bg-blue-600 text-white rounded-md">
                Matricular aluno
            </button>
            <button type="button" id="closeModal" class="mt-4 ml-2 bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">Cancelar</button>
        </form>
    </div>
</div>

<script>
    // Abrir a Modal
    document.getElementById('openModal').addEventListener('click', function() {
        document.getElementById('modal').classList.remove('hidden');
    });

    // Fechar a Modal
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('modal').classList.add('hidden');
    });

    // Fechar a Modal ao clicar fora dela
    document.getElementById('modal').addEventListener('click', function(e) {
        if (e.target === this) {
            document.getElementById('modal').classList.add('hidden');
        }
    });
</script>

@endsection
