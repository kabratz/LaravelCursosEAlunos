@extends('layouts.app')

@section('content')
<a href="{{ route('turmas.create') }}" class="btn bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mb-4 inline-block">Nova Turma</a>

<table class="min-w-full bg-white shadow-md rounded-lg">
    <thead class="bg-gray-100">
        <tr>
            <th class="px-4 py-2 border-b w-1/4">Nome</th>
            <th class="px-4 py-2 border-b w-1/3">Descrição</th>
            <th class="px-4 py-2 border-b w-1/6">Tipo</th>
            <th class="px-4 py-2 border-b w-1/4">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turmas as $turma)
        <tr>
            <td class="px-4 py-2 border-b w-1/4">{{ $turma->nome }}</td>
            <td class="px-4 py-2 border-b w-1/3">
                {{ \Illuminate\Support\Str::limit($turma->descricao ?? 'Não Informado', 30, '...') }}
            </td>
            <td class="px-4 py-2 border-b w-1/6">{{ $turma->tipo }}</td>
            <td class="px-4 py-2 border-b w-1/4">
                <a href="{{ route('turmas.show', $turma->id) }}" class="btn bg-teal-500 hover:bg-teal-600 text-white py-1 px-3 rounded mr-2">Ver</a>
                <a href="{{ route('turmas.edit', $turma->id) }}" class="btn bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded mr-2">Editar</a>
                <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir a turma {{$turma->nome}}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded mr-2">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $turmas->links('pagination::tailwind') }}
</div>
@endsection