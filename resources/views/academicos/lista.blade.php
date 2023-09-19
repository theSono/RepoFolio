@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Acadêmicos
                        <a href="{{ url('academicos/create') }}" class="btn btn-success btn-sm float-end"> Cadastrar Acadêmico
                        </a>
                    </div>
                    <div class="card-body">
                        @if(Session::has('mensagem_sucesso'))
                            <div class="alert alert-success">
                                {{ Session::get('mensagem_sucesso') }}
                            </div>
                        @endif
                        <table class="table table-sm table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Matricula</th>
                                    <th>Curso</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($academicos as $academico)
                                    <tr>
                                        <td>{{ $academico->id }}</td>
                                        <td>{{ $academico->nome }}</td>
                                        <td>{{ $academico->matricula }}</td>
                                        <td>{{ $academico->curso }}</td>
                                        <td>
                                            <a href="{{ url('academicos/' . $academico->id) }}" class="btn btn-primary btn-sm">
                                                Editar
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => 'academicos/' . $academico->id, 'style' => 'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            Não há acadêmicos para listar!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            {{ $academicos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
