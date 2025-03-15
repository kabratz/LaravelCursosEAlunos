@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Nova Turma</h1>
    
    <!-- Exibição de erros de validação -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('turmas.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" min="3" required>
        </div>
        
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ old('descricao') }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select class="form-control" id="tipo" name="tipo" required>
                <option value="presencial" {{ old('tipo') == 'presencial' ? 'selected' : '' }}>Presencial</option>
                <option value="online" {{ old('tipo') == 'online' ? 'selected' : '' }}>Online</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Criar Turma</button>
    </form>
</div>
@endsection
