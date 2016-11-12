@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-row row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
                <li><a href="{{ action('ServicoController@index') }}">Serviços</a></li>
                <li class="active">Cartões</li>
            </ol>

            <a href="{{ action('CartaoController@telaAdicionar') }}" class="btn btn-success"> 
                <span class="glyphicon glyphicon-plus"></span>
                Novo cartão
            </a>
        </div>
    </div>

    <div class="form-row row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cartões</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Nome impresso</th>
                                <th>Bandeira</th>
                                <th>Vencimento</th>
                                <th>CVV</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($cartoes as $cartao)
                                <tr class="text-center">
                                    <td> *******{{ substr($cartao->numero, -4) }}</td>
                                    <td>{{ $cartao->nome }}</td>
                                    <td>{{ $cartao->bandeira }}</td>
                                    <td>{{ $cartao->mes }}/{{ $cartao->ano }}</td>
                                    <td>{{ $cartao->cvv }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-default" title="Editar cartão">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href="{{ action('CartaoController@excluir', $cartao->id) }}" class="btn btn-sm btn-danger" title="Excluir cartão">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Nenhum registro encontrado!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
