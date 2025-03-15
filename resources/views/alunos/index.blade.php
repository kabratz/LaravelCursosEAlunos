@extends('layouts.app')

@section('content')

<a href="{{ route('alunos.create') }}" class="btn btn-primary mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Criar novo aluno</a>

<form action="{{ route('alunos.index') }}" method="GET" class="mb-4 flex space-x-2">
    <input type="text" id="search" name="search" class="form-control p-2 border rounded w-full" placeholder="Buscar por nome" value="{{ request()->query('search') }}">

    @if (request()->query('search'))
    <button type="button" id="clear-search" class="btn btn-outline-secondary p-2 bg-gray-200 border border-gray-400 rounded" onclick="clearSearch()">
        <span class="text-xl">×</span>
    </button>
    @endif

    <button type="submit" class="btn btn-primary p-2 bg-blue-600 text-white rounded hover:bg-blue-700">Buscar</button>
</form>

@if($alunos->count())
<table class="table table-bordered w-full text-left">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-4 py-2">Nome</th>
            <th class="px-4 py-2">Usuário</th>
            <th class="px-4 py-2">Data de Nascimento</th>
            <th class="px-4 py-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alunos as $aluno)
        <tr>
            <td class="px-4 py-2">{{ $aluno->nome }}</td>
            <td class="px-4 py-2">{{ $aluno->usuario }}</td>
            <td class="px-4 py-2">{{ $aluno->data_nascimento->format('d/m/Y') }}</td>
            <td class="px-4 py-2">
                <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-info px-4 py-2 bg-teal-500 text-white rounded hover:bg-teal-600">Ver</a>
                <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-warning px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>
                <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" onclick="return confirm('Tem certeza que deseja excluir o aluno {{$aluno->nome}}?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p class="text-gray-600">Nenhum aluno encontrado.</p>
@endif


<div class="mt-4">
    {{ $alunos->links('pagination::tailwind') }}
</div>


<script>
    const searchInput = document.getElementById('search');

    function clearSearch() {
        searchInput.value = '';
        document.getElementById('search-form').submit();
    }
</script>
@endsection