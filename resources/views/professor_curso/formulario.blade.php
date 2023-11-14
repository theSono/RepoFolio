@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados do Professor/Curso
                        <a href="{{ url('professor_curso') }}" class="btn btn-success btn-sm float-end">
                            Listar Professor/Curso
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

                        @if(Route::is('professor_curso.show'))
                            {!! Form::model($professor_curso,
                                            ['method'=>'PATCH',
                                            'url'=>'professor_curso/'.$professor_curso->id]) !!}
                        @else
                            {!! Form::open(['method'=>'POST', 'url'=>'professor_curso']) !!}
                        @endif

                        {!! Form::label('professor_id', 'Professor') !!}
                        {!! Form::select('professor_id',
                                            $professores,
                                            null,
                                            ['class' =>'form-control',
                                            'placeholder' =>'Selecione o Professor',
                                            'required'])!!}

                        {!! Form::label('curso_id', 'Curso') !!}
                        {!! Form::select('curso_id',
                                            $cursos,
                                            null,
                                            ['class' =>'form-control',
                                            'placeholder' =>'Selecione o Curso',
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
