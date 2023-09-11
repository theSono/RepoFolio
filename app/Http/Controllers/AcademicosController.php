<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Academico;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class AcademicosController extends Controller
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
        $academicos = Academico::paginate(25);
        Paginator::useBootstrap();
        return view('academicos.lista', compact('academicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('academicos.formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $academico = new Academico();
        $academico->fill($request->all());
        if ($academico->save()) {
            $request->session()->flash('mensagem_sucesso', "Acadêmico Cadastrado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Erro ao cadastrar Acadêmico!');
        }
        return Redirect::to('equipe/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Academico $id)
    {
        $academicos = Academico::findOrFail($id);
        return view('academico.formulario', compact('academicos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Academico $academico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academico $academico_id)
    {
        $academico = Academico::find($academico_id);
        $academico->fill($request->all());
        if ($academico->save()) {
            $request->session()->flash('mensagem_sucesso', "Academico alterado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('academicos/' . $academico->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academico $academico_id)
    {
        $academico = Academico::findOrFail($academico_id);
        $lOk = true;
        if ($lOk){
            $academico->delete();
            $academico->session()->flash('mensagem_sucesso',
                'Academico removido com sucesso');
            return Redirect::to('academicos');
        }
    }
}
