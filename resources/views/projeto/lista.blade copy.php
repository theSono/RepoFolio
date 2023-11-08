@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Projetos
                        <a href="{{ url('projetos/create') }}" class="btn btn-success btn-sm float-end">
                            Cadastrar Projeto
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
                                    <th>Titulo</th>
                                    <th>Órgãos Proponentes</th>
                                    <th>Participantes</th>
                                    <th>Período / Duração</th>
                                    <th>Coordenação / Orientação</th>
                                    <th>Resumo do Projeto</th>
                                    <th>Justificativa</th>
                                    <th>Fundamentação Teórica</th>
                                    <th>Objetivo Geral</th>
                                    <th>Objetivos Específicos</th>
                                    <th>Metodologia</th>
                                    <th>Recursos Orçamentários</th>
                                    <th>Anexos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projetos as $projeto)
                                    <tr>
                                        <td>{{ $projeto->id }}</td>
                                        <td>{{ $projeto->titulo }}</td>
                                        <td>{{ $projeto->orgaos_proponentes }}</td>
                                        <td>{{ $projeto->dimensao }}</td>
                                        <td>{{ $projeto->periodo_duracao }}</td>
                                        <td>{{ $projeto->coordenacao_orientacao }}</td>
                                        <td>{{ $projeto->resumo_projeto }}</td>
                                        <td>{{ $projeto->justificativa }}</td>
                                        <td>{{ $projeto->fundamentacao_teorica }}</td>
                                        <td>{{ $projeto->objetivo_geral }}</td>
                                        <td>{{ $projeto->objetivo_especificos }}</td>
                                        <td>{{ $projeto->metodologia }}</td>
                                        <td>{{ $projeto->recursos_orçamentos }}</td>
                                        <!--<td>{{ $projeto->anexos }}</td>!-->
                                        <td>
                                            <a href="{{ url('projetos/' . $projeto->id) }}" class="btn btn-primary btn-sm">
                                                Editar
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => 'projetos/' . $projeto->id, 'style' => 'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            Não há projetos para listar!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            {{ $projetos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
