<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;


class CursosController extends Controller
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
        $cursos = Curso::paginate(25);
        Paginator::useBootstrap();
        return view('cursos.lista', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $academico = new Curso();
        $academico->fill($request->all());
        if ($academico->save()) {
            $request->session()->flash('mensagem_sucesso', "Membro da equipe cadastrado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Erro ao cadastrar membro da equipe!');
        }
        return Redirect::to('equipe/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $id)
    {
        $cursos = Curso::findOrFail($id);
        return view('academico.formulario', compact('cursos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $academico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso_id)
    {
        $academico = Curso::find($curso_id);
        $academico->fill($request->all());
        if ($academico->save()) {
            $request->session()->flash('mensagem_sucesso', "Curso alterado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('cursos/' . $academico->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso_id)
    {
        $academico = Curso::findOrFail($curso_id);
        $lOk = true;
        if ($lOk){
            $academico->delete();
            $academico->session()->flash('mensagem_sucesso',
                'Curso removido com sucesso');
            return Redirect::to('cursos');
        }
    }
}
