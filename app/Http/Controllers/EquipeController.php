<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class EquipeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $equipes = Equipe::paginate(25);
        return view('equipe.lista', compact('equipes'));
        //$equipes = Equipe::all();

        // return view('equipe', ['equipes' => $equipes]);
    }

    public function create(){
        return view('equipe.formulario');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['image.*', 'mimes:jpeg, jpg, gif, png']);
        $pasta = public_path('/uploads/equipe');
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

    public function update(Request $request, $projeto_id){
        $equipe = Equipe::findOrFail($projeto_id);
        $this->validate($request, ['image.*', 'mimes:jpeg, jpg, gif, png']);
        $pasta = public_path('/uploads/equipe');
        if ($request ->hasFile('foto')){
            $foto = $request->file('foto');
            $miniatura = Image::make($foto->path());
            $nomeArquivo = $request->file('foto')->getClientOriginalName();
            if(!$miniatura->resize(500,
                                500,
                                function($constraint){
                                    $constraint->aspectRatio();
                                }
                                )

            ->save($pasta.'/'.$nomeArquivo)){
                $nomeArquivo = 'semfoto.jpg';
            }
        } else {
            $nomeArquivo = $equipe->foto;
        }

        $equipe->fill($request->all());
        $equipe->foto = $nomeArquivo;
        if ($equipe->save()){
            $request->session()->flash('mensagem_sucesso', "Equipe alterado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('equipe/'.$equipe->id);
    }

    public function show($id){
        $equipe = Equipe::findOrFail($id);
        return view('equipe.formulario', compact('equipe'));
    }

    public function destroy(Request $request, $projeto_id){
        $equipe = Equipe::findOrFail($projeto_id);
        $lOk = true;
        if (!empty($equipe->foto)){
            if($equipe->foto != 'semfoto.jpg'){
                $lOk = unlink(public_path('uploads/equipe/').$equipe->foto);
            }
        }
        if($lOk) {
        $equipe->delete();
        $request->session()->flash('mensagem_sucesso',
            'Equipe removido com sucesso');
        return Redirect::to('equipe');
        }
    }


    public function showReport(){
        $equipes = Equipe::get();
        $imagem = 'uploads/equipe/semfoto.jpg';
        $equipe = pathinfo($imagem, PATHINFO_EXTENSION);
        $data = file_get_contents($imagem);
        $base64 = base64_encode($imagem);
        $logo = base64_encode(file_get_contents(
            public_path('/uploads/equipe/semfoto.jpg')));
        $pdf = Pdf::loadView('reports.foto', compact('fotos', 'logo'));

        $pdf->setPaper('a4', 'portrait')
            ->setOptions(['dpi'=>150, 'defaultFone' => 'sans-serif'])
            ->setEncryption('123');


            return $pdf
            //->download('relatorio.pdf');
            //->save(public_path('/arquivos/relatorio.pdf'));
            ->stream('relatorio.pdf');
    }
}

