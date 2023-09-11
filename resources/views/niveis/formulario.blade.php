@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados do Nivel
                        <a href="{{ url('niveis') }}" class="btn btn-success btn-sm float-end">
                            Listar Niveis
                        </a>
                    </div>
                    <div class="card-body">
                        @if (Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif
                        @if (Session::has('mensagem_erro'))
                            <div class="alert alert-danger">
                                {{ Session::get('mensagem_erro') }}
                            </div>
                        @endif

                        @if (Route::is('niveis.show'))
                            {!! Form::model($niveis, [
                                'method' => 'PATCH',
                                'files' => 'True',
                                'url' => 'niveis/' . $niveis->id,
                            ]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'files' => 'True', 'url' => 'niveis']) !!}
                        @endif
                        {!! Form::label('nome', 'Nome do Nivel') !!}
                        {!! Form::input('text', 'nome', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Nome do Nivel',
                            'required',
                            'maxlength' => 150,
                            'autofocus',
                        ]) !!}

                        {!! Form::submit('Salvar', ['class' => 'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
