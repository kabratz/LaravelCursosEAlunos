<form action="{{ $action }}" method="POST">
    @csrf
    @isset($method)
    @method($method)
    @endisset

    <div class="mb-4">
        <label for="nome" class="block text-sm font-medium text-gray-700">Nome:</label>
        <input type="text" class="mt-1 p-2 border border-gray-300 rounded w-full" id="nome" name="nome" value="{{ old('nome', $aluno->nome ?? '') }}" min="3" required>
    </div>

    <div class="mb-4">
        <label for="usuario" class="block text-sm font-medium text-gray-700">Usuário:</label>
        <input type="text" class="mt-1 p-2 border border-gray-300 rounded w-full" id="usuario" name="usuario" value="{{ old('usuario', $aluno->usuario ?? '') }}" required>
    </div>

    <div class="mb-4">
        <label for="data_nascimento" class="block text-sm font-medium text-gray-700">Data de Nascimento:</label>
        <input type="date" class="mt-1 p-2 border border-gray-300 rounded w-full"
            id="data_nascimento"
            name="data_nascimento"
            value="{{ old('data_nascimento', isset($aluno->data_nascimento) ? \Carbon\Carbon::parse($aluno->data_nascimento)->format('Y-m-d') : '') }}"
            required
            max="{{ date('Y-m-d') }}">
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mt-4">Salvar</button>
</form>

<script>
    document.getElementById('nome').addEventListener('input', function() {
        var nome = this.value;
        var usuario = nome.trim().toLowerCase().replace(/\s+/g, '.');

        document.getElementById('usuario').value = usuario;
    });
</script>