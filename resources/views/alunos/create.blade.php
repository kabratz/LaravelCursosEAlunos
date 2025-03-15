@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Criar Novo Aluno</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" min="3" required>
            @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="usuario">Usuário:</label>
            <input type="text" class="form-control" id="usuario" name="usuario" value="{{ old('usuario') }}" required>
            @error('usuario')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}" required max="{{ date('Y-m-d') }}">
            @error('data_nascimento')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

<script>
    document.getElementById('nome').addEventListener('input', function() {
        var nome = this.value;
        var usuario = nome.trim().toLowerCase().replace(/\s+/g, '.');

        document.getElementById('usuario').value = usuario;
    });
</script>
@endsection