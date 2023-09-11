<?php

namespace App\Http\Controllers;

use App\Models\UsuarioNivel;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Nivel;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfessorCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarioNivel = UsuarioNivel::paginate(25);
        Paginator::useBootstrap();
        return view('usuarionivel.lista', compact('usuarionivel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('nome', 'id')->pluck('nome', 'id');
        $niveis = Nivel::select('nome_curso', 'id')->pluck('nome_curso', 'id');
        return view('professorcurso.formulario', compact('professores', 'cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $professorCurso = new ProfessorCurso();
        $professorCurso->fill($request->all());
        if ($professorCurso->save()) {
            $request->session()->flash('mensagem_sucesso', "Associação entre professor e curso cadastrada!");
        } else {
            $request->session()->flash('mensagem_erro', 'Erro ao cadastrar associação entre professor e curso!');
        }
        return Redirect::to('professorcursos/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfessorCurso $professorCurso)
    {
        $professorCurso = ProfessorCurso::findOrFail($professorCurso->id);
        $professores = Professor::select('nome', 'id')->pluck('nome', 'id');
        $cursos = Curso::select('nome_curso', 'id')->pluck('nome_curso', 'id');
        return view(
            'reserva.formulario',
            compact('professores', 'cursos')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfessorCurso $professorCurso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfessorCurso $professorCurso_id)
    {
        $professorCurso = ProfessorCurso::find($professorCurso_id);
        $professorCurso->fill($request->all());
        if ($professorCurso->save()) {
            $request->session()->flash('mensagem_sucesso', "Associação entre professor e curso alterada!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('professorcursos/' . $professorCurso->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfessorCurso $professorCurso_id)
    {
        $professorCurso = ProfessorCurso::findOrFail($professorCurso_id);
        $lOk = true;
        if ($lOk) {
            $professorCurso->delete();
            $professorCurso->session()->flash('mensagem_sucesso',
                'Associação entre professor e curso removida com sucesso');
            return Redirect::to('professorcursos');
        }
    }
}
