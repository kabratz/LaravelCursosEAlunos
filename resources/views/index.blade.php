
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Gerenciar Cadastros</h1>

    <div class="row">
        <!-- Alunos -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Alunos</h5>
                    <p class="card-text">Gerencie a lista de alunos cadastrados.</p>
                    <a href="{{ route('alunos.index') }}" class="btn btn-primary">Ver Alunos</a>
                </div>
            </div>
        </div>

        <!-- Turmas -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Turmas</h5>
                    <p class="card-text">Visualize e gerencie as turmas disponíveis.</p>
                    <a href="{{ route('turmas.index') }}" class="btn btn-primary">Ver Turmas</a>
                </div>
            </div>
        </div>

        <!-- Matrículas -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Matricular Aluno</h5>
                    <p class="card-text">Adicione um aluno a uma turma.</p>
                    <a href="{{ route('matriculas.create') }}" class="btn btn-success">Matricular</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
