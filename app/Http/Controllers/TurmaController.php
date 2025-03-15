<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTurmaRequest;
use App\Http\Requests\UpdateTurmaRequest;
use App\Models\Aluno;
use App\Models\Turma;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turmas = Turma::orderBy('nome')->paginate(5);
        $title="Lista de turmas";
        return view('turmas.index', compact('turmas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Criar de turmas";
        return view('turmas.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTurmaRequest $request)
    {
        Turma::create($request->validated());
        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Turma $turma)
    {
        $alunos = Aluno::orderBy('nome')->get();
        $turma->load('alunos');
        $title="Detalhes turma";
        return view('turmas.show', compact('turma', 'alunos', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turma $turma)
    {
        $title="Editar turma";
        return view('turmas.edit', compact('turma', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTurmaRequest $request, Turma $turma)
    {
        $turma->update($request->validated());
        return redirect()->route('turmas.index')->with('success', 'Turma atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turma $turma)
    {
        $turma->delete();
        return redirect()->route('turmas.index')->with('success', 'Turma excluída com sucesso!');
    }
}
