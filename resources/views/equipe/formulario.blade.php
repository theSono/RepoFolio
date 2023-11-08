@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados do Membro
                        <a href="{{ url('equipe') }}" class="btn btn-success btn-sm float-end">
                            Listar Membros da Equipe
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

                        @if (Route::is('equipe.show'))
                            {!! Form::model($equipe, ['method' => 'PATCH', 'files' => 'True', 'url' => 'equipe/' . $equipe->id]) !!}
                            <div class="text-center">
                                <img src="{{ url('/') }}/uploads/images/equipe/{{ $equipe->foto }}"
                                    alt="{{ $equipe->nome }}" title="{{ $equipe->nome }}" class="img-thumbnail"
                                    width="150" />
                            </div>
                        @else
                            {!! Form::open(['method' => 'POST', 'files' => 'True', 'url' => 'equipe']) !!}
                        @endif
                        {!! Form::label('nome', 'Nome') !!}
                        {!! Form::input('text', 'nome', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Nome do Membro da Equipe',
                            'required',
                            'maxlength' => 150,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('idade', 'Idade') !!}
                        {!! Form::input('text', 'idade', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Idade',
                            'required',
                            'maxlength' => 50,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('cargo', 'Cargo - Função') !!}
                        {!! Form::input('text', 'cargo', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Cargo ou função do membro',
                            'required',
                            'maxlength' => 70,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('foto', 'Foto') !!}
                        {!! Form::file('foto', ['class' => 'form-control  btn-sm']) !!}
                        {!! Form::submit('Salvar', ['class' => 'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
