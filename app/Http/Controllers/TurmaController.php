<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTurmaRequest;
use App\Http\Requests\UpdateTurmaRequest;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Support\Facades\Log;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turmas = Turma::orderBy('nome')->paginate(5);
        $title = "Lista de turmas";
        return view('turmas.index', compact('turmas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Criar de turmas";
        return view('turmas.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTurmaRequest $request)
    {

        try {

            Turma::create($request->validated());
            return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso!');
        } catch (\Exception $erro) {
            Log::error('Erro ao criar turma', [
                'turma_nome' => $request->nome,
                'turma_descricao' => $request->descricao,
                'turma_tipo' => $request->tipo,
                'erro' => $erro->getMessage(),
                'arquivo' => $erro->getFile(),
                'linha' => $erro->getLine(),
            ]);
            return redirect()->back()->with('error', 'Não foi possível criar turma! Tente novamente mais tarde.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Turma $turma)
    {
        $alunos = Aluno::orderBy('nome')->get();
        $turma->load('matriculas.aluno');
        $title = "Detalhes turma";
        // dd($turma);
        return view('turmas.show', compact('turma', 'alunos', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turma $turma)
    {
        $title = "Editar turma";
        return view('turmas.edit', compact('turma', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTurmaRequest $request, Turma $turma)
    {
        try {

            $turma->update($request->validated());
            return redirect()->route('turmas.index')->with('success', 'Turma atualizada com sucesso!');
        } catch (\Exception $erro) {
            Log::error('Erro ao atualizar registro de turma', [
                'turma_nome' => $request->nome,
                'turma_descricao' => $request->descricao,
                'turma_tipo' => $request->tipo,
                'erro' => $erro->getMessage(),
                'arquivo' => $erro->getFile(),
                'linha' => $erro->getLine(),
            ]);
            return redirect()->back()->with('error', 'Não foi possível atualizar turma! Tente novamente mais tarde.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turma $turma)
    {
        try {
            $turma->delete();
            return redirect()->route('turmas.index')->with('success', 'Turma excluída com sucesso!');
        } catch (\Exception $erro) {
            Log::error('Erro ao excluir turma', [
                'turma_id' => $turma->id,
                'erro' => $erro->getMessage(),
                'arquivo' => $erro->getFile(),
                'linha' => $erro->getLine(),
            ]);
            return redirect()->back()->with('error', 'Não foi possível excluir turma! Tente novamente mais tarde.');
        }
    }
}
