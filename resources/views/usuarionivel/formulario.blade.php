@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados dos Usuarios/Niveis
                        <a href="{{ url('usuario_nivel') }}" class="btn btn-success btn-sm float-end">
                            Listar Usuarios/Niveis
                        </a>
                    </div>
                    <div class="card-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif
                        @if(Session::has('mensagem_erro'))
                            <div class="alert alert-danger">
                                {{ Session::get('mensagem_erro') }}
                            </div>
                        @endif

                        @if(Route::is('usuario_nivel.show'))
                            {!! Form::model($usuario_nivel,
                                            ['method'=>'PATCH',
                                            'url'=>'usuario_nivel/'.$usuario_nivel->id]) !!}
                        @else
                            {!! Form::open(['method'=>'POST', 'url'=>'usuario_nivel']) !!}
                        @endif

                        {!! Form::label('user_id', 'Usuario') !!}
                        {!! Form::select('user_id',
                                            $users,
                                            null,
                                            ['class' =>'form-control',
                                            'placeholder' =>'Selecione o Usuario',
                                            'required'])!!}

                        {!! Form::label('nivel_id', 'Nivel') !!}
                        {!! Form::select('niveil_id',
                                            $niveis,
                                            null,
                                            ['class' =>'form-control',
                                            'placeholder' =>'Selecione o Nivel',
                                            'required'])!!}

                        {!! Form::submit('Salvar',
                                        ['class'=>'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
