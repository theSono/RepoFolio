@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Equipamentos
                        <a href="{{ url('equipamentos/create') }}" class="btn btn-success btn-sm float-end">
                            Cadastrar Equipamento
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
                                @forelse ($equipamentos as $equipamento)
                                    <tr>
                                        <td>{{ $equipamento->id }}</td>
                                        <td>{{ $equipamento->nome_equipamento }}</td>
                                        <td>{{ $equipamento->descricao }}</td>
                                        <td>{{ $equipamento->marca }}</td>
                                        <td>{{ $equipamento->ano }}</td>
                                        <td>
                                            <a href="{{ url('equipamentos/' . $equipamento->id) }}" class="btn btn-primary btn-sm">
                                                Editar
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => 'equipamentos/' . $equipamento->id, 'style' => 'display:inline']) !!}
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
                            {{ $equipamentos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
