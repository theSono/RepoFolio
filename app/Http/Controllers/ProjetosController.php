<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;


class ProjetosController extends Controller

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
        $projetos = Projeto::paginate(25);
        Paginator::useBootstrap();

        return view('projeto.lista', compact('projetos'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projeto.formulario');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['image.*', 'mimes:jpeg, jpg, gif, png']);
        $pasta = public_path('uploads/images/anexos');
        if ($request->hasFile('anexos')) {
            $foto = $request->file('anexos');
            $miniatura = Image::make($foto->path());
            $nomeArquivo = $request->file('anexos')->getClientOriginalName();
            if (!$miniatura->resize(
                500,
                500,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )
                ->save($pasta . '/' . $nomeArquivo)) {
                $nomeArquivo = "semfoto.jpg";
            }
        } else {
            $nomeArquivo = 'semfoto.jpg';
        }

        $projeto = new Projeto();
        $projeto->fill($request->all());
        $projeto->foto = $nomeArquivo;
        if ($projeto->save()) {
            $request->session()->flash('mensagem_sucesso', "Membro da projeto cadastrado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Erro ao cadastrar membro da projeto!');
        }
        return Redirect::to('projeto/create');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Projeto $id)
    {
        $projetos = Projeto::findOrFail($id);
        return view('projeto.formulario', compact('projetos'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projeto $projeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projeto $projeto_id)
    {
        $projeto = Projeto::find($projeto_id);
        $this->validate($request, ['image.*', 'mimes:jpeg, jpg, gif, png']);
        $pasta = public_path('uploads/images/anexos');
        if ($request->hasFile('anexos')) {
            $foto = $request->file('anexos');
            $miniatura = Image::make($foto->path());
            $nomeArquivo = $request->file('anexos')->getClientOriginalName();
            if (!$miniatura->resize(
                500,
                500,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )
                ->save($pasta . '/' . $nomeArquivo)) {
                $nomeArquivo = "semfoto.jpg";
            }
        } else {
            $nomeArquivo = $projeto->foto;
        }
        $projeto->fill($request->all());
        $projeto->foto = $nomeArquivo;
        if ($projeto->save()) {
            $request->session()->flash('mensagem_sucesso', "Tipo alterado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('projeto/' . $projeto->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Projeto $projeto_id)
    {
        $projeto = Projeto::findOrFail($projeto_id);
        $lOk = true;
        if (!empty($projeto->foto)){
            if ($projeto->foto != 'semfoto.jpg'){
                $lOk = unlink(public_path('uploads/images/anexos').$projeto->foto);
            }
        }
        if ($lOk){
            $projeto->delete();
            $request->session()->flash('mensagem_sucesso',
                'Membro da projeto removido com sucesso');
            return Redirect::to('projeto');
        }
    }
}
