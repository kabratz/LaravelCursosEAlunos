@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Aluno</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    

    @if($aluno)
    <div class="card">
        <div class="card-header">
            <h4>Informações do Aluno</h4>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3">
                    <strong>Nome Completo:</strong>
                </div>
                <div class="col-md-9">
                    {{ $aluno->nome }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <strong>Data de Nascimento:</strong>
                </div>
                <div class="col-md-9">
                    {{ \Carbon\Carbon::parse($aluno->data_nascimento)->format('d/m/Y') }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <strong>Usuário:</strong>
                </div>
                <div class="col-md-9">
                    {{ $aluno->usuario }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <strong>Turmas:</strong>
                </div>
                <div class="col-md-9">
                    @if($aluno->turmas->isEmpty())
                    <p>Este aluno não está matriculado em nenhuma turma.</p>
                    @else
                    <ul>
                        @foreach($aluno->turmas as $turma)
                        <li>{{ $turma->nome }}</li> <!-- Altere para o nome real da turma -->
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-warning">Editar</a>
            </div>
        </div>
    </div>
    @else
    <p>Aluno não encontrado.</p>
    @endif

     <!-- Formulário para matricular um aluno -->
     <h3>Matricular Aluno em uma Turma</h3>
    <form action="{{ route('matriculas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="turma_id">Escolha a Turma:</label>
            <select class="form-control" name="turma_id" id="turma_id" required>
                <option value="">Selecione uma Turma</option>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                @endforeach
            </select>
        </div>

        <input type="hidden" name="aluno_id" value="{{ $aluno->id }}">

        <button type="submit" class="btn btn-primary">Matricular Aluno</button>
    </form>

</div>
@endsection