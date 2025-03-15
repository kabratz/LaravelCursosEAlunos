@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Turma: {{ $turma->nome }}</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="form-group">
        <strong>Descrição:</strong>
        <p>{{ $turma->descricao ?? 'Não Informada' }}</p>
    </div>

    <div class="form-group">
        <strong>Tipo:</strong>
        <p>{{ $turma->tipo }}</p>
    </div>

    <div class="form-group">
        <strong>Alunos:</strong>
        @if($turma->alunos->count() > 0)
        <ul>
            @foreach($turma->alunos as $aluno)
            <li>{{ $aluno->nome }}</li>
            @endforeach
        </ul>
        @else
        <p>Não há alunos matriculados nesta turma.</p>
        @endif
    </div>

    <!-- Formulário para matricular um aluno -->
    <h3>Matricular Aluno</h3>
    <form action="{{ route('matriculas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="aluno_id">Escolha o Aluno:</label>
            <select class="form-control" name="aluno_id" id="aluno_id" required>
                <option value="">Selecione um Aluno</option>
                @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="turma_id" value="{{ $turma->id }}">

        <button type="submit" class="btn btn-primary">Matricular Aluno</button>
    </form>

    <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection