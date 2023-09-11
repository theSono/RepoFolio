@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Equipe
                        <a href="{{ url('equipe/create') }}" class="btn btn-success btn-sm float-end">
                            Novo Membro
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
                                    <th>Foto</th>
                                    <th>Nome</th>
                                    <th>Idade</th>
                                    <th>Cargo - Função</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($equipes as $equipe)
                                    <tr>
                                        <td>{{ $equipe->id }}</td>
                                        <td>{{ $equipe->foto }}</td>
                                        <td>{{ $equipe->nome }}</td>
                                        <td>{{ $equipe->idade }}</td>
                                        <td>{{ $equipe->cargo }}</td>
                                        <td>
                                            <a href="{{ url('equipe/' . $equipe->id) }}" class="btn btn-primary btn-sm">
                                                Editar
                                            </a>
                                            {!! Form::open(['method' => 'DELETE', 'url' => 'equipe/' . $equipe->id, 'style' => 'display:inline']) !!}
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
                            {{ $equipes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
