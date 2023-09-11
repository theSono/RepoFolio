<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;


class EquipeController extends Controller
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
        $equipes = Equipe::paginate(25);
        Paginator::useBootstrap();

        return view('equipe.lista', compact('equipes'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipe.formulario');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['image.*', 'mimes:jpeg, jpg, gif, png']);
        $pasta = public_path('/uploads/images/equipe');
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $miniatura = Image::make($foto->path());
            $nomeArquivo = $request->file('foto')->getClientOriginalName();
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

        $equipe = new Equipe();
        $equipe->fill($request->all());
        $equipe->foto = $nomeArquivo;
        if ($equipe->save()) {
            $request->session()->flash('mensagem_sucesso', "Membro da equipe cadastrado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Erro ao cadastrar membro da equipe!');
        }
        return Redirect::to('equipe/create');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipe $id)
    {
        $equipes = Equipe::findOrFail($id);
        return view('equipe.formulario', compact('equipes'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipe $equipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipe $equipe_id)
    {
        $equipe = Equipe::find($equipe_id);
        $this->validate($request, ['image.*', 'mimes:jpeg, jpg, gif, png']);
        $pasta = public_path('/uploads/images/equipe');
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $miniatura = Image::make($foto->path());
            $nomeArquivo = $request->file('foto')->getClientOriginalName();
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
            $nomeArquivo = $equipe->foto;
        }
        $equipe->fill($request->all());
        $equipe->foto = $nomeArquivo;
        if ($equipe->save()) {
            $request->session()->flash('mensagem_sucesso', "Tipo alterado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('equipe/' . $equipe->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Equipe $equipe_id)
    {
        $equipe = Equipe::findOrFail($equipe_id);
        $lOk = true;
        if (!empty($equipe->foto)){
            if ($equipe->foto != 'semfoto.jpg'){
                $lOk = unlink(public_path('uploads/equipe/').$equipe->foto);
            }
        }
        if ($lOk){
            $equipe->delete();
            $request->session()->flash('mensagem_sucesso',
                'Membro da equipe removido com sucesso');
            return Redirect::to('equipe');
        }
    }
}
