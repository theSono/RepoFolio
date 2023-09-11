@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Cursos
                        <a href="{{ url('cursos/create') }}" class="btn btn-success btn-sm float-end">
                            Cadastrar Curso
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
                                    <th>Nome do Curso</th>
                                    <th>Descrição do Curso</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cursos as $curso)
                                    <tr>
                                        <td>{{ $curso->id }}</td>
                                        <td>{{ $curso->nome_curso }}</td>
                                        <td>{{ $curso->descricao_curso }}</td>
                                        <td>
                                            <a href="{{ url('cursos/' . $curso->id) }}" class="btn btn-primary btn-sm">
                                                Editar
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => 'cursos/' . $curso->id, 'style' => 'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            Não há membros para listar!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            {{ $cursos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
