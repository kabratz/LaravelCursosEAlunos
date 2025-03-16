<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        try {
            $aluno = Aluno::create($request->validated());
            return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
        } catch (\Exception $erro) {

            Log::error('Erro ao criar aluno', [
                'aluno_nome' => $request->nome,
                'aluno_usuario' => $request->usuario,
                'aluno_data_nascimento' => $request->data_nascimento,
                'erro' => $erro->getMessage(),
                'arquivo' => $erro->getFile(),
                'linha' => $erro->getLine(),
            ]);
            return redirect()->back()->with('error', 'Não foi possível criar aluno! Tente novamente mais tarde.');
        }
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

        try {

            $aluno->update($request->validated());
            return redirect()->route('alunos.index')->with('success', 'Cadastro de aluno salvo com sucesso!');
        } catch (\Exception $erro) {

            Log::error('Erro ao atualizar cadastro do aluno', [
                'aluno_id' => $aluno->id,
                'aluno_nome' => $request->nome,
                'aluno_usuario' => $request->usuario,
                'aluno_data_nascimento' => $request->data_nascimento,
                'erro' => $erro->getMessage(),
                'arquivo' => $erro->getFile(),
                'linha' => $erro->getLine(),
            ]);
            return redirect()->back()->with('error', 'Não foi possível atualizar cadastro do aluno! Tente novamente mais tarde.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        try {
            $aluno->delete();
            return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso!');;
        } catch (\Exception $erro) {

            Log::error('Erro ao excluir aluno', [
                'aluno_id' => $aluno->id,
                'erro' => $erro->getMessage(),
                'arquivo' => $erro->getFile(),
                'linha' => $erro->getLine(),
            ]);
            return redirect()->route('alunos.index')->with('error', 'Não foi possível excluir aluno! Tente novamente mais tarde.');;
        }
    }
}
