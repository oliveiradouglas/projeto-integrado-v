@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Solicitar serviço</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/cartao/adicionar') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="id_motoboy" class="col-md-4 control-label">Motoboy</label>

                            <div class="col-md-6">
                                <input id="nome_motoboy" type="text" class="form-control" disabled />
                                <input id="id_motoboy" type="hidden" name="id_motoboy" required />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="endereco_origem" class="col-md-4 control-label">Endereço de origem</label>

                            <div class="col-md-6">
                                <input id="endereco_origem" type="text" class="form-control" name="endereco_origem" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="endereco_destino" class="col-md-4 control-label">Endereço de destino</label>

                            <div class="col-md-6">
                                <input id="endereco_destino" type="text" class="form-control" name="endereco_destino" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="preco" class="col-md-4 control-label">Preço</label>

                            <div class="col-md-6">
                                <input id="preco" type="text" class="form-control" name="preco" required readonly value="0,00" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="observacoes" class="col-md-4 control-label">Observaçoes</label>

                            <div class="col-md-6">
                                <textarea id="observacoes" rows="4" class="form-control" name="observacoes" required ></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="observacoes" class="col-md-4 control-label">Cartão</label>

                            <div class="col-md-6">
                                <input type="radio" name="id_cartao" required checked /> Final: 8173, Bandeira: Visa <br />
                                <input type="radio" name="id_cartao" required /> Final: 9828, Bandeira: MasterCard
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Solicitar
                                </button>
                                <a href="#" class="btn btn-danger">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <a href="#" class="pull-right">Voltar</a>
        </div>
    </div>
</div>
@endsection
