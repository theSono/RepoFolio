<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatórios</title>
</head>
<body>
    <h1> Relatório de Projetos</h1>
    <hr>
    <table border="1" cellpadding = '0' cellspacing='0'
        style="width: 100%">
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
            <th>Logo</th>
        </tr>
        @forelse ($projetos as $projeto )
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
                <td>{{ $projeto->anexos }}</td>
                <td><img src="{{ $logo }}" alt="">
                <img src="{{ public_path('uploads/projeto/semfoto.jpg') }}" alt="">
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="3">Nenhum Projeto Cadastrado</td>
            </tr>
        @endforelse
    </table>
</body>
</html>
