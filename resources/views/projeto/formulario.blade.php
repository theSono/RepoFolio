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

                        @if (Route::is('projeto.show'))
                            {!! Form::model($projeto, ['method' => 'PATCH', 'files' => 'True', 'url' => 'projeto/' . $projeto->id]) !!}
                            <div class="text-center">
                                <img src="{{ url('/') }}/uploads/images/anexos/{{ $projeto->anexos }}"
                                    alt="{{ $projeto->anexos }}" title="{{ $projeto->anexos }}" class="img-thumbnail"
                                    width="150" />
                            </div>
                        @else
                            {!! Form::open(['method' => 'POST', 'files' => 'True', 'url' => 'projeto']) !!}
                        @endif

                        {!! Form::label('titulo', 'Titulo do Projeto') !!}
                        {!! Form::input('text', 'titulo', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Titulo do Projeto',
                            'required',
                            'maxlength' => 150,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('orgaoes_proponentes', 'Órgãos Proponentes') !!}
                        {!! Form::input('text', 'orgaoes_proponentes', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Órgãos Proponentes',
                            'required',
                            'maxlength' => 250,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('participantes', 'Participantes do Projeto') !!}
                        {!! Form::input('text', 'participantes', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Participantes do Projeto',
                            'required',
                            'maxlength' => 250,
                            'autofocus',
                        ]) !!}


                        {!! Form::label('dimensao', 'Dimensão do Projeto') !!}
                        {!! Form::input('text', 'dimensao', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Dimensão do Projeto',
                            'required',
                            'maxlength' => 250,
                            'autofocus',
                        ]) !!}


                        {!! Form::label('periodo_duracao', 'Duração do Projeto') !!}
                        {!! Form::input('text', 'periodo_duracao', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Duração do Projeto',
                            'required',
                            'maxlength' => 250,
                            'autofocus',
                        ]) !!}


                        {!! Form::label('coordenacao_orientacao', 'Coordenação do Projeto') !!}
                        {!! Form::input('text', 'coordenacao_orientacao', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Coordenação do Projeto',
                            'required',
                            'maxlength' => 250,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('resumo_projeto', 'Resumo do Projeto') !!}
                        {!! Form::input('text', 'coordenacao_orientacao', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Resumo do Projeto',
                            'required',
                            'maxlength' => 250,
                            'autofocus',
                        ]) !!}


                        {!! Form::label('justificativa', 'Justificativa') !!}
                        {!! Form::input('text', 'justificativa', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Justificativa do Projeto',
                            'required',
                            'maxlength' => 70,
                            'autofocus',
                        ]) !!}


                        {!! Form::label('fundamentacao_teorica', 'Fundamentação Teórica') !!}
                        {!! Form::input('text', 'fundamentacao_teorica', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Fundamentação Teórica',
                            'required',
                            'maxlength' => 70,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('objetivos_geral', 'Objetivo Geral') !!}
                        {!! Form::input('text', 'objetivos_geral', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Objetivo Geral',
                            'required',
                            'maxlength' => 70,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('objetivos_especificos', 'Objetivos Específicos') !!}
                        {!! Form::input('text', 'objetivos_especificos', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Objetivos Específicos',
                            'required',
                            'maxlength' => 70,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('metodologia', 'Metodologia') !!}
                        {!! Form::input('text', 'metodologia', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Metodologia',
                            'required',
                            'maxlength' => 70,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('recursos_orçamentos', 'Recursos Orçamentários') !!}
                        {!! Form::input('text', 'recursos_orçamentos', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Recursos Orçamentários',
                            'required',
                            'maxlength' => 70,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('anexos', 'Anexos') !!}
                        {!! Form::file('anexos',
                                        ['class'=>'form-control btn-sm']) !!}

                        {!! Form::submit('Salvar', ['class' => 'float-end btn btn-primary mt-3']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
