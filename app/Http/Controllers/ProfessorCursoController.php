<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProfessorCurso;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class ProfessorCursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professor_curso = ProfessorCurso::paginate(25);
        Paginator::useBootstrap();
        return view('professor_curso.lista', compact('professor_curso'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professor_curso.formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $professor_curso = new ProfessorCurso();
        $professor_curso->fill($request->all());
        if ($professor_curso->save()) {
            $request->session()->flash('mensagem_sucesso', "ProfessorCurso cadastrado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Erro ao cadastrar ProfessorCurso!');
        }
        return Redirect::to('professor_curso/create');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $professor_curso = ProfessorCurso::findOrFail($id);
        return view('professor_curso.formulario', compact('professor_curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfessorCurso $professor_curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $professor_curso_id)
    {
        $professor_curso = ProfessorCurso::findOrFail($professor_curso_id);
        $professor_curso->fill($request->all());
        if ($professor_curso->save()) {
            $request->session()->flash('mensagem_sucesso', "ProfessorCurso alterado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('professor_curso/' . $professor_curso->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $professor_curso_id)
    {
        $professor_curso = ProfessorCurso::findOrFail($professor_curso_id);
        $lOk = true;
        if ($lOk) {
            $professor_curso->delete();
            $request->session()->flash(
                'mensagem_sucesso',
                'ProfessorCurso removido com sucesso'
            );
            return Redirect::to('professor_curso');
        }
    }
}
