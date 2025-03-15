@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Turma: {{ $turma->nome }}</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('turmas.update', $turma->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $turma->nome) }}" min="3" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ old('descricao', $turma->descricao) }}</textarea>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select class="form-control" id="tipo" name="tipo" required>
                <option value="presencial" {{ old('tipo', $turma->tipo) == 'presencial' ? 'selected' : '' }}>Presencial</option>
                <option value="online" {{ old('tipo', $turma->tipo) == 'online' ? 'selected' : '' }}>Online</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Atualizar Turma</button>
    </form>
</div>
@endsection