@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados do Curso
                        <a href="{{ url('cursos') }}" class="btn btn-success btn-sm float-end">
                            Listar Cursos
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

                        @if (Route::is('cursos.show'))
                            {!! Form::model($cursos, [
                                'method' => 'PATCH',
                                'files' => 'True',
                                'url' => 'cursos/' . $cursos->id,
                            ]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'files' => 'True', 'url' => 'cursos']) !!}
                        @endif
                        {!! Form::label('nome_curso', 'Curso') !!}
                        {!! Form::input('text', 'nome_curso', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Curso',
                            'required',
                            'maxlength' => 150,
                            'autofocus',
                        ]) !!}

                        {!! Form::label('descricao_curso', 'Descrição') !!}
                        {!! Form::input('text', 'descricao_curso', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Descreva o Curso',
                            'required',
                            'maxlength' => 250,
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
