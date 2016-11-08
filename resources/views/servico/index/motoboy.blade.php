@extends('layouts.app')

@section('content')
<div class="container">

    <div class="form-row row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Serviços</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Data</th>
                                <th>Preço</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($servicos as $chave => $servico)
                                <tr class="text-center">
                                    <td>{{ $chave + 1 }}</td>
                                    <td>{{ $servico->created_at }}</td>
                                    <td>{{ $servico->preco }}</td>
                                    <td>
                                        {{ $servico->getStatus()->getLabel() }}
                                    </td>
                                    <td>
                                        <a href="{{ action('ServicoController@show', ['id' => $servico->id]) }}" class="btn btn-sm btn-default" title="Visualizar serviço">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>

                                        @if ($servico->getStatus()->getId() == \App\Source\Servico\Status::EM_ANDAMENTO)
                                            <a href="{{ action('ServicController@finalizarServico') }}" class="btn btn-sm btn-success" title="Finalizar serviço">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
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
