@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadastrar cartão</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/cartao/adicionar') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="numero" class="col-md-4 control-label">Número</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control" name="numero" required />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="nome" class="col-md-4 control-label">Nome impresso</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bandeira" class="col-md-4 control-label">Bandeira</label>

                            <div class="col-md-6">
                                <select id="bandeira" class="form-control" name="bandeira" required>
                                    <option value="">Selecione a bandeira</option>
                                    <option value="Visa">Visa</option>
                                    <option value="MasterCard">MasterCard</option>
                                    <option value="American Express">American Express</option>
                                    <option value="Discover">Discover</option>
                                    <option value="Dinners Club">Dinners Club</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mes" class="col-md-4 control-label">Mês</label>

                            <div class="col-md-6">
                                <select id="mes" class="form-control" name="mes" required>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ano" class="col-md-4 control-label">Ano</label>

                            <div class="col-md-6">
                                <select id="ano" class="form-control" name="ano" required>
                                    @for ($i = date('Y'); $i < (date('Y') + 10); $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cvv" class="col-md-4 control-label">CVV</label>

                            <div class="col-md-6">
                                <input id="cvv" type="text" class="form-control" name="cvv" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Cadastrar
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
