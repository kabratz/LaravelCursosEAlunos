<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatriculaRequest;
use App\Http\Requests\UpdateMatriculaRequest;
use App\Models\Aluno;
use App\Models\Matricula;
use App\Models\Turma;

class MatriculaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculas = Matricula::with('turma')->with('aluno')->orderBy('turma_id')->paginate(5);
        // dd($matriculas);
        return view('matriculas.index', compact('matriculas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $turmas = Turma::orderBy('nome')->get();
        $alunos = Aluno::orderBy('nome')->get();
        return view('matriculas.create', compact('turmas', 'alunos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatriculaRequest $request)
    {
        $existeMatricula = Matricula::where('aluno_id', $request->aluno_id)
            ->where('turma_id', $request->turma_id)
            ->exists();

        if ($existeMatricula) {
            return redirect()->back()->with('error', 'Este aluno já está matriculado nesta turma.');
        }

        $matricula = Matricula::create([
            'aluno_id' => $request->aluno_id,
            'turma_id' => $request->turma_id,
        ]);

        return redirect()->route('matriculas.index')
            ->with('success', 'Aluno matriculado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matricula $matricula)
    {
        $matricula->delete();
        return redirect()->route('matriculas.index')->with('success', 'Matrícula excluída com sucesso!');
    }
}
