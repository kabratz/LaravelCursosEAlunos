<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatriculaRequest;
use App\Models\Aluno;
use App\Models\Matricula;
use App\Models\Turma;
use Illuminate\Support\Facades\Log;

class MatriculaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matriculas = Matricula::with('turma')->with('aluno')->orderBy('turma_id')->paginate(5);
        $title = 'Lista de matrículas';
        return view('matriculas.index', compact('matriculas', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $turmas = Turma::orderBy('nome')->get();
        $alunos = Aluno::orderBy('nome')->get();
        $title = 'Matricular aluno';
        return view('matriculas.create', compact('turmas', 'alunos', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatriculaRequest $request)
    {
        try {
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

            return redirect()->back()
                ->with('success', 'Aluno matriculado com sucesso!');
        } catch (\Exception $erro) {
            Log::error('Erro ao registrar matrícula', [
                'turma_id' => $request->turma_id,
                'aluno_id' => $request->aluno_id,
                'erro' => $erro->getMessage(),
                'arquivo' => $erro->getFile(),
                'linha' => $erro->getLine(),
            ]);
            return redirect()->back()->with('error', 'Não foi possível registrar matrícula! Tente novamente mais tarde.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matricula $matricula)
    {
        try {
            $matricula->delete();
            return redirect()->back()->with('success', 'Matrícula excluída com sucesso!');
        } catch (\Exception $erro) {
            Log::error('Erro ao excluir matrícula', [
                'matricula_id' => $matricula->id,
                'erro' => $erro->getMessage(),
                'arquivo' => $erro->getFile(),
                'linha' => $erro->getLine(),
            ]);

            return redirect()->back()->with('error', 'Não foi possível excluir matrícula! Tente novamente mais tarde.');
        }
    }
}
