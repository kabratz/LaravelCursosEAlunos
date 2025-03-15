<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $alunos = Aluno::when($search, function ($query, $search) {
            return $query->where('nome', 'like', "%{$search}%");
        })->orderBy('nome')->paginate(5);

        $title = 'Lista de alunos';
        return view('alunos.index', compact('alunos', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Criar novo aluno';
        return view('alunos.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlunoRequest $request)
    {
        $aluno = Aluno::create($request->validated());
        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        $turmas = Turma::whereNotIn('id', $aluno->turmas->pluck('id'))->orderBy('nome')->get();
        $aluno->load('turmas');
        $title = 'Detahes aluno';
        return view('alunos.show', compact('aluno', 'turmas', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        $title = 'Editar aluno';
        return view('alunos.edit', compact('aluno', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlunoRequest $request, Aluno $aluno)
    {
        $aluno->update($request->validated());
        return redirect()->route('alunos.index')->with('success', 'Cadastro de aluno salvo com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso!');;
    }
}
