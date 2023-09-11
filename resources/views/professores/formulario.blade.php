@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados do Professor
                        <a href="{{ url('professores') }}" class="btn btn-success btn-sm float-end">
                            Listar Professores
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

                        @if (Route::is('professores.show'))
                            {!! Form::model($professores, [
                                'method' => 'PATCH',
                                'files' => 'True',
                                'url' => 'professores/' . $professores->id,
                            ]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'files' => 'True', 'url' => 'professores']) !!}
                        @endif
                        {!! Form::label('nome', 'Nome do Professor') !!}
                        {!! Form::input('text', 'nome', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Nome do Professor',
                            'required',
                            'maxlength' => 150,
                            'autofocus',
                        ]) !!}


                        {!! Form::label('email', 'E-mail') !!}
                        {!! Form::input('text', 'email', null, [
                            'class' => 'form-control',
                            'placeholder' => 'E-mail',
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
