@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lista de Professores de Cada Cursoo
                        <a href="{{ url('professor_curso/create') }}" class="btn btn-success btn-sm float-end">
                            Nova Atribuição
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
                                    <th>Professor</th>
                                    <th>Curso</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($professor_curso as $professor_curso)
                                    <tr>
                                        <td>{{ $professor_curso->id }}</td>
                                        <td>{{ $professor_curso->professor_id->nome }}</td>
                                        <td>{{ $professor_curso->cursos_id->nome_curso }}</td>

                                        <td>
                                            <a href="{{ url('professor_curso/' . $professor_curso->id) }}" class="btn btn-primary btn-sm">
                                                Editar
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => 'professor_curso/' . $professor_curso->id, 'style' => 'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            Não há itens para listar!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            {{ $professor_curso->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
