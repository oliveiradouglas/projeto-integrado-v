<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Easy Moto') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (\Auth::guest())
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Cadastro</a>
                </div>
            @else
                <div class="top-right links">
                    <a href="{{ action('ServicoController@index') }}">Serviços</a>
                    <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </a>
                </div>
            @endif

            <div class="content">
                <h1>
                    <img src="{{ asset('img/logo-sem-nome.png') }}" title="Easy Moto" alt="Easy Moto" id="logo" />
                </h1>
                <div class="title m-b-md">
                    {{ config('app.name', 'Easy Moto') }}
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <p class="descricao">
                        Contrate serviços de motoboy de forma rápida e segura, o Easy Moto é o local de encontro entre quem precisa de algum serviço de motoboy e o motoboy que quer oferecer este serviço.
                    </p>
                    <p class="descricao">
                        Nossa plataforma é totalmente segura e apenas profissionais de alta qualidade fazem parte desse movimento, faça seu cadastro e aproveite os serviços.
                    </p>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
