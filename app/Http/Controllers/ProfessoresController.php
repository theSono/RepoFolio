<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Professor;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class ProfessoresController extends Controller
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
        $professores = Professor::paginate(25);
        Paginator::useBootstrap();
        return view('professores.lista', compact('professores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professores.formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $professor = new Professor();
        $professor->fill($request->all());
        if ($professor->save()) {
            $request->session()->flash('mensagem_sucesso', "Membro da equipe cadastrado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Erro ao cadastrar membro da equipe!');
        }
        return Redirect::to('equipe/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Professor $id)
    {
        $professores = Professor::findOrFail($id);
        return view('professor.formulario', compact('professores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professor $professor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Professor $curso_id)
    {
        $professor = Professor::find($curso_id);
        $professor->fill($request->all());
        if ($professor->save()) {
            $request->session()->flash('mensagem_sucesso', "Professor alterado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('professores/' . $professor->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professor $curso_id)
    {
        $professor = Professor::findOrFail($curso_id);
        $lOk = true;
        if ($lOk){
            $professor->delete();
            $professor->session()->flash('mensagem_sucesso',
                'Professor removido com sucesso');
            return Redirect::to('professores');
        }
    }
}
