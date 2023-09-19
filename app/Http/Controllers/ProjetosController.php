<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProjetosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projetos = Projeto::paginate(25);
        return view('projeto.lista', compact('projetos'));
    }

    public function create()
    {
        return view('projeto.formulario');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'anexos' => 'image|mimes:jpeg,jpg,gif,png',
        ]);

        if ($validator->fails()) {
            return redirect()->route('projeto.create')
                ->withErrors($validator)
                ->withInput();
        }

        $nomeArquivo = $this->uploadImagem($request);

        $projeto = new Projeto();
        $projeto->fill($request->all());
        $projeto->foto = $nomeArquivo;

        if ($projeto->save()) {
            Session::flash('mensagem_sucesso', "Projeto cadastrado com sucesso!");
        } else {
            Session::flash('mensagem_erro', 'Erro ao cadastrar Projeto!');
        }

        return redirect()->route('projeto.index');
    }

    public function show(Projeto $projeto)
    {
        return view('projeto.formulario', compact('projeto'));
    }

    public function edit(Projeto $projeto)
    {
        return view('projeto.editar', compact('projeto'));
    }

    public function update(Request $request, Projeto $projeto)
    {
        $validator = Validator::make($request->all(), [
            'anexos' => 'image|mimes:jpeg,jpg,gif,png',
        ]);

        if ($validator->fails()) {
            return redirect()->route('projeto.edit', $projeto->id)
                ->withErrors($validator)
                ->withInput();
        }

        $nomeArquivo = $this->uploadImagem($request, $projeto->foto);

        $projeto->fill($request->all());
        $projeto->foto = $nomeArquivo;

        if ($projeto->save()) {
            Session::flash('mensagem_sucesso', "Projeto atualizado com sucesso!");
        } else {
            Session::flash('mensagem_erro', 'Erro ao atualizar Projeto!');
        }

        return redirect()->route('projeto.show', $projeto->id);
    }

    public function destroy(Projeto $projeto)
    {
        $this->removerImagem($projeto->foto);
        
        if ($projeto->delete()) {
            Session::flash('mensagem_sucesso', 'Projeto removido com sucesso');
        } else {
            Session::flash('mensagem_erro', 'Erro ao remover Projeto');
        }

        return redirect()->route('projeto.index');
    }

    private function uploadImagem(Request $request, $imagemAtual = null)
    {
        $pasta = public_path('uploads/images/anexos');

        if ($request->hasFile('anexos')) {
            $foto = $request->file('anexos');
            $miniatura = Image::make($foto->path());
            $nomeArquivo = $foto->getClientOriginalName();

            if (!$miniatura->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($pasta . '/' . $nomeArquivo)) {
                $nomeArquivo = "semfoto.jpg";
            }

            // Remover a imagem atual, se houver
            if ($imagemAtual && $imagemAtual != 'semfoto.jpg') {
                $this->removerImagem($imagemAtual);
            }

            return $nomeArquivo;
        }
        return $imagemAtual;
    }

    private function removerImagem($imagem)
    {
        $caminhoFoto = public_path('uploads/images/anexos') . '/' . $imagem;

        if (file_exists($caminhoFoto)) {
            unlink($caminhoFoto);
        }
    }
}