@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listagem de Turmas</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('turmas.create') }}" class="btn btn-primary mb-3">Nova Turma</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($turmas as $turma)
            <tr>
                <td>{{ $turma->nome }}</td>
                <td>{{ $turma->descricao ?? 'Não Informado' }}</td>
                <td>{{ $turma->tipo }}</td>
                <td>
                    <a href="{{ route('turmas.show', $turma->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir a turma {{$turma->nome}}?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $turmas->links() }}
    </div>
</div>
@endsection