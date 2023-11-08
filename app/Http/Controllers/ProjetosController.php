<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ProjetosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listar(){
        $projetos = Projeto::paginate(25);
        Paginator::useBootstrap();

        return view('projeto.lista', compact('projetos'));
        //$projetos = Projeto::all();

        // return view('projeto', ['projetos' => $projetos]);
    }

    public function create(){
        return view('projeto.formulario');
    }

    public function store(Request $request){
        $this->validate($request, ['image.*', 'mimes:jpeg, jpg, gif, png']);
        $pasta = public_path('/uploads/projetos');
        if ($request ->hasFile('anexos')){
            $foto = $request->file('anexos');
            $miniatura = Image::make($foto->path());
            $nomeArquivo = $request->file('anexos')->getClientOriginalName();
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
            $nomeArquivo = 'semfoto.jpg';
        }

        $projeto = new Projeto();
        $projeto->fill($request->all());
        $projeto->anexos = $nomeArquivo;
        if ($projeto->save()){
            $request->session()->flash('mensagem_sucesso', "Projeto salvo!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('projeto/create');
    }

    public function update(Request $request, $projeto_id){
        $projeto = Projeto::findOrFail($projeto_id);
        $this->validate($request, ['image.*', 'mimes:jpeg, jpg, gif, png']);
        $pasta = public_path('/uploads/anexos');
        if ($request ->hasFile('anexos')){
            $foto = $request->file('anexos');
            $miniatura = Image::make($foto->path());
            $nomeArquivo = $request->file('anexos')->getClientOriginalName();
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
            $nomeArquivo = $projeto->anexos;
        }

        $projeto->fill($request->all());
        $projeto->anexos = $nomeArquivo;
        if ($projeto->save()){
            $request->session()->flash('mensagem_sucesso', "Projeto alterado!");
        } else {
            $request->session()->flash('mensagem_erro', 'Deu erro');
        }
        return Redirect::to('projeto/'.$projeto->id);
    }

    public function show($id){
        $projeto = Projeto::findOrFail($id);
        return view('projeto.formulario', compact('projeto'));
    }

    public function deletar(Request $request, $projeto_id){
        $projeto = Projeto::findOrFail($projeto_id);
        $lOk = true;
        if (!empty($projeto->anexos)){
            if($projeto->anexos != 'semfoto.jpg'){
                $lOk = unlink(public_path('uploads/anexos/').$projeto->anexos);
            }
        }
        if($lOk) {
        $projeto->delete();
        $request->session()->flash('mensagem_sucesso',
            'Projeto removido com sucesso');
        return Redirect::to('projeto');
        }
    }


    public function showReport(){
        $projetos = Projeto::get();
        $imagem = 'uploads/anexos/semfoto.jpg';
        $projeto = pathinfo($imagem, PATHINFO_EXTENSION);
        $data = file_get_contents($imagem);
        $base64 = base64_encode($imagem);
        $logo = base64_encode(file_get_contents(
            public_path('/uploads/anexos/semfoto.jpg')));
        $pdf = Pdf::loadView('reports.anexos', compact('anexos', 'logo'));

        $pdf->setPaper('a4', 'portrait')
            ->setOptions(['dpi'=>150, 'defaultFone' => 'sans-serif'])
            ->setEncryption('123');


            return $pdf
            //->download('relatorio.pdf');
            //->save(public_path('/arquivos/relatorio.pdf'));
            ->stream('relatorio.pdf');
    }
}

