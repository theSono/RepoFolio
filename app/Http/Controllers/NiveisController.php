<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Nivel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class NiveisController extends Controller
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
        $niveis = Nivel::paginate(25);
        Paginator::useBootstrap();
        return view('niveis.lista', compact('niveis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('niveis.formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nivel = new Nivel();
        $nivel->fill($request->all());
        if ($nivel->save()) {
            $request->session()->flash('mensagem_sucesso', "Membro da equipe cadastrado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Erro ao cadastrar membro da equipe!');
        }
        return Redirect::to('equipe/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nivel $id)
    {
        $niveis = Nivel::findOrFail($id);
        return view('nivel.formulario', compact('niveis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nivel $nivel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nivel $curso_id)
    {
        $nivel = Nivel::find($curso_id);
        $nivel->fill($request->all());
        if ($nivel->save()) {
            $request->session()->flash('mensagem_sucesso', "Nivel alterado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('niveis/' . $nivel->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nivel $curso_id)
    {
        $nivel = Nivel::findOrFail($curso_id);
        $lOk = true;
        if ($lOk){
            $nivel->delete();
            $nivel->session()->flash('mensagem_sucesso',
                'Nivel removido com sucesso');
            return Redirect::to('niveis');
        }
    }
}
