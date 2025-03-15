@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Matrículas</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('matriculas.create') }}" class="btn btn-primary">Fazer nova matrícula</a>
    @if($matriculas->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Turma</th>
                <th>Aluno</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matriculas as $matricula)
            <tr>
                <td>{{ $matricula->turma->nome }}</td>
                <td>{{ $matricula->aluno->nome }}</td>
                <td>
                    <form action="{{ route('matriculas.destroy', $matricula->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja desmatricular {{$matricula->aluno->nome }} da turma {{$matricula->turma->nome}}?')">Desmatricular</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Nenhum aluno encontrado.</p>
    @endif


    <div class="d-flex justify-content-center">
        {{ $matriculas->links() }}
    </div>
</div>
@endsection
