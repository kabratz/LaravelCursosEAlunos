@extends('layouts.app')

@section('content')
<a href="{{ route('matriculas.create') }}" class="btn bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mb-4 inline-block">Fazer nova matrícula</a>

@if($matriculas->count())
<table class="min-w-full bg-white shadow-md rounded-lg">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-4 py-2 border-b text-left w-1/3">Turma</th>
            <th class="px-4 py-2 border-b text-left w-1/3">Aluno</th>
            <th class="px-4 py-2 border-b text-left w-1/3">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($matriculas as $matricula)
        <tr>
            <td class="px-4 py-2 border-b w-1/3">{{ $matricula->turma->nome }}</td>
            <td class="px-4 py-2 border-b w-1/3">{{ $matricula->aluno->nome }}</td>
            <td class="px-4 py-2 border-b w-1/3">
                <form action="{{ route('matriculas.destroy', $matricula->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja desmatricular {{$matricula->aluno->nome }} da turma {{$matricula->turma->nome}}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">Desmatricular</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p class="mt-4 text-gray-600">Nenhuma matrícula encontrada.</p>
@endif

<div class="mt-4">
    {{ $matriculas->links('pagination::tailwind') }}
</div>
@endsection