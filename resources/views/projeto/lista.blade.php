@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Lista de Projetos
                        <a href="{{ url('projeto/create') }}" class="btn btn-success btn-sm float-end">
                            Novo Projeto
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
                                    <th>Dimensão</th>
                                    <th>Período / Duração</th>
                                    <th>Coordenação / Orientação</th>
                                    <th>Resumo do Projeto</th>
                                    <th>Justificativa</th>
                                    <th>Fundamentação Teórica</th>
                                    <th>Objetivo Geral</th>
                                    <th>Objetivos Específicos</th>
                                    <th>Metodologia</th>
                                    <th>Recursos Orçamentários</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projetos as $projeto)
                                    <tr>
                                        <td>{{ $projeto->id }}</td>
                                        <td>{{ $projeto->titulo }}</td>
                                        <td>{{ $projeto->orgaos_proponentes }}</td>
                                        <td>{{ $projeto->participantes }}</td>
                                        <td>{{ $projeto->dimensao }}</td>
                                        <td>{{ $projeto->periodo_duracao }}</td>
                                        <td>{{ $projeto->coordenacao_orientacao }}</td>
                                        <td>{{ $projeto->resumo_projeto }}</td>
                                        <td>{{ $projeto->justificativa }}</td>
                                        <td>{{ $projeto->fundamentacao_teorica }}</td>
                                        <td>{{ $projeto->objetivos_geral }}</td>
                                        <td>{{ $projeto->objetivos_especificos }}</td>
                                        <td>{{ $projeto->metodologia }}</td>
                                        <td>{{ $projeto->recursos_orçamentos }}</td>
                                        <td>
                                            <a href="{{ url('projeto/' . $projeto->id) }}" class="btn btn-primary btn-sm">
                                                Editar
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => 'projeto/' . $projeto->id, 'style' => 'display:inline']) !!}
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
                            {{ $projetos->links() }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('projeto/report') }}" target="_blank"
                        class="btn btn-sm btn-warning">
                        Relatório
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
