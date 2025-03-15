@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Matricular Aluno em uma Turma</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

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

        <div class="form-group">
            <label for="turma_id">Escolha a Turma:</label>
            <select class="form-control" name="turma_id" id="turma_id" required>
                <option value="">Selecione uma Turma</option>
                @foreach($turmas as $turma)
                <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Matricular Aluno</button>
    </form>
</div>

@endsection