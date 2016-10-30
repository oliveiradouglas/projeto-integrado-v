@extends('layouts.app')

@section('content')
<div class="container">
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
			    				<td>Jackson five</td>
			    			</tr>
			    			<tr>
			    				<td>Cliente</td>
			    				<td>Douglas Oliveira</td>
			    			</tr>
			    			<tr>
			    				<td>Data</td>
			    				<td>30/10/2016</td>
			    			</tr>
			    			<tr>
			    				<td>Endereço origem</td>
			    				<td>Rua Dr. César 1125</td>
			    			</tr>
			    			<tr>
			    				<td>Endereço destino</td>
			    				<td>Rua urusui, 300</td>
			    			</tr>
			    			<tr>
			    				<td>Preço</td>
			    				<td>R$ 15,00</td>
			    			</tr>
			    			<tr>
			    				<td>Status</td>
			    				<td>
									<span class="label label-warning">Em andamento</span>
			    				</td>
			    			</tr>
			    			<tr>
			    				<td>Observaçoes</td>
			    				<td>Entregar em mãos ao Sr. Marcos</td>
			    			</tr>
			    		</tbody>
			    	</table>
			    </div>

			    <div class="row col-md-12">
			    	<a href="#" class="btn btn-default pull-right">
			    		Voltar
			    	</a>
			    </div>
		  	</div>
		</div>
	</div>
</div>
@endsection