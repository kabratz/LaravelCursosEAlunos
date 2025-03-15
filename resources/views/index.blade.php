<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciar Cadastros') }}
        </h2>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Gerenciar Cadastros</h1>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                        <h5 class="text-xl font-semibold text-gray-800 mb-4">Alunos</h5>
                        <p class="text-gray-600 mb-4">Gerencie a lista de alunos cadastrados.</p>
                        <a href="{{ route('alunos.index') }}"
                            class="inline-block px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Ver alunos
                        </a>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                        <h5 class="text-xl font-semibold text-gray-800 mb-4">Turmas</h5>
                        <p class="text-gray-600 mb-4">Visualize e gerencie as turmas disponíveis.</p>
                        <a href="{{ route('turmas.index') }}"
                            class="inline-block px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Ver Turmas
                        </a>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                        <h5 class="text-xl font-semibold text-gray-800 mb-4">Matricular aluno</h5>
                        <p class="text-gray-600 mb-4">Adicione um aluno a uma turma.</p>
                        <a href="{{ route('matriculas.create') }}"
                            class="inline-block px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Matricular
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>