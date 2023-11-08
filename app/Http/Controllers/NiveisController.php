<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Nivel;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class NiveisController extends Controller
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
            $request->session()->flash('mensagem_sucesso', "Nivel cadastrado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Erro ao cadastrar Nivel!');
        }
        return Redirect::to('niveis/create');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $niveis = Nivel::findOrFail($id);
        return view('niveis.formulario', compact('niveis'));
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
    public function update(Request $request, $nivel_id)
    {
        $nivel = Nivel::findOrFail($nivel_id);
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
    public function destroy(Request $request, $nivel_id)
    {
        $nivel = Nivel::findOrFail($nivel_id);
        $lOk = true;
        if ($lOk) {
            $nivel->delete();
            $request->session()->flash(
                'mensagem_sucesso',
                'Nivel removido com sucesso'
            );
            return Redirect::to('niveis');
        }
    }
}
