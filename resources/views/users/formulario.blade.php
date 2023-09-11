@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dados do Usuario
                        <a href="{{ url('users') }}" class="btn btn-success btn-sm float-end">
                            Listar Usuarios
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

                        @if (Route::is('users.show'))
                            {!! Form::model($users, [
                                'method' => 'PATCH',
                                'files' => 'True',
                                'url' => 'users/' . $users->id,
                            ]) !!}
                        @else
                            {!! Form::open(['method' => 'POST', 'files' => 'True', 'url' => 'users']) !!}
                        @endif
                        {!! Form::label('nome', 'Nome do Acadêmico') !!}
                        {!! Form::input('text', 'nome', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Nome do Acadêmico',
                            'required',
                            'maxlength' => 150,
                            'autofocus',
                        ]) !!}


                        {!! Form::label('matricula', 'Matricula') !!}
                        {!! Form::input('text', 'matricula', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Numero da Matricula Matricula',
                            'required',
                            'maxlength' => 70,
                            'autofocus',
                            ]) !!}


                            {!! Form::label('curso', 'Curso') !!}
                            {!! Form::input('text', 'curso', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Curso do Acadêmico',
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
