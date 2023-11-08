@extends('layouts.navbar')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Home') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<style>
    .bg-dark-transparent {
        background-color: rgba(0, 0, 0, 0.7);
        padding: 20px;
        border-radius: 10px;
        /* Ajuste o valor do último parâmetro (0.7) para controlar a transparência */
    }

    #app {
        background-color: rgb(255, 255, 255)
    }

    .image-container {
        position: relative;
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        /* Cor de fundo com transparência para criar a sombra */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        /* Cor do texto */
        opacity: 0;
        /* Inicialmente, a sobreposição está invisível */
        transition: opacity 0.3s ease;
        /* Efeito de transição suave */
    }

    .image-container:hover .image-overlay {
        opacity: 1;
        /* Quando o mouse passa por cima, a sobreposição fica visível */
    }
</style>

<body>

    <div class="container mt-5">
        <div class="row">
            <h2 class="card-title mb-3"><strong>GitCrafters Apresenta: RepoFolio</strong></h2>
            <div class="col-md-12" id="sobre">
                <div class="card mb-4">
                    <div class="card-body" style="text-align: justify;">
                        <p class="lead card-text">
                            A GitCrafters uma equipe apaixonada em simplificar o gerenciamento de projetos.
                            Com anos de experiência, desenvolvemos repositórios de projetos intuitivos e eficazes que capacitam
                            equipes a colaborar, armazenar e acompanhar projetos com facilidade.
                            Nossa missão é fornecer soluções inovadoras e seguras para impulsionar o sucesso dos nossos clientes.
                            Confie em nós para a gestão inteligente de projetos.
                        </p>
                        <p class="lead card-text">
                            RepoFolio o seu repositório de projetos simples e moderno!
                            Gerencie seus projetos com eficiência e segurança! Apresentamos nosso programa de repositório de projetos.
                            Com ele, seus projetos estarão todos em um só lugar e acessíveis a qualquer momento.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="app">
        <div class="container mt-3">
            <div class="row">
                <h2 class="card-title mb-3"><strong>PROJETOS DESENVOLVIDOS</strong></h2>
                <div class="col-lg-4">
                    <div class="image-container mt-3">
                        <img src="{{ asset('uploads/projeto/1.PNG') }}" alt="Imagem Menor 1"
                            class="img-fluid rounded">
                        <div class="image-overlay rounded">
                            <h1 class="display-5">PROJETO 1</h1>
                            <p class="lead">DESC</p>
                        </div>
                    </div>

                    <div class="image-container mt-3 mb-3">
                        <img src="{{ asset('uploads/projeto/2.png') }}" alt="Imagem Menor 2"
                            class="img-fluid rounded">
                        <div class="image-overlay rounded">
                            <h2>PROJETO 1</h2>
                            <p class="lead">DESC</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="image-container mb-3">
                        <img src="{{ asset('uploads/projeto/3.png') }}" alt="Imagem Menor 1"
                            class="img-fluid rounded">
                        <div class="image-overlay rounded">
                            <h1 class="display-5">PROJETO 1</h1>
                            <p class="lead">DESC</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container mt-3" id="porque">
            <h2 class="mb-4"><strong>O que o RepoFolio proporciona?</strong></h2>
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Centralização:
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Nosso repositório de projetos é uma plataforma online que centraliza as informações e
                            arquivos relacionados a um projeto em um só lugar.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Colaboração:
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            Permite que todas as pessoas envolvidas no projeto possam visualizar
                            e editar os arquivos em tempo real.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Organização:
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Mantém todos os arquivos relacionados a um projeto em um só lugar,
                            garantindo que nada fique perdido ou desorganizado.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Produtividade:
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Permite que várias pessoas trabalhem no mesmo projeto ao mesmo tempo e
                            visualizem as alterações em tempo real, aumentando a produtividade.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Segurança:
                            </button>
                        </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            Garante que os arquivos estejam seguros em um ambiente online protegido
                            por senhas e sistemas de criptografia.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <section class="mb-5" id="equipe">
                    <h2 class="mb-4"><strong>Equipe GitCrafters</strong></h2>
                    <div class="row">
                        @forelse ($equipes as $equipe)
                        <div class="col-md-4">
                            <div class="card d-flex flex-column h-100">
                                <img src="{{ asset('uploads/images/equipe/' . $equipe->foto) }}"
                                    class="card-img-top img-fluid" alt="{{ $equipe->nome }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $equipe->nome }}</h5>
                                    <p class="card-text">{{ $equipe->cargo }}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <p>Não há itens para listar!</p>
                        </div>
                        @endforelse
                    </div>
                </section>
                <!-- <h2 class="mb-4 text-center">Faça já seu projeto!</h2>
                <button type="button" class="btn btn-warning btn-lg btn-block shadow-lg p-3 mb-5 rounded">Fazer Projeto!</button>-->
            </div>

        </div>

        <div class="container mt-3" id="contato">
            <h2 class="card-title mt-5 mb-3"><strong>Entre em contato conosco</strong></h2>
            <div class="card">
                <div class="card-body">
                    <p class="lead">Preencha com seus Dados</p>
                    @if (Session::has('mensagem_sucesso'))
                    <div class="alert alert-sucess">
                        {{ Session::get('mensagem_sucesso') }}
                    </div>
                    @endif
                    {!! Form::open(['method' => 'POST', 'url' => 'contatos']) !!}
                    <div class="form-group">
                        {!! Form::label('nome', 'Nome') !!}
                        {!! Form::input('text', 'nome', null, [
                        'class' => 'form-control',
                        'autofocus',
                        'placeholder' => 'Nome',
                        'required',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail') !!}
                        {!! Form::input('text', 'email', null, ['class' => 'form-control', 'placeholder' => 'E-mail',
                        'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fone', 'Telefone') !!}
                        {!! Form::input('text', 'fone', null, ['class' => 'form-control', 'placeholder' => 'Telefone',
                        'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('mensagem', 'Mensagem') !!}
                        {!! Form::textarea('mensagem', null, [
                        'class' => 'form-control',
                        'rows' => 5,
                        'placeholder' => 'Mensagem',
                        'required',
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Enviar', ['class' => 'form-control btn btn-warning mt-2']) !!}
                    </div>
                </div>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>


    </div>

    <!-- Inclua os arquivos JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

<?php
    // ... código PHP existente ...

    // Exemplo de código PHP para exibir o footer dinamicamente
    $anoAtual = date('Y');
    $nomeEmpresa = 'GitCrafters';
    $endereco = 'FAMPER';
    $emailContato = 'GitCrafters@famper.com';
    $telefoneContato = '+55 999 999 9999';
    use App\Http\Controllers\ResumosController;
    ?>

<footer class="footer bg-white text-dark">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mt-3">
                <h5>Contato</h5>
                <p><strong>Endereço:</strong>
                    <?php echo $endereco; ?>
                </p>
                <p><strong>E-mail:</strong>
                    <?php echo $emailContato; ?>
                </p>
                <p><strong>Telefone:</strong>
                    <?php echo $telefoneContato; ?>
                </p>
            </div>
            <div class="col-md-6 mt-3">
                <h5>Tópicos</h5>
                <ul>
                    <li>
                        <a class="navbar-brand nav-link" href="#sobre">
                            Sobre
                        </a>
                    </li>
                    <li>
                        <a class="navbar-brand nav-link" href="#orcamento">
                            Projetos
                        </a>
                    </li>
                    <li>
                        <a class="navbar-brand nav-link" href="#porque">
                            Escolha a GitCrafters
                        </a>
                    </li>
                    <li>
                        <a class="navbar-brand nav-link" href="#equipe">
                            Equipe
                        </a>
                    </li>

                </ul>

            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <a class="navbar-brand text-center" href="{{ url('/home') }}">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand" href="{{ url('/') }}" style="background: rgb (255, 165, 0);">
                        <img src="{{ asset('uploads/images/imagesssss.png') }}" width="200" alt="...">
                    </a>
                </div>
            </a>
        </div>

        <hr>
        <p class="text-center">&copy;
            <?php echo $anoAtual; ?>
            <?php echo $nomeEmpresa; ?>. Todos os direitos reservados.
        </p>
    </div>
</footer>


</html>

@endsection
