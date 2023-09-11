@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lista de Professores
                        <a href="{{ url('professores/create') }}" class="btn btn-success btn-sm float-end">
                            Cadastrar Professor
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
                                    <th>Descrição</th>
                                    <th>Marca</th>
                                    <th>Ano</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($professores as $professor)
                                    <tr>
                                        <td>{{ $professor->id }}</td>
                                        <td>{{ $professor->nome_equipamento }}</td>
                                        <td>{{ $professor->descricao }}</td>
                                        <td>{{ $professor->marca }}</td>
                                        <td>{{ $professor->ano }}</td>
                                        <td>
                                            <a href="{{ url('professores/' . $professor->id) }}" class="btn btn-primary btn-sm">
                                                Editar
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => 'professores/' . $professor->id, 'style' => 'display:inline']) !!}
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
                            {{ $professores->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
