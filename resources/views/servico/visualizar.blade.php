@extends('layouts.app')

@section('content')
<div class="container">
	<div class="form-row row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
                <li><a href="{{ action('ServicoController@index') }}">Serviços</a></li>
                <li class="active">Visualizar</li>
            </ol>
        </div>
    </div>

    <div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-default">
		    	<div class="panel-heading">
		    		<span class="glyphicon glyphicon-info-sign"></span>
		    		Informações do serviço
		    	</div>

			    <div class="panel-body">
					<div class="table-responsive">
				    	<table class="table table-bordered display">
				    		<thead>
				    			<tr>
				    				<th>Atributo</th>
				    				<th>Valor</th>
				    			</tr>
				    		</thead>

				    		<tbody>
				    			<tr>
				    				<td>Motoboy</td>
				    				<td>{{ $servico->getMotoboy()->getUsuario()->nome }}</td>
				    			</tr>
				    			<tr>
				    				<td>Cliente</td>
				    				<td>{{ $servico->getCliente()->getUsuario()->nome }}</td>
				    			</tr>
				    			<tr>
				    				<td>Data</td>
				    				<td>{{ $servico->created_at }}</td>
				    			</tr>
				    			<tr>
				    				<td>Endereço origem</td>
				    				<td>{{ $servico->endereco_origem }}</td>
				    			</tr>
				    			<tr>
				    				<td>Endereço destino</td>
				    				<td>{{ $servico->endereco_destino }}</td>
				    			</tr>
				    			<tr>
				    				<td>Preço</td>
				    				<td>R$ {{ $servico->preco }}</td>
				    			</tr>
				    			<tr>
				    				<td>Status</td>
				    				<td>
										{!! $servico->getStatus()->getLabel() !!}
				    				</td>
				    			</tr>
				    			<tr>
				    				<td>Descrição</td>
				    				<td>{{ $servico->observacoes }}</td>
				    			</tr>
				    		</tbody>
				    	</table>
				    </div>
			  	</div>
			</div>
		</div>
    </div>
</div>
@endsection