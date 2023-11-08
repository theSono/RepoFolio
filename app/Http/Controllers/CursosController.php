<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class CursosController extends Controller
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
        $curso = new Curso();
        $curso->fill($request->all());
        if ($curso->save()) {
            $request->session()->flash('mensagem_sucesso', "Curso cadastrado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Erro ao cadastrar Curso!');
        }
        return Redirect::to('cursos/create');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cursos = Curso::findOrFail($id);
        return view('cursos.formulario', compact('cursos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $curso_id)
    {
        $curso = Curso::findOrFail($curso_id);
        $curso->fill($request->all());
        if ($curso->save()) {
            $request->session()->flash('mensagem_sucesso', "Curso alterado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('cursos/' . $curso->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $curso_id)
    {
        $curso = Curso::findOrFail($curso_id);
        $lOk = true;
        if ($lOk) {
            $curso->delete();
            $request->session()->flash(
                'mensagem_sucesso',
                'Curso removido com sucesso'
            );
            return Redirect::to('cursos');
        }
    }
}
