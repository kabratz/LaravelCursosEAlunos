@extends('layouts.app')

@section('content')


@if($aluno)

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div class="font-medium text-gray-700">Nome Completo:</div>
    <div class="text-gray-900">{{ $aluno->nome }}</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div class="font-medium text-gray-700">Data de nascimento:</div>
    <div class="text-gray-900">
        {{ \Carbon\Carbon::parse($aluno->data_nascimento)->format('d/m/Y') }}
        <span class="text-gray-500">
            ({{ \Carbon\Carbon::parse($aluno->data_nascimento)->age }} anos)
        </span>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div class="font-medium text-gray-700">Usuário:</div>
    <div class="text-gray-900">{{ $aluno->usuario }}</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    @if($aluno->turmas->isEmpty())
    <div class="font-medium text-gray-700"> Este aluno não está matriculado em nenhuma turma.</div>
    @else
    <div class="font-medium text-gray-700">Turmas matriculado:</div>
    <div class="text-gray-900">
        <ul>
            @foreach($aluno->turmas as $turma)
            <li>{{ $turma->nome }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>



<div class="mt-6">
    <button id="openModal" class="inline-block bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Matricular aluno</button>
    <a href="{{ route('alunos.edit', $aluno->id) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Editar</a>
</div>
@else
<p>Aluno não encontrado.</p>
@endif

<!-- Modal para Matricular -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-6 w-1/3">
        <h3 class="text-2xl font-semibold mb-4">Matricular aluno em uma turma</h3>
        <form action="{{ route('matriculas.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="turma_id" class="block text-sm font-medium text-gray-700">Escolha a Turma:</label>
                <select class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                    name="turma_id" id="turma_id" required
                    @if($turmas->isEmpty()) disabled @endif>
                    <option value="">Selecione uma Turma</option>
                    @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                    @endforeach
                </select>

                @if($turmas->isEmpty())
                <p class="text-red-500 mt-2">Não há turmas disponíveis para matriculação deste aluno no momento.</p>
                @endif

            </div>
            <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">

            <button type="submit" class="mt-4 w-full p-2 bg-blue-600 text-white rounded-md 
                        @if($turmas->isEmpty()) opacity-50 cursor-not-allowed @endif"
                @if($turmas->isEmpty()) disabled @endif>
                Matricular aluno
            </button>
            <button type="button" id="closeModal" class="mt-4 ml-2 bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">Cancelar</button>
        </form>
    </div>
</div>

</div>

<script>
    // Open Modal
    document.getElementById('openModal').addEventListener('click', function() {
        document.getElementById('modal').classList.remove('hidden');
    });

    // Close Modal
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('modal').classList.add('hidden');
    });
</script>

@endsection