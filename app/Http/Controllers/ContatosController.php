<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContatosController extends Controller
{
    public function index() {
        return view('public_view.contato');
    }

    public function enviar(Request $request){
        $dest_nome = "Pablo";
        $dest_email = "pablosadisiebre@gmail.com";
        $dados = array('nome'=>$request['nome'],
                        'email'=>$request['email'],
                        'fone'=>$request['fone'],
                        'mensagem'=>$request['mensagem']);

        Mail::Send('email.contato', $dados,
            function($mensagem) use($dest_nome, $dest_email, $request){
            $mensagem->to($dest_email, $dest_nome)
            ->subject('E-mail do site Famper!')
            ->bcc(['pablosadisiebre@gmail.com', 'pablosadisiebre@gmail.com']);
            $mensagem->from($request['email'], $request['nome']);
    }

    );

    return Redirect::to('contatos')
    ->with('mensagem_sucesso', 'E-mail enviado com sucesso');

        }
}
