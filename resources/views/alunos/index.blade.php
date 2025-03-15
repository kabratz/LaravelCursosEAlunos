@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Alunos</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{ route('alunos.create') }}" class="btn btn-primary">Adicionar Novo Aluno</a>


    <form action="{{ route('alunos.index') }}" id="search-form"method="GET" class="mb-4" style="display: flex;">
        <input type="text" id="search" name="search" class="form-control" placeholder="Buscar por nome" value="{{ request()->query('search') }}">
        @if (request()->query('search'))
        <button type="button" id="clear-search" class="btn btn-outline-secondary" onclick="clearSearch()">
            x
        </button>
        @endif
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>
    @if($alunos->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Usuário</th>
                <th>Data de Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
            <tr>turmas
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->usuario }}</td>
                <td>{{ $aluno->data_nascimento->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir o aluno {{$aluno->nome}}?')">Excluir</button>
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
        {{ $alunos->links() }}
    </div>
</div>
<style>
    #clear-search {
        border: none;
        background: none;
        color: #aaa;
        font-size: 18px;
        cursor: pointer;
    }

    #clear-search:hover {
        color: #333;
    }
</style>

<script>
    const searchInput = document.getElementById('search');

    // Função para limpar a busca
    function clearSearch() {
        searchInput.value = ''; // Limpa o campo de busca
        document.getElementById('search-form').submit(); // Submete o formulário novamente para limpar a busca
    }
</script>
@endsection