@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados do Projeto
                        <a href="{{ url('projetos') }}" class="btn btn-success btn-sm float-end">
                            Listar Projetos
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

                        @if (Route::is('projetos.show'))
                            {!! Form::model($projetos, [
                                'method' => 'PATCH',
                                'files' => 'True',
                                'url' => 'projetos/' . $projetos->id,
                            ]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'files' => 'True', 'url' => 'projetos']) !!}
                        @endif
                        {!! Form::label('curso', 'Curso do Projeto') !!}
                        {!! Form::input('text', 'curso', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Curso do Projeto',
                            'required',
                            'maxlength' => 150,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('descricao', 'Descrição') !!}
                        {!! Form::input('text', 'descricao', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Descreva o Projeto',
                            'required',
                            'maxlength' => 250,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('objetivo', 'Objetivo') !!}
                        {!! Form::input('text', 'objetivo', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Objetivo do Projeto',
                            'required',
                            'maxlength' => 70,
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
