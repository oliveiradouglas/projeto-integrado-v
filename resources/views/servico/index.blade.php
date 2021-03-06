@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-row row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
                <li class="active">Serviços</li>
            </ol>
        </div>
    </div>

    @if (\Auth::user()->tipo == \App\Source\Usuario\Tipo::CLIENTE)
        <div class="form-row row">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{ action('ServicoController@telaAdicionar') }}" class="btn btn-success"> 
                    <span class="glyphicon glyphicon-plus"></span>
                    Novo serviço
                </a>

                <a href="{{ action('CartaoController@index') }}" class="btn btn-primary marginL10"> 
                    <span class="glyphicon glyphicon-credit-card"></span>
                    Cartões
                </a>
            </div>
        </div>
    @endif

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
                            <?php $idServico = count($servicos) ?>
                            @forelse ($servicos as $servico)
                                <tr class="text-center">
                                    <td>{{ $idServico-- }}</td>
                                    <td>{{ $servico->created_at }}</td>
                                    <td>R$ {{ $servico->preco }}</td>
                                    <td>
                                        {!! $servico->getStatus()->getLabel() !!}
                                    </td>
                                    <td>
                                        <a href="{{ action('ServicoController@show', ['id' => $servico->id]) }}" class="btn btn-sm btn-default" title="Visualizar serviço">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>

                                        @if(\Auth::user()->tipo == \App\Source\Usuario\Tipo::MOTOBOY 
                                        && $servico->getStatus()->getId() == \App\Source\Servico\Status::EM_ANDAMENTO)
                                            <a href="{{ action('ServicoController@finalizarServico', $servico->id) }}" class="btn btn-sm btn-success" title="Finalizar serviço">
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </a>
                                        @elseif (\Auth::user()->tipo == \App\Source\Usuario\Tipo::CLIENTE 
                                            && $servico->getStatus()->getId() == \App\Source\Servico\Status::FINALIZADO 
                                            && !$servico->avaliado)
                                            
                                            <button type="button" class="btn btn-sm btn-primary btn-avaliacao" title="Avaliar motoboy" data-id="{{ $servico->id }}">
                                                <span class='glyphicon glyphicon-star'></span>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
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

@include('servico.modal-avaliacao')

<script type="text/javascript">
    $('.btn-avaliacao').click(function(){
        $('#modal-avaliacao').modal('show');
        $('#servico').val($(this).attr('data-id'));
    });
</script>

@endsection
