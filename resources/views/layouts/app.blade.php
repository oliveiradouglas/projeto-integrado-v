<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Easy Moto') }}</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Alterar navegação</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Easy Moto') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            @if (\Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Cadastro</a></li>
                            @else
                                @if (\Auth::user()->tipo == App\Source\Usuario\Tipo::MOTOBOY)
                                    <li>
                                        <a href="javascript:;">
                                            {!! Auth::user()->getInstanciaTipo()->getStatus()->getLabel() !!}
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <a href="javascript:;">
                                        <span class="glyphicon glyphicon-user"></span>
                                        {{ \Auth::user()->nome }}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <span class="glyphicon glyphicon-log-out"></span>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            @if (\Session::has('alertas'))
                @foreach (\Session::get('alertas') as $alerta)
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-{{ $alerta->getTipo() }}">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $alerta->getMensagem() }}
                        </div>
                    </div>
                @endforeach

                {{ \Session::forget('alertas') }}
            @endif

            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
